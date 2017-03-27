@extends('layouts.app')



@section('content')
<div class="container">
    <!-- SUCCESSFUL USER VALIDATION MESSAGE -->
    @if(\Session::has('success'))
        <div class="row">
            <div class="alert alert-success text-center">
                {{ \Session::get('success') }}
            </div>
        </div>
    @endif
    <!-- UNSUCCESSFUL USER VALIDATION MESSAGE -->
    @if(\Session::has('error'))
        <div class="row">
            <div class="alert alert-danger text-center">
                {{ \Session::get('error') }}
            </div>
        </div>
    @endif

    <br/> <br/>

    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('img/logo.jpg')}}" class="img-responsive"/>
                </div>
            </div>
            <br/>
            <div class="row">
                @foreach($categories as $category)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <strong> {{ $category->name }} </strong>
                                </div>
                                <div class="col-xs-1 text-center"> Topics </div>
                                <div class="col-xs-1 text-center"> Posts </div>
                                <div class="col-xs-3"> Last post </div>
                                <div class="col-xs-1 text-right">
                                    <span id="toggle" class="glyphicon glyphicon-minus"></span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @foreach($category->forums as $forum)
                                <div class="row row1">
                                    <div class="col-xs-6">
                                        <div class="icon pull-left">
                                            <span class="glyphicon glyphicon-{{ $forum->glyphicon }}" style="font-size: 20px"></span>
                                        </div>
                                        <b> <a href="{{ url('/forums/' . $forum->slug) }}">{{ $forum->name }}</a> </b> <br/>
                                        {{ $forum->description }}
                                    </div>
                                    <div class="col-xs-1 text-center">{{ $forum->topics->count() }}</div>
                                    <div class="col-xs-1 text-center">{{ $forum->posts->count() }}</div>
                                    <div class="col-xs-4">
                                        @if(App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first() != null)
                                            <i class="fa fa-{{App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->getTopic->icon}}"></i> <a href="{{url('/forums/'.$forum->slug.'/topics/'.App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->topic.'?page=last')}}"> {{ App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->title }} </a> <br/>
                                            by <a href="{{ url('/users/'.App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->username) }}"> {{ App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->username }} </a>
                                            <div class="pull-right">
                                                <small>
                                                @if(App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->created_at->isToday(\Carbon\Carbon::now()))
                                                    Today, {{App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->created_at->format('H:i')}}
                                                @elseif(App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->created_at->isYesterday(\Carbon\Carbon::now()))
                                                    Yesterday, {{App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->created_at->format('H:i')}}
                                                @else
                                                    {{App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->created_at}}
                                                @endif
                                                <a href="{{url('/forums/'.$forum->slug.'/topics/'.App\Post::where('forum', $forum->name)->orderBy('created_at', 'desc')->first()->topic.'?page=last')}}"><span class="glyphicon glyphicon-expand"></span></a></small>
                                            </div>
                                        @else
                                            No posts.
                                        @endif
                                    </div>
                                </div>
                                <hr class="hr-marginless"/>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        <div class="row text-center">
            <div class="col-md-4">
                <h3><i class="fa fa-signal"></i> STATISTICS</h3>
                <ul class="list-unstyled">
                    <li> <div class="pull-left">Total posts:</div> <div class="pull-right"><b>{{ App\Post::all()->count() }}</b></div> </li> <br/>
                    <li> <div class="pull-left">Total topics:</div> <div class="pull-right"><b>{{ App\Topic::all()->count() }}</b></div> </li> <br/>
                    <li> <div class="pull-left">Total members:</div> <div class="pull-right"><b>{{ App\User::all()->count() }}</b></div> </li> <br/>
                </ul>
                <hr/>
                Welcome to our newest member: <b><a href="{{url('/users/' . App\User::orderBy('created_at', 'desc')->first()->username)}}">{{ App\User::orderBy('created_at', 'desc')->first()->username }}</a></b>
            </div>
            <div class="col-md-4">
                <h3><i class="fa fa-birthday-cake"></i> BIRTHDAYS</h3>
                No birthdays today.
            </div>
            <div class="col-md-4">
                <h3><i class="fa fa-history"></i> LATEST POSTS</h3>
                @foreach(App\Post::orderBy('created_at', 'desc')->take(5)->get() as $post)
                    <i class="fa fa-btn fa-arrow-right"></i> <a href="{{url('/forums/' . $post->getTopic->getForum->slug . '/topics/' . $post->topic . '?page=last')}}">{{ $post->title }}</a> <br/>
                @endforeach
            </div>
        </div>

        <br/>
        <br/>
</div>
<br/>
<div class="text-center">
    All times are GMT. The time is <b>{{\Carbon\Carbon::now()->format('H:i')}}</b> at the moment.
</div>
<br/>
<footer class="bg-green">
    <div class="container-fluid">
        <div class="row">
            <div class="text-center" style="color: white;">
                <small><a href="{{ url('/') }}"> www.theforum.com </a><br/>
                    copyright &copy; FINKI, 2016</small>
            </div>
        </div>
    </div>
</footer>
@endsection
