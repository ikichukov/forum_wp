<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\VisitorMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = null;
        $categories = Category::all();
        if(\Auth::user()){
            $notifications = VisitorMessage::where('username_to', \Auth::user()->username)->get()->count();
        }
        return view('home', ['categories'=>$categories, 'notifications'=>$notifications]);
    }
}
