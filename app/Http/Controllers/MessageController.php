<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Group;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $group = Group::where('id',$request->group)->first();
        $member = Member::where('id',$request->member)->first();
        $timestamp = $request->time;
        //Saving to database
        $message = Message::create([
            "member_id"=> $member->id,
            "group_id"=> $group->id,
            "message" => $request->message,
            "created_at"=> $timestamp
        ]);

        broadcast(new ChatMessage($group, $member, $message))->toOthers();

        return ['data' => 'Message Sent!'];
    }
}
