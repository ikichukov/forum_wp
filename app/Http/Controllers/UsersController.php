<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\VisitorMessage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (\Auth::guest()) return redirect('/login');

        if(\Auth::user() && \Auth::user()->username === $user->username){
            foreach(VisitorMessage::where('username_to', $user->username)->where('read', false)->get() as $message){
                $message->read = true;
                $message->update();
            }
            $user->number = 0;
            $user->update();
        }

        $page = Input::get('page')?Input::get('page'):1;
        $messages_per_page = 10;
        $total = $user->received_visitor_messages()->count();
        $messages = $user->received_visitor_messages()->orderBy('created_at', 'desc')->skip(($page-1)*$messages_per_page)->take($messages_per_page)->get();
        $showing = $messages->count();
        $from = ($page-1)*$messages_per_page+1;
        $to = $from + $showing - 1;

        return view('users.show', ['user' => $user, 'messages' => $messages, 'page' => $page, 'count' => ($total/10)+1, 'total' => $total, 'from' => $from, 'to' => $to]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validation($validation){

        \Auth::logout();
        if(User::where('validation', $validation)->first() != null)
        {
        $user = User::where('validation', $validation)->first();
        $user->validated = true;
        $user->save();

        return redirect('/')->with('success', 'Your account has been successfully validated!');
        }
        else
        {
            return redirect('/')->with('error', 'The validation code is incorrect. Validation failed.');
        }

    }

    public function editDetails(User $user)
    {
        if(\Auth::guest()) return redirect('/login');
        return view('control-panel.edit-details')->with('user', $user);
    }

    public function saveEditedDetails(User $user, Request $request)
    {
        $user->home = $request->input('home');
        $user->facebook = $request->input('facebook');
        $user->skype = $request->input('skype');
        $user->spotify = $request->input('spotify');
        $user->linkedin = $request->input('linkedin');
        $user->location = $request->input('location');
        $user->gender = $request->input('gender');
        $user->hobbies = $request->input('hobbies');
        $user->about = $request->input('about');
        $user->update();

        return redirect('/users/'.$user->username.'/control-panel/edit-details');
    }

    public function editAvatar(User $user)
    {
        if(\Auth::guest()) return redirect('/login');
        return view('control-panel.edit-avatar')->with('user', $user);
    }

    public function uploadAvatar(User $user, Request $request)
    {
        if($request->file('local'))
        {
            $file = $request->file('local');
            $name = str_random() . "." . $file->getClientOriginalExtension();
            $file->move('img/', $name);
            $user->avatar = 'img/' . $name;
            $user->update();
        }
        else if($request->has('url'))
        {
            $image = Image::make('http://someurl.com/image.jpg')->save('/path/saveAsImageName.jpg');
        }

        return redirect('/users/' . $user->username . '/control-panel/edit-avatar');
    }

    public function editSignature(User $user)
    {
        return view('control-panel.edit-signature')->with('user', $user);
    }

    public function updateSignature(User $user, Request $request)
    {
        $user->signature = $request->input('signature');
        $user->update();
        return redirect('/users/' . $user->username . '/control-panel/edit-signature');

    }

    public function editEmail(User $user)
    {
        return view('control-panel.edit-email-password')->with('user', $user);
    }

    public function updatePassword (User $user, Request $request)
    {
        if($request->input('new') == null || $request->input('confirm-new') == null)
        {
            return view('control-panel.edit-email-password')->with('message', 'There are password fields missing.');
        }
        else if($request->input('new') !== $request->input('confirm-new'))
        {
            return view('control-panel.edit-email-password', ['user' => $user])->with('message', 'The password do not match.');
        }
        else
        {
            $user->password = bcrypt($request->input('new'));
            $user->update();
            return view('control-panel.edit-email-password')->with('message', 'Password changed.');
        }
    }
}
