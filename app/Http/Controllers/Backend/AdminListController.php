<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminListDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index(AdminListDataTable $dataTable){
        return $dataTable->render('admin.admin-list.index');
    }

    public function StatusChange(Request $request){
        $admin = User::findOrFail($request->id);
        $admin->status = $request->status == 'true' ? 'active' : 'inactive';
        $admin->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }

    public function destroy(string $id){
        $admin = User::findOrFail($id);

        $products = Product::where('vendor_id', $admin->vendor->id)->get();
        if (count($products) > 0) {
            return response(['status' => 'error', 'message' => 'Admin cant be deleted Please Ban The User Instead of Delete.' ]);
        }

        Vendor::where('user_id', $admin->id)->delete();
        $admin->delete();

        return response(['status' => 'success', 'message'=> 'Deleted Successfully!']);
    }
}