@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-details')}}">Edit your details</a></li>
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-avatar')}}">Edit avatar</a></li>
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-signature')}}">Edit signature</a></li>
                    <li class="active"><a href="{{url('/users/'.$user->username.'/control-panel/edit-email')}}">Edit e-mail & password</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @if($errors->any())
                    @foreach($errors->any() as $error)
                        {{ $error }}
                    @endforeach
                @endif
                <h2  class="page-header">Edit password</h2>
                <div class="col-md-4">
                    @if(\Session::has('message'))
                        <div class="alert alert-info">
                            {{ \Session::get('message') }}
                        </div>
                    @endif
                    {!! Form::open(['method' => 'post', 'url' => '/password/' . $user->username . '/change']) !!}
                    <label>New password</label>
                    <input type="password" name="new" class="form-control" />
                    <label>Confirm new password</label>
                    <input type="password" name="confirm-new" class="form-control" /> <br/>
                    <button class="btn btn-orange form-control" type="submit">
                        <i class="fa fa-btn fa-key"></i> Change password
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection