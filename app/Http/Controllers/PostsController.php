<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Topic;
use App\Post;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function create(Forum $forum, $id)
    {
        if(\Auth::guest()) return redirect('/login');
        if(\Auth::user()->validated == false) return redirect('/');

        $text = null;
        if(Input::get('quote')!= null){
            $post = Post::where('id', Input::get('quote'))->first();
            $text = "<blockquote>" . $post->text .
                "<footer>by <a href='". url('/users/'. $post->username) . "'>" . $post->username. "</a></footer></blockquote>";
        }
        $topic = Topic::where('id', $id)->first();
        $forum_slug = $forum->slug;
        $title = "Re: " . $topic->name;
        return view('posts.create', ['forum' => $forum, 'title' => $title, 'topic' => $topic, 'text' => $text]);
    }

    public function store(Forum $forum, $topic, PostsRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->forum = $forum->name;
        $post->topic = $topic;
        $post->username = \Auth::user()->username;
        $post->save();

        return redirect('/forums/' . $forum->slug . '/topics/' . $topic . '?page=last');
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();;
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Forum $forum, $topics, $posts)
    {
        if(\Auth::guest()) return redirect('/login');
        if(\Auth::user()->validated == false) return redirect('/');

        $topic = Topic::where('id', $topics)->first();
        $post = Post::where('id', $posts)->first();

        if(\Auth::user()->username !== $post->username) return redirect('/forums/' . $forum->slug . '/topics/' . $topics);

        return view('posts.edit', ['forum' => $forum, 'topic' => $topic, 'post' => $post]);
    }

    public function update(Forum $forum, $topics, $posts, PostsRequest $request)
    {
        $post = Post::where('id', $posts)->first();
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        if($post->first) {
            $topic = Topic::where('id', $topics)->first();
            $topic->name = $request->input('title');
            $topic->save();
        }
        $post->update();

        return redirect('/forums/' . $forum->slug . '/topics/' . $topics . '?page=last');
    }
}
