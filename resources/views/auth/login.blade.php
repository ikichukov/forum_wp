@extends('layouts.app')

@section('content')
    <br/> <br/>
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <div class="special-line">
                </div>

                <br/>

                <img src="{{ asset('img/logo.jpg') }}" class="center-block img-responsive"/>

                <br/>

                <div class="text-center" style="font-size: 24px;">
                    <i>Welcome back!</i>
                </div>

                <br/>

                <!-- SIGN IN FORM -->
                <form class="form-horizontal" role="form" method="POST" action="{{url('/login')}}">
                    {!! csrf_field() !!}

                    <!-- EMAIL -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" placeholder="E-mail address" value="{{old('email')}}"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <!-- EMAIL -->

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

                    <label>
                        <input type="checkbox" name="remember"> <span>REMEMBER ME</span>
                    </label>
                    <div class="text-right">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">forgot your password?</a>
                    </div>
                    <button class="btn form-control" style="background-color: #DF8026; color: black;" type="submit">
                        <i class="fa fa-btn fa-sign-in"></i>SIGN IN
                    </button>
                </form>
                <!-- SIGN IN FORM ENDS -->

                <br/>

                <div class="special-line" style="margin-top: 20px;">
                </div>
            </div>
        </div>
        <br/>
    </div>
@endsection
