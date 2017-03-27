<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VisitorMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class VisitorMessagesController extends Controller
{
    //store the visitor message
    public function  store(Request $request)
    {
        $parameters = $request->route()->parameters();

        $visitor_message = new VisitorMessage();
        $visitor_message->text = $request->input('text');
        $visitor_message->username_from = $parameters['senders']['username'];
        $visitor_message->username_to = $parameters['users']['username'];
        $visitor_message->save();

        $user = User::where('username', $parameters['users']['username'])->first();
        $user->number = $user->number+1;
        $user->save();

        return redirect('/users/' . $parameters['users']['username']);
    }

    //show the visitor messages conversation
    //between two users
    public function show(User $receiver, User $sender)
    {

        $page = Input::get('page')?Input::get('page'):1;
        $total = VisitorMessage::whereRaw("(`username_to` = '".$sender->username."' and `username_from` = '".$receiver->username."') or (`username_to` = '".$receiver->username."' and `username_from` = '".$sender->username."')")->get()->count();
        $count = floor(($total/10)+1);
        if($page > $count) $page = $count;

        $messages_per_page = 10;
        $messages = VisitorMessage::whereRaw("(`username_to` = '".$sender->username."' and `username_from` = '".$receiver->username."') or (`username_to` = '".$receiver->username."' and `username_from` = '".$sender->username."')")->orderBy('created_at', 'desc')->skip(($page-1)*$messages_per_page)->take($messages_per_page)->get();
        $total = VisitorMessage::whereRaw("(`username_to` = '".$sender->username."' and `username_from` = '".$receiver->username."') or (`username_to` = '".$receiver->username."' and `username_from` = '".$sender->username."')")->get()->count();
        $showing = $messages->count();
        $from = ($page-1)*$messages_per_page+1;
        $to = $from + $showing - 1;



        //$messages = VisitorMessage::whereRaw("(`username_to` = '".$sender->username."' and `username_from` = '".$receiver->username."') or (`username_to` = '".$receiver->username."' and `username_from` = '".$sender->username."')")->orderBy('created_at', 'desc')->get();
        return view('visitor-messages.conversation', ['messages' => $messages, 'from' => $from, 'to' => $to, 'total' => $total, 'user1' => $receiver->username, 'user2' => $sender->username, 'page' => $page, 'count' => $count]);
    }
}
