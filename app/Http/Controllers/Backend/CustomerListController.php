<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CustomerListDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    public function index(CustomerListDataTable $dataTable){
        return $dataTable->render('admin.customer-list.index');
    }

    public function StatusChange(Request $request){
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 'active' : 'inactive';
        $customer->save();
        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }
}
