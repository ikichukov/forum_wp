@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 id="timeline">Timeline</h1>
        </div>
        <ul class="timeline">
            @foreach($messages as $message)
                <li
                    @if($message->username_from === $user2)
                        class="timeline-inverted"
                    @endif
                >
                    <div class="timeline-badge"><img src="{{asset($message->sender->avatar)}}" class="img-responsive img-circle"/></div>
                    <div class="timeline-panel">
                        <div class="panel-body">
                            <small class="text-muted"><i class="glyphicon glyphicon-time"></i>
                                @if($message->created_at->isToday(Carbon\Carbon::now())) Today, {{$message->created_at->format('H:i')}}
                                @elseif($message->created_at->isYesterday(Carbon\Carbon::now())) Yesterday, {{ $message->created_at->format('H:i') }}
                                @else {{$message->created_at}}
                                @endif
                                 by <a href="{{url('/users/'.$message->sender->username)}}">{{$message->sender->username}}</a>
                            </small>
                            <p>{{$message->text}}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection