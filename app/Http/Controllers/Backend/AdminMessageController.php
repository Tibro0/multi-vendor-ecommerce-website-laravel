<?php

namespace App\Http\Controllers\Backend;

use App\Events\MessageEvent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Style\Borders;

class AdminMessageController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $chatUsers = Chat::with('senderProfile')->select(['sender_id'])->where('receiver_id', $userId)->where('sender_id', '!=', $userId)->groupBy('sender_id')->get();
        return view('admin.messenger.index', compact('chatUsers'));
    }

    public function getMessages(Request $request){
        $senderId = Auth::user()->id;
        $receiverId = $request->receiver_id;
        $messages = Chat::whereIn('receiver_id', [$senderId, $receiverId])->whereIn('sender_id', [$senderId, $receiverId])->orderBy('created_at', 'asc')->get();

        return response($messages);
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

        broadcast(new MessageEvent($message->message, $message->receiver_id));

        return response(['status' => 'success', 'message' => 'Message Sent Successfully!']);
    }
}
