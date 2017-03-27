@extends('layouts.app')

@section('content')
    <br/> <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <!-- NAVIGATION -->
                <i class="fa fa-home"></i> <a href="{{url('/')}}">Home</a>
                <i class="fa fa-chevron-right"></i> {{$forum->category}}
                <i class="fa fa-chevron-right"></i> <a href="{{url('/forums/' . $forum->slug)}}">{{$forum->name}}</a> <br/>
                <span style="font-size: 24px;"><i class="fa fa-chevron-right"></i> Create a new topic</span>
                <!-- NAVIGATION -->
                <br/> <br/>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                {!! Form::open(['method'=>'post', 'url' => url('/forums/'.$forum->slug.'/topics/store')]) !!}
                <label>Topic icon:</label> <br/>
                <input type="radio" name="icon" value="file" checked="checked"/> <i class="fa fa-file fa-2x"></i>
                <input type="radio" name="icon" value="book"/> <i class="fa fa-book fa-2x"></i>
                <input type="radio" name="icon" value="eye"/> <i class="fa fa-eye fa-2x"></i>
                <input type="radio" name="icon" value="envelope"/> <i class="fa fa-envelope fa-2x"></i>
                <input type="radio" name="icon" value="film"/> <i class="fa fa-film fa-2x"></i>
                <input type="radio" name="icon" value="thumbs-up"/> <i class="fa fa-thumbs-up fa-2x"></i>
                <input type="radio" name="icon" value="institution"/> <i class="fa fa-institution fa-2x"></i>
                <input type="radio" name="icon" value="gift"/> <i class="fa fa-gift fa-2x"></i>
                <input type="radio" name="icon" value="photo"/> <i class="fa fa-photo fa-2x"></i> <br/>
                <label>Topic name:</label>
                <input name="name" type="text" class="form-control" value="{{ old('name') }}"/> <br/>
                <label>Opening post body:</label>
                <textarea name="text" class="form-control" rows="10">{{ old('text') }}</textarea> <br/>
                <button class="btn btn-orange form-control" type="submit" style="color: black;">
                    <i class="fa fa-plus"></i> Create topic
                </button> <br/> <br/>
                <a href="{{url('/forums/'. $forum->slug)}}" class="btn btn-red form-control" style="color: white;">
                    <i class="fa fa-times"></i> Cancel
                </a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection