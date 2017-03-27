@extends('layouts.app')

@section('content')
    <br/> <br/>
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <div class="special-line">
                </div>

                <br/>

                <img src="{{asset('img/logo.jpg')}}" class="center-block img-responsive"/>

                <br/>

                <div class="text-center" style="font-size: 24px;">
                    <b>REGISTER</b>
                </div>

                <br/>

                <!-- SIGN UP FORM -->
                <form method="POST" action="{{url('/register')}}">
                    {!! csrf_field() !!}

                    <!-- USERNAME -->
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}"/>
                        @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                </span>
                        @endif
                    </div>
                    <!-- USERNAME -->

                    <!-- EMAIL -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                             </span>
                        @endif
                    </div>
                    <!-- EMAIL -->

                    <input type="date" class="form-control" name="date"/> <br/>

                    <!-- PASSWORD -->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- PASSWORD -->

                    <!-- CONFIRM PASSWORD -->
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password"/>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- CONFIRM PASSWORD -->

                    <button class="btn form-control" style="background-color: #DF8026; color: black;" type="submit">
                        <i class="fa fa-btn fa-user"></i>SIGN UP
                    </button>
                </form>
                <!-- SIGN UP FORM ENDS -->

                <br/>

                <div class="special-line" style="margin-top: 10px;">
                </div>
            </div>
        </div>
        <br/>
    </div>

@endsection