<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use App\component\Recusive;
use App\Models\Category;
use App\Http\Requests\StoreFileRequest;
use App\Models\DocumentUpload;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\File;
use App\Models\Semester;
use Illuminate\Validation\Rule;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $documents;
    public function __construct(Documents $document)
    {
        $this->documents = $document;
    }
    public function index()
    {
        $data = $this->documents->where('approved', '=', 1)->paginate(8);
        return view('admin.documents.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $semester = Semester::all();
        $htmlOption = $this->getCategory($parentId = '');
        $category = Category::where('parent_id','=','1')->get();
        foreach($category as $cate){
            array_push($data,$cate->id);
        }
        // dd($data);
        return view('admin.documents.create', compact(['htmlOption', 'semester','data']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date_of_issue' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'file' => 'required|file|mimes:doc,docx,pdf',
            'semester_id' => Rule::requiredIf($request->exists('semester_id'))
        ]);
        $approve = 1;
        $fileName = Str::slug($request->title) . '.' . $request->file->extension();
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        $request->file->move(public_path('file'), $fileName);
        $user = auth()->user()->roles->first();
        if ($user->role_id === 3) {
            $approve = 0;
        }
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
        return redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
            return view('admin.documents.show', compact(['data', 'category', 'active', 'file', 'sem_name']));
        }
        // dd($data->semester->first()->sem_id);

        return view('admin.documents.show', compact(['data', 'category', 'active', 'file', 'sem_name']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        $category = Category::where('parent_id','=','1')->get();
        foreach($category as $cate){
            array_push($data,$cate->id);
        }
        $doc = $this->documents->find($id);
        // dd($doc);
        $semester = Semester::all();
        $file = $doc->file()->first();
        $htmlOption = $this->getCategory($parentId = $doc->category_id);
        if (!is_null($file)) {
            return view('admin.documents.edit', compact(['htmlOption', 'doc', 'file', 'semester','data']));
        } else {
            $file = null;
            return view('admin.documents.edit', compact(['htmlOption', 'doc', 'file', 'semester','data']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc = $this->documents->find($id);
        $doc->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'date_of_issue' => $request->date_of_issue,
            'category_id' => $request->category_id,
            'author' => $request->author,
        ]);
        $doc->semester()->syncWithPivotValues($request->semester_id, ['created_at' => now(), 'updated_at' => now()]);
        if ($request->hasFile("file")) {
            $fileName = Str::slug($request->title) . '.' . $request->file->extension();
            $type = $request->file->getClientMimeType();
            $size = $request->file->getSize();
            $request->file->move(public_path('file'), $fileName);
            $doc->file()->create([
                'name' => $fileName,
                'type' => $type,
                'size' => $size,
            ]);
        }
        return redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = $this->documents->find($id);
        $doc->semester()->detach();
        $file = $doc->file()->first();
        $file_name = $file->name;
        $file_path = public_path('file/' . $file_name);
        unlink($file_path);
        $file->delete();
        $doc->delete();
        return redirect()->back();
    }

    public function readfile($id)
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
        return view('admin.documents.read', compact('file', 'doc'));
    }

    public function download($id)
    {
        $files = File::find($id);
        $doc = $this->documents->find($files->document_id);
        if (!is_null(auth()->user()->students)) {
            $user = auth()->user()->students->class;
            if (!is_null($doc->semester->first())) {
                if ($user->sem_id !== $doc->semester->first()->sem_id) {
                    return abort(404, 'Bạn không có quyền tải xuống tài liệu này');
                }
            }
        }
        // dd($doc);
        return response()->download(public_path('file/' . $files->name), $files->name);
    }

    public function censor()
    {
        $data = $this->documents->where('approved', '=', 0)->paginate(8);
        // dd($data);
        return view('admin.documents.censor', compact('data'));
    }

    public function censor_show($id)
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
            return view('admin.documents.censor_show', compact(['data', 'category', 'active', 'file', 'sem_name']));
        }
        // dd($data->semester->first()->sem_id);

        return view('admin.documents.censor_show', compact(['data', 'category', 'active', 'file', 'sem_name']));
    }

    public function approved($id)
    {
        $doc = $this->documents->find($id);
        $doc->update([
            'approved' => 1
        ]);
        $doc->file()->update([
            'approved' => 1
        ]);
        return redirect()->route('documents.censor');
    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
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
                    return view('admin.documents.search', compact(['data', 'htmlOption']));
                }
                $data = $this->documents->where('approved', '=', 1)
                                        ->where('category_id', 'LIKE', $request->collection)
                                        ->where($request->search_by, 'LIKE', '%' . $request->keyword . '%')
                                        ->paginate(7);
                return view('admin.documents.search', compact(['data', 'htmlOption']));
            }
            if ($request->search_by == "all") {
                $data = $this->documents->where('approved', '=', 1)
                                        ->where('title', 'LIKE', '%' . $request->keyword . '%')
                                        ->orWhere('author', 'LIKE', '%' . $request->keyword . '%')
                                        ->orWhere('date_of_issue', 'LIKE', '%' . $request->keyword . '%')
                                        ->orWhere('category_id', 'LIKE', '%' . $request->keyword . '%')
                                        ->paginate(7);
                return view('admin.documents.search', compact(['data', 'htmlOption']));
            }
            $data = $this->documents->where('approved', '=', 1)
                                    ->where($request->search_by, 'LIKE', '%' . $request->keyword . '%')
                                    ->paginate(7);
            return view('admin.documents.search', compact(['data', 'htmlOption']));
        } else {
            if (!is_null($request->collection)) {
                $data = $this->documents->where('approved', '=', 1)
                                        ->where('category_id', 'LIKE', $request->collection)
                                        ->paginate(7);
                return view('admin.documents.search', compact(['data', 'htmlOption']));
            }
            $data = $this->documents->where('approved', '=', 1)->paginate(7);
            return view('admin.documents.search', compact(['data', 'htmlOption']));
        }

        // if ($request->ajax()) {
        //     $output = '';
        //     $document = DB::table('documents')->where('title', 'LIKE', '%' . $request->search . '%')->get();
        //     if ($document) {
        //         foreach ($document as $doc) {
        //             $output .= '
        //             <tr>
        //                 <td>' . $doc->document_id . '</td>
        //                 <td><a href="' . route('documents.read', ['id' => $doc->document_id]) . '">' . $doc->title . '</a></td>
        //                 <td>' . $doc->author . '</td>
        //                 <td></td>
        //                 <td class="text-center">
        //                     abc
        //                 </td>
        //             </tr>
        //             ';
        //         }
        //     }
        //     return Response($output);
        // }
    }
}
