@extends('layouts.app')

@section('content')
    <br/> <br/>
    <div class="container">
        <!-- NAVIGATION -->
        <i class="fa fa-home"></i> <a href="{{url('/')}}">Home</a>
        <i class="fa fa-chevron-right"></i> {{$post->getTopic->getForum->category}}
        <i class="fa fa-chevron-right"></i> <a href="{{url('/forums/' . $post->getTopic->getForum->slug)}}">{{$post->getTopic->forum}}</a>
        <i class="fa fa-chevron-right"></i> <a href="{{url('/forums/' . $post->getTopic->getForum->slug . '/topics/' . $post->getTopic->id)}}">{{$post->getTopic->name}}</a> <br/>
        <span style="font-size: 24px;"><i class="fa fa-chevron-right"></i> Showing single post reply</span>
        <!-- NAVIGATION -->
        <br/><br/>
        <div class="panel panel-primary">
            <div class="panel-heading" style="padding: 15px 15px;;">

            </div>
            <div class="panel-body">
                <div class="post">
                    <div class="row">
                        <div class="col-xs-2 border-right">
                            <h3><a href="{{ url('/users/' . $post->username) }}"> {{ $post->username }} </a> </h3>
                            <img class="img-responsive" src="{{ asset($post->getUser->avatar) }}"/> <br/>
                            Posts: {{ App\Post::where('username', $post->username)->count() }} <br/>
                            Joined: {{ $post->getUser->created_at->subDay()->format('m/Y') }} <br/>
                        </div>
                        <div class="col-xs-10 no-padding-left">
                            <div class="post-info">
                                <div class="pull-right">#<u><a href="#">{{$post->id}}</a></u></div>
                                <span class="glyphicon glyphicon-film" style="font-size: 20px;"></span>
                                <div class="post-title">
                                    {{ $post->title }}
                                </div> <br/>
                                <small>
                                    <span class="glyphicon glyphicon-comment"></span> by <a href="{{ url('/users/' . $post->username) }}">{{$post->username}}</a> &raquo; {{ $post->created_at }}
                                </small>
                            </div>
                            <div class="post-text">
                                {{ $post->text }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection