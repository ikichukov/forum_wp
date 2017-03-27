@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class=""><a href="{{url('/users/'.$user->username.'/control-panel/edit-details')}}">Edit your details</a></li>
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-avatar')}}">Edit avatar</a></li>
                    <li class="active"><a href="{{url('/users/'.$user->username.'/control-panel/edit-signature')}}">Edit signature</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="page-header">Edit your signature</h2>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'post']) !!}
                        <label>Your signature:</label>
                        <textarea class="form-control" name="signature" rows="10">{{ $user->signature }}</textarea> <br/>
                        <input type="submit" class="btn btn-orange form-control" value="Edit" style="color: white;"/>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection