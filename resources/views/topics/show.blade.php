@extends('layouts.app')

@section('content')
    <br/> <br/>
    <div class="container">
        <i class="fa fa-home"></i> <a href="{{url('/')}}">Home</a> <i class="fa fa-chevron-right"></i> {{$topic->category}} <i class="fa fa-chevron-right"></i> <a href="{{url('/forums/' . $topic->getForum->slug)}}">{{$topic->forum}}</a> <br/>
        <span style="font-size: 24px;"><i class="fa fa-chevron-right"></i> {{ $topic->name }}</span>
        <hr/>
        <div class="row">
            <div class="col-xs-3">
                <a href="{{ url('/forums/' . $topic->getForum->slug . '/topics/' . $topic->id . '/posts/create') }}" class="btn btn-lg btn-orange"><span class="glyphicon glyphicon-share-alt"></span> Post reply</a>
            </div>
            <div class="col-xs-9 text-right">
                Total posts: <b>{{ $topic->posts->count() }}</b>
            </div>
        </div>
        <hr style="margin-bottom: 5px;"/>
        <div class="text-right">
            <!-- PAGINATION -->
            @if($count != 1)
                @include('layouts._pagination', ['page'=>$page, 'url' => '/forums/'.$topic->getForum->slug.'/topics/'.$topic->id, 'count' => $count ])
            @else <br/>
            @endif
            <!-- PAGINATION -->
        </div>
        <!-- SHOW THE TOPIC POSTS -->
        @for($i=0; $i<count($posts); ++$i)
            <div class="post">
                <div class="row">
                    <div class="col-xs-2 border-right">
                        <h3><a href="{{ url('/users/' . $posts->get($i)->username) }}"> {{ $posts->get($i)->username }} </a> </h3>
                        <img class="img-responsive" src="{{ asset($posts->get($i)->getUser->avatar) }}"/> <br/>
                        Posts: {{ App\Post::where('username', $posts->get($i)->username)->count() }} <br/>
                        Joined: {{ $posts->get($i)->getUser->created_at->format('m/Y') }} <br/>
                    </div>
                    <div class="col-xs-10 no-padding-left">
                        <div class="post-info">
                            <div class="pull-right">#<u><a href="{{url('/posts/'.$posts->get($i)->id)}}">{{($page-1)*5+$i+1}}</a></u></div>
                            @if($posts->get($i)->first)
                            <i class="fa fa-{{$posts->get($i)->icon}} fa-2x"></i>
                            @endif
                            <div class="post-title">
                                {{ $posts->get($i)->title }}
                            </div> <br/>
                            <small>
                                <i class="fa fa-comment"></i> by <a href="{{ url('/users/' . $posts->get($i)->username) }}">{{$posts->get($i)->username}}</a> &raquo; {{ $posts->get($i)->created_at }}
                            </small>
                        </div>
                        <div class="post-text">
                            {!! $posts->get($i)->text !!}
                            @if($posts->get($i)->getUser->signature)
                                <div class="row" style="margin-top: 120px;">
                                    <div class="col-sm-7" style="border-top: 1px solid #ddd; padding-top: 5px;">
                                        {{$posts->get($i)->getUser->signature}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <br/>
                    </div>
                </div>
                <div class="text-right" style="margin-right: 20px;">
                <a href="{{ url('/forums/' . $topic->getForum->slug . '/topics/' . $topic->id . '/posts/create?quote=' . $posts->get($i)->id) }}" class="btn btn-orange btn-sm"><i class="fa fa-quote-right"></i> Quote</a>
                @if(Auth::user())
                    @if(Auth::user()->username === $posts->get($i)->username)
                        <a href="{{ url('/forums/' . $topic->getForum->slug . '/topics/' . $topic->id . '/posts/edit/' . $posts->get($i)->id) }}" class="btn btn-orange btn-sm"> <i class="fa fa-pencil"></i> Edit</a>
                    @endif
                @endif
                </div>
            </div>
        @endfor
        <!-- POSTS END HERE -->
        <br/>
        <!-- SEARCH FORM -->
        <form method="GET" action="{{url('/forums/' . $topic->getForum->slug . '/topics/' . $topic->id)}}">
        <div class="row text-right">
            Select from previous:
            <input type="hidden" name="search" value="on"/>
            <select name="time">
                <option value="0">All posts</option>
                <option value="1">1 day</option>
                <option value="7">7 days</option>
                <option value="14">2 weeks</option>
                <option value="30">1 month</option>
                <option value="90">3 months</option>
                <option value="180">6 months</option>
                <option value="365">1 year</option>
            </select>
            Sort by:
            <select name="sort">
                <option value="username">Author</option>
                <option value="created_at">Post time</option>
                <option value="title">Subject</option>
            </select>
            <select name="order">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
            <button type="submit" class="btn btn-lg btn-orange" style="margin-bottom: 6px;"><span class="glyphicon glyphicon-search"></span></button>
        </div>
        </form>
        <!-- SEARCH FORM ENDS -->
        <hr/>
            <div class="row">
                <div class="col-xs-3">
                    <a href="{{ url('/forums/' . $topic->getForum->slug . '/topics/' . $topic->id . '/posts/create') }}" class="btn btn-lg btn-orange"><span class="glyphicon glyphicon-share-alt"></span> Post reply</a>
                </div>
                <div class="col-xs-9 text-right">
                    Total posts: <b>{{ $topic->posts->count() }}</b>
                </div>
            </div>
        <hr/>
    </div>
@endsection