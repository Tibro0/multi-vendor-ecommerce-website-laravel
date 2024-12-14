<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

    /**
     * Get SubCategory
     */
    public function getSubCategory(Request $request){
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=> ['required'],
            'sub_category'=> ['required'],
            'name'=> ['required', 'max:200', 'unique:child_categories,name'],
            'status'=> ['required'],
        ]);

        $ChildCategory = new ChildCategory();
        $ChildCategory->category_id = $request->category;
        $ChildCategory->sub_category_id = $request->sub_category;
        $ChildCategory->name = $request->name;
        $ChildCategory->slug = Str::slug($request->name);
        $ChildCategory->status = $request->status;
        $ChildCategory->save();

        toastr()->success('Created Successfully!');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $ChildCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $ChildCategory->category_id)->get();
        return view('admin.child-category.edit', compact('categories','ChildCategory', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category'=> ['required'],
            'sub_category'=> ['required'],
            'name'=> ['required', 'max:200', 'unique:child_categories,name,'.$id],
            'status'=> ['required'],
        ]);

        $ChildCategory =ChildCategory::findOrFail($id);
        $ChildCategory->category_id = $request->category;
        $ChildCategory->sub_category_id = $request->sub_category;
        $ChildCategory->name = $request->name;
        $ChildCategory->slug = Str::slug($request->name);
        $ChildCategory->status = $request->status;
        $ChildCategory->save();

        toastr()->success('Update Successfully!');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ChildCategory = ChildCategory::findOrFail($id);
        if (Product::where('child_category_id', $ChildCategory->id)->count() > 0) {
            return response(['status' => 'error', 'message' => 'This Item Content Relation cant Delete It.']);
        }

        $homeSettings = HomePageSetting::all();
        foreach ($homeSettings as $item) {
            $array = json_decode($item->value, true);
            $collection = collect($array);
            if ($collection->contains('child_category', $ChildCategory->id)) {
                return response(['status' => 'error', 'message' => 'This Item Content Relation cant Delete It.']);
            }
        }
        $ChildCategory->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request){
        $ChildCategory = ChildCategory::findOrFail($request->id);
        $ChildCategory->status = $request->status == 'true' ? 1 : 0;
        $ChildCategory->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }

}
