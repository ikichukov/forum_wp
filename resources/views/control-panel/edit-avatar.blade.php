@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-details')}}">Edit your details</a></li>
                    <li class="active"><a href="{{url('/users/'.$user->username.'/control-panel/edit-avatar')}}">Edit avatar</a></li>
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-signature')}}">Edit signature</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="page-header">Edit your avatar</h2>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="special-line"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div style="align-items: center;">
                                    <img src="{{asset($user->avatar)}}" class="img-responsive"/>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            {!! Form::open(['method' => 'post', 'files' => true]) !!}
                            <label>Upload a picture from your computer</label>
                            {!! Form::file('local') !!} <br/>
                            <button class="btn btn-orange form-control" type="submit">
                                <i class="fa fa-btn fa-upload"></i> Upload avatar
                            </button>
                            {!! Form::close() !!}
                        </div>
                        <br/>
                        <div class="special-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection