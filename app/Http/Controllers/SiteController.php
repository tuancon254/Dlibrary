<?php

namespace App\Http\Controllers;

use App\component\Recusive;
use App\Models\Category;
use App\Models\Documents;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $category;
    private $documents;
    public function __construct(Category $category, Documents $document)
    {
        $this->category = $category;
        $this->documents = $document;
    }
    public function index()
    {
        $category = $this->category->where('parent_id', '=', '0')->limit(6)->get();
        return view('site.index', compact('category'));
    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function category()
    {
        $data = $this->category->where('parent_id', '=', '0')->get();
        return view('site.category.index', compact('data'));
    }

    public function showCategory($id)
    {
        $category = $this->category->find($id);
        $childCategory = $category->childCategory;
        // dd($category->childCategory);
        // dd($category->documents->all());
        $document = $category->documents->where('approved', '=', 1)->all();
        
        return view('site.category.show', compact('category', 'childCategory','document'));
    }
    public function createDocument()
    {
        $data = array();
        $semester = Semester::all();
        $htmlOption = $this->getCategory($parentId = '');
        $category = Category::where('parent_id','=','1')->get();
        foreach($category as $cate){
            array_push($data,$cate->id);
        }
        // dd($data);
        return view('site.document.upload', compact(['htmlOption', 'semester','data']));
    }
    public function readDocument($id)
    {
        $doc = $this->documents->find($id);
        $file = $doc->file()->first();
        if (!is_null(auth()->user()->students)) {
            $user = auth()->user()->students->class;
            if (!is_null($doc->semester->first())) {
                if ($user->sem_id !== $doc->semester->first()->sem_id) {
                    return abort(403, 'Bạn không có quyền truy cập tài liệu này');
                }
            }
        }
        return view('site.document.read', compact('file', 'doc'));
    }
    public function showDocument($id)
    {
        $sem_name = null;
        $active = '1';
        $data = $this->documents->find($id);
        $file = $data->file()->first();
        $category = $data->category()->first();
        if (!is_null(auth()->user()->students)) {
            $user = auth()->user()->students->class;
            if (!is_null($data->semester->first())) {
                if ($user->sem_id !== $data->semester->first()->sem_id) {
                    $active = "0";
                }
                $sem_name = $data->semester->first()->sem_name;
            }
            return view('site.document.show', compact(['data', 'category', 'active', 'file', 'sem_name']));
        }
        // dd($data->semester->first()->sem_id);

        return view('site.document.show', compact(['data', 'category', 'active', 'file', 'sem_name']));
    }

    public function search(Request $request)
    {
        //dd($request);
        $htmlOption = $this->getCategory($parentId = '');
        if (!is_null($request->keyword)) {
            if (!is_null($request->collection)) {
                if ($request->search_by == "all") {
                    $data = $this->documents->where('approved', '=', 1)
                        ->where('category_id', 'LIKE', $request->collection)
                        ->where('title', 'LIKE', '%' . $request->keyword . '%')
                        ->orWhere('author', 'LIKE', '%' . $request->keyword . '%')
                        ->orWhere('date_of_issue', 'LIKE', '%' . $request->keyword . '%')
                        ->orWhere('category_id', 'LIKE', '%' . $request->keyword . '%')
                        ->paginate(7);
                    return view('site.search', compact(['data', 'htmlOption']));
                }
                $data = $this->documents->where('approved', '=', 1)
                    ->where('category_id', 'LIKE', $request->collection)
                    ->where($request->search_by, 'LIKE', '%' . $request->keyword . '%')
                    ->paginate(7);
                return view('site.search', compact(['data', 'htmlOption']));
            }
            if ($request->search_by == "all") {
                $data = $this->documents->where('approved', '=', 1)
                    ->where('title', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('author', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('date_of_issue', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('category_id', 'LIKE', '%' . $request->keyword . '%')
                    ->paginate(7);
                return view('site.search', compact(['data', 'htmlOption']));
            }
            $data = $this->documents->where('approved', '=', 1)
                ->where($request->search_by, 'LIKE', '%' . $request->keyword . '%')
                ->paginate(7);
            return view('site.search', compact(['data', 'htmlOption']));
        } else {
            if (!is_null($request->collection)) {
                $data = $this->documents->where('approved', '=', 1)
                    ->where('category_id', 'LIKE', $request->collection)
                    ->paginate(7);
                return view('site.search', compact(['data', 'htmlOption']));
            }
            $data = $this->documents->where('approved', '=', 1)->paginate(7);
            return view('site.search', compact(['data', 'htmlOption']));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date_of_issue' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'file' => 'required|file|mimes:doc,docx,pdf',
            'semester_id' => Rule::requiredIf($request->exists('semester_id'))
        ]);
        $approve = 0;
        $fileName = Str::slug($request->title) . '.' . $request->file->extension();
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        $request->file->move(public_path('file'), $fileName);
        $user = auth()->user()->roles->first();
        $doc = $this->documents->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'date_of_issue' => $request->date_of_issue,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'approved' => $approve
        ]);
        $doc->semester()->attach($request->semester_id, ['created_at' => now(), 'updated_at' => now()]);
        $doc->file()->create([
            'name' => $fileName,
            'type' => $type,
            'size' => $size,
            'approved' => $approve
        ]);
        return redirect()->route('site.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return view('site.profile.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('site.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc|max:255',
            'name' => 'required',
            'phone' => 'required|numeric',
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone_number' => $request->phone,
        ]);

        return redirect()->route('site.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showResetPasswordForm()
    {
        return view('site.profile.resetPassword');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $request->validate([
            'new_password' => 'required|min:8',
            'rpt_new_password' => 'required|min:8'
        ]);
        $password = Hash::make($request->new_password);
        $user->update([
            'password' => $password,
        ]);
        return redirect()->route('site.profile');
    }

    public function destroy($id)
    {
        //
    }
}
