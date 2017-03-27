<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Forum;
use App\Topic;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForumsController extends Controller
{
    public function show(Forum $forum)
    {

        if(Input::get('search')){
            $topics = Topic::where('forum', $forum->name)->where('name', Input::get('search'))->get();
        }
        else $topics = $forum->topics;

        return view('forums.show', [
            'forum' => $forum,
            'topics' => $topics,
        ]);
    }
}
