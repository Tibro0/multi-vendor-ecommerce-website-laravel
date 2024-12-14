<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminProductReviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminProductReviewController extends Controller
{
    public function index(AdminProductReviewDataTable $dataTable){
        return $dataTable->render('admin.product.review.index');
    }

    public function changeStatus(Request $request){
        $review = ProductReview::findOrFail($request->id);
        $review->status = $request->status == 'true' ? 1 : 0;
        $review->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }
}
