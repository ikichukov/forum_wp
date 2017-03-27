@extends('layouts.app')

@section('content')
    <br/> <br/>
    <div class="container">
        <i class="fa fa-home"></i> <a href="{{url('/')}}">Home</a> <i class="fa fa-chevron-right"></i> {{$forum->category}} <br/>
        <span style="font-size: 24px;"><i class="fa fa-chevron-right"></i> {{ $forum->name }}</span>

        <hr/>

        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-5">
                        <a href="{{url('/forums/'.$forum->slug.'/topics/create')}}" class="btn btn-orange btn-lg pull-left" style="margin-right: 10px;"><span class="glyphicon glyphicon-pencil"></span> New topic</a>
                    </div>
                    <div class="col-md-7">
                        {!! Form::open(['method'=>'get', 'class' => 'pull-right']) !!}
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <strong> TOPICS </strong>
                        </div>
                        <div class="col-xs-1 text-center"> Replies </div>
                        <div class="col-xs-1 text-center"> Views </div>
                        <div class="col-xs-4"> Last post </div>
                    </div>
                </div>
                <div class="panel-body">
                    @foreach($topics as $topic)
                        <div class="row row1">
                            <div class="col-xs-6">
                                <div class="icon pull-left">
                                    <i class="fa fa-{{$topic->icon}}" style="font-size: 20px;"></i>
                                </div>
                                <b> <a href="{{url('/forums/' . $forum->slug . '/topics/' . $topic->id)}}">{{ $topic->name }}</a> </b> <br/>
                                <small>
                                    <i class="fa fa-user"></i> <a href="{{ url('/users/' . $topic->username) }}"> {{ $topic->username }}</a>  <span class="glyphicon glyphicon-time"></span>
                                    @if($topic->created_at->isToday(Carbon\Carbon::now())) Today, {{ $topic->created_at->format('H:i') }}
                                    @elseif($topic->created_at->isYesterday(Carbon\Carbon::now())) Yesterday, {{ $topic->created_at->format('H:i') }}
                                    @else {{ $topic->created_at }}
                                    @endif
                                </small>
                            </div>
                            <div class="col-xs-1 text-center">{{ $topic->posts->count()-1 }}</div>
                            <div class="col-xs-1 text-center">{{ $topic->views }}</div>
                            <div class="col-xs-3">
                                <img src="{{ asset(App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->getUser->avatar) }}" class="topic-avatar img-circle pull-left"/>
                                <i class="fa fa-user"></i> <a href="{{ url('/users/' . App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->username) }}">{{ App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->username }}</a> <a href="{{url('/forums/'.$forum->slug.'/topics/'.$topic->id.'?page=last')}}"><span class="glyphicon glyphicon-expand"></span></a> <br/>
                                <small><span class="glyphicon glyphicon-time"></span>
                                    @if(App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->created_at->isToday(Carbon\Carbon::now())) Today, {{ App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->created_at->format('H:i') }}
                                    @elseif(App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->created_at->isYesterday(Carbon\Carbon::now())) Yesterday, {{ App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->created_at->format('H:i') }}
                                    @else {{ App\Post::where('topic', $topic->id)->orderBy('created_at', 'desc')->first()->created_at }}
                                    @endif
                                </small>
                            </div>
                        </div> <hr class="hr-marginless"/>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection