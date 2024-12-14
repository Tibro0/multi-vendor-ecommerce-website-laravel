<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\NewsletterSubscribeDataTable;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\NewsletterSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribersController extends Controller
{
    public function index(NewsletterSubscribeDataTable $dataTable){
        return $dataTable->render('admin.subscriber.index');
    }

    public function sendMail(Request $request){
        $request->validate([
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        $emails = NewsletterSubscribe::where('is_verified', 1)->pluck('email')->toArray();
        Mail::to($emails)->send(new Newsletter($request->subject, ($request->message)));

        toastr()->success('Mail Has Been Send');
        return redirect()->back();
    }

    public function destroy(string $id){
        $subscriber = NewsletterSubscribe::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }


}
