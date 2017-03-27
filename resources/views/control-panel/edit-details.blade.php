@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="{{url('/users/'.$user->username.'/control-panel/edit-details')}}">Edit your details</a></li>
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-avatar')}}">Edit avatar</a></li>
                    <li><a href="{{url('/users/'.$user->username.'/control-panel/edit-signature')}}">Edit signature</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="page-header">Edit your details</h2>
                <div class="row">
                    {!! Form::open(['method'=>'post', 'url'=> url('/users/'.$user->username.'/control-panel/edit-details')]) !!}
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><i class="fa fa-bookmark"></i> Home page URL</label>
                                <input type="text" placeholder="http://www.example.com" class="form-control" name="home" value="{{$user->home}}"/> <br/>
                            </div>
                            <div class="form-group">
                                <label>Social media and WWW</label>
                                <div class="row">
                                    <div class="col-sm-1 text-right">
                                        <i class="fa fa-facebook-official fa-2x"></i>
                                    </div>
                                    <div class="col-sm-11">
                                        <input type="text" placeholder="Facebook" class="form-control" name="facebook" value="{{$user->facebook}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1 text-right">
                                        <i class="fa fa-skype fa-2x"></i>
                                    </div>
                                    <div class="col-sm-11">
                                        <input type="text" placeholder="Skype" class="form-control" name="skype" value="{{$user->skype}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1 text-right">
                                        <i class="fa fa-spotify fa-2x"></i>
                                    </div>
                                    <div class="col-sm-11">
                                        <input type="text" placeholder="Spotify" class="form-control" name="spotify" value="{{$user->spotify}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1 text-right">
                                        <i class="fa fa-linkedin-square fa-2x"></i>
                                    </div>
                                    <div class="col-sm-11">
                                        <input type="text" placeholder="LinkedIn" class="form-control" name="linkedin" value="{{$user->linkedin}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-globe"></i> Location</label>
                                <input type="text" class="form-control" name="location" value="{{$user->location}}"/> <br/>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-venus-mars"></i> Gender</label>
                                <input type="text" class="form-control" name="gender" value="{{$user->gender}}"/> <br/>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa fa-soccer-ball-o"></i> Your hobbies and interests</label>
                                <textarea name="hobbies" class="form-control" rows="8" style="overflow-y: scroll;">{{$user->hobbies}}</textarea>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-info-circle"></i> About yourself</label>
                                <textarea name="about" class="form-control" rows="8" style="overflow-y: scroll;">{{$user->about}}</textarea>
                            </div>
                        </div>
                        <button class="btn btn-orange form-control" type="submit"><i class="fa fa-save"></i> Edit info</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection