<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductVariantDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('admin.product.product-variant.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product-variant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product'=>['integer','required'],
            'name'=>['required','max:200'],
            'status'=>['required',]
        ]);

        $variant = new ProductVariant();
        $variant->product_id = $request->product;
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();
        toastr('Created Successfully!','success','success');
        return redirect()->route('admin.products-variant.index',['product'=>$request->product]);
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
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit',compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','max:200'],
            'status'=>['required',]
        ]);

        $variant = ProductVariant::findOrFail($id);
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();
        toastr('Updated Successfully!','success','success');
        return redirect()->route('admin.products-variant.index',['product'=>$variant->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variantIteamCheck = ProductVariantItem::where('product_variant_id', $variant->id)->count();
        if ($variantIteamCheck > 0) {
            return response(['status'=>'error', 'message'=>'This variant contain variant items in it delete the variant iteams first for delete this variant!']);
        }
        $variant->delete();
        return response(['status'=>'success', 'message'=>'Deleted Seccessfully!']);
    }

    public function ChangeStatus(Request $request){
        $variant = ProductVariant::findOrFail($request->id);

        $variant->status = $request->status == 'true' ? 1 : 0;
        $variant->save();
        return response(['message' => 'Status has Been Successfully!']);
    }
}
