<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\component\Recusive;

class CategoryController extends Controller
{

    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->category->orderBy('created_at', 'asc')->paginate(7);
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.create', compact('htmlOption'));
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
            'title' => 'required|max:255|unique:category',
            'description' => 'required',
            'categoryType' => 'required'
        ]);
        $this->category->create([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->rootCategory,
            'is_collection' => $request->categoryType
        ]);
        return redirect()->route('category.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->category->find($id);
        $childCategory = $category->childCategory;
        // dd($category->childCategory);
        return view('admin.category.show', compact('category', 'childCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact(['category', 'htmlOption']));
    }


    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $this->category->find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->rootCategory,
        ]);
        return redirect()->route('category.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        $category->childCategory()->update([
            'parent_id' => 0
        ]);
        $category->documents()->update([
            'category_id' => 13
        ]);
        $category->delete();
        return redirect()->back();
    }
}
