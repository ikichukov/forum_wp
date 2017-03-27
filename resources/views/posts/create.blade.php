@extends('layouts.app')

@section('content')
    <br/> <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <!-- NAVIGATION -->
                <i class="fa fa-home"></i> <a href="{{url('/')}}">Home</a>
                <i class="fa fa-chevron-right"></i> {{$forum->category}}
                <i class="fa fa-chevron-right"></i> <a href="{{url('/forums/' . $forum->slug)}}">{{$topic->forum}}</a>
                <i class="fa fa-chevron-right"></i> <a href="{{url('/forums/' . $forum->slug . '/topics/' . $topic->id)}}">{{$topic->name}}</a> <br/>
                <span style="font-size: 24px;"><i class="fa fa-chevron-right"></i> Create a new reply</span>
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
                {!! Form::open(['method'=>'post', 'url' => url('/forums/'.$forum->slug.'/topics/'.$topic->id.'/posts/store')]) !!}
                <label>Title:</label>
                <input name="title" type="text" class="form-control" value="@if(old('title')){{ old('title') }}@else{{ $title }}@endif"/> <br/>
                <label>Reply body:</label>
                <textarea name="text" class="form-control" rows="10"> @if(old('text')){{ old('text') }}@else{{ $text }}@endif</textarea> <br/>
                <button class="btn btn-orange form-control" type="submit" style="color: black;">
                    <i class="fa fa-reply"></i> Post reply
                </button> <br/> <br/>
                <a href="{{url('/forums/'. $forum->slug . '/topics/' . $topic->id)}}" class="btn btn-red form-control" style="color: white;">
                    <i class="fa fa-times"></i> Cancel
                </a>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection