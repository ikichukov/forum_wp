@extends('layouts.app')

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

@section('content')
    <br/> <br/>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="row">
                    <img src="{{asset($user->avatar)}}" class="img-responsive img-circle"/>
                </div> <br/> <br/>
                <div class="row">
                    <div class="board bg-red">
                        <i class="fa fa-btn fa-birthday-cake" style="font-size: 3em;"></i> <br/> <br/>
                        <span style="font-size: 15px;">{{ \Carbon\Carbon::createFromDate(explode('-', $user->dob)[0], explode('-', $user->dob)[1], explode('-', $user->dob)[2])->format('d/m/Y') }}</span> <br/>
                        <span style="font-size: 15px;">({{ \Carbon\Carbon::createFromDate(explode('-', $user->dob)[0], explode('-', $user->dob)[1], explode('-', $user->dob)[2])->diffInYears(Carbon\Carbon::now()) }})</span>
                    </div>
                </div>
                <div class="row">
                    <div class="board bg-blue">
                        <i class="fa fa-btn fa-calendar-plus-o" style="font-size: 3em;"></i> <br/> <br/>
                        <span style="font-size: 15px;">joined {{$user->created_at->format('d/m/Y')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="board bg-orange">
                        <i class="fa fa-btn fa-pencil" style="font-size: 3em;"></i> <br/> <br/>
                        <span style="font-size: 15px;">{{$user->posts->count()}}
                            @if($user->posts->count()!=1)
                                replies
                            @else
                                reply
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <h1 class="page-header">{{ $user->username }}</h1>
                <dov class="row">
                    <div class="col-sm-6">
                        <h3><i class="fa fa-user"></i> About me</h3>
                        <p>{{ $user->about }}</p>
                        <p> <i class="fa fa-btn fa-bookmark"></i> Personal web-page: <a href="#"> {{$user->home}} </a> </p>
                        <p> <i class="fa fa-globe"></i> Location: <b> {{$user->location}} </b> </p>
                        <p> <i class="fa fa-venus-mars"></i> Gender: <b> {{$user->gender}} </b> </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <h3><i class="fa fa-soccer-ball-o"></i> My hobbies and interests</h3>
                            {{ $user->hobbies }}
                        </div>
                        <div class="row">
                            <h3><i class="fa fa-envelope"></i> Contact</h3> <br/>
                            <p> <i class="fa fa-facebook"></i> <b> <a href="#">{{$user->facebook}}</a> </b> </p>
                            <p> <i class="fa fa-skype"></i> <b> <a href="#">{{$user->skype}}</a> </b> </p>
                            <p> <i class="fa fa-spotify"></i> <b> <a href="#">{{$user->spotify}}</a> </b> </p>
                            <p> <i class="fa fa-linkedin"></i> <b> <a href="#">{{$user->linkedin}}</a> </b> </p>
                        </div>
                    </div>
                </dov>
            </div>
        </div>
        <div class="row">
            <h3 class="page-header">Visitor messages</h3>
            <div class="col-sm-7">
                @if($total != 0)
                    <h4>{{ 'Showing visitor messages ' . $from . ' to ' . $to . ' out of ' . $total }}</h4>
                    @include('visitor-messages._show')
                @endif
                @if($count>1 && $total>10)
                    <div class="pull-right">
                        @include('layouts._pagination', ['page'=>$page, 'url'=>'/users/'.$user->username, 'count'=>$count])
                    </div>
                @endif
            </div>
            <div class="col-sm-5">
                <h3>Write a visitor message</h3>
                {!! Form::open(['url' => 'users/' . $user->username . '/visitor-messages/' . Auth::user()->username]) !!}
                <label>Message:</label> <br/>
                <textarea class="form-control" rows="7" name="text"></textarea> <br/>
                <button type="submit" onclick="send()" class="btn btn-orange pull-right form-control">Send message</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection