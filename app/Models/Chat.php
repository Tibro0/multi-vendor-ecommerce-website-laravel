<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function receiverProfile(){
        return $this->belongsTo(User::class, 'receiver_id', 'id')->select(['id', 'image', 'name']);
    }

    public function senderProfile(){
        return $this->belongsTo(User::class, 'sender_id', 'id')->select(['id', 'image', 'name']);
    }
}
