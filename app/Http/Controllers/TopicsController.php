<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\Topic;
//use App\Http\Requests;
use App\Forum;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\TopicsRequest;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{

    public function show(Forum $forum, $id)
    {
        $topic = Topic::find($id);
        $topic->views = $topic->views + 1;
        $topic->save();

        $count = ceil(Post::where('topic', $topic->id)->get()->count()/5);
        $page = Input::get('page')?Input::get('page'):1;
        if($page > $count || $page === 'last') $page = $count;
        if(Input::get('search')){
            $posts = Post::where('topic', $topic->id)->where('created_at', '<=', Carbon::now()->subDay(Input::get('time')))->orderBy(Input::get('sort'), Input::get('order'))->get();
            $count = 1;
        }
        else $posts = Post::where('topic', $topic->id)->skip(5*($page-1))->take(5)->get();
        return view('topics.show', ['topic' => $topic, 'page' => $page, 'count' => $count, 'posts' => $posts]);
    }

    public function create(Forum $forum)
    {
        if(\Auth::guest()) return redirect('/login');
        if(\Auth::user()->validated == false) return redirect('/');

        return view('topics.create', compact('forum'));
    }

    public function store(Forum $forum, TopicsRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->input('name');
        $topic->username = \Auth::user()->username;
        $topic->forum = $forum->name;
        $topic->category = $forum->getCategory->name;
        $topic->icon = $request->input('icon');
        $topic->save();

        $post = new Post();
        $post->title = $request->input('name');
        $post->text = $request->input('text');
        $post->forum = $forum->name;
        $post->topic = $topic->id;
        $post->username = \Auth::user()->username;
        $post->first = true;
        $post->icon = $request->input('icon');
        $post->save();

        return redirect('/forums/' . $forum->slug . '/topics/' . $topic->id);
    }
}
