<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMessageController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $chatUsers = Chat::with('receiverProfile')->select(['receiver_id'])->where('sender_id', $userId)->where('receiver_id', '!=', $userId)->groupBy('receiver_id')->get();
        return view('frontend.dashboard.messenger.index', compact('chatUsers'));
    }

    public function sendMessage(Request $request){
        $request->validate([
            'message' => ['required'],
            'receiver_id' => ['required'],
        ]);

        $message = new Chat();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id =$request->receiver_id;
        $message->message = $request->message;
        $message->save();

        return response(['status' => 'success', 'message' => 'Message Sent Successfully!']);
    }


    public function getMessages(Request $request){
        $senderId = Auth::user()->id;
        $receiverId = $request->receiver_id;

        $messages = Chat::whereIn('receiver_id', [$senderId, $receiverId])->whereIn('sender_id', [$senderId, $receiverId])->orderBy('created_at', 'asc')->get();

        return response($messages);
    }
}
