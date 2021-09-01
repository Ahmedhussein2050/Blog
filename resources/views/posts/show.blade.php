@extends('layouts.app')
@section('content')

<div class="row py-5">

        @if($post->image == null)
            <div class="text-center">
                <h1 class="mb-0">{{$post->title}}</h1>
                <small>{{$post->created_at}}</small>
                <b>by {{$post->user->name}}</b>
                <p class="w-50 m-auto" style="line-height: 1.6; margin-top: 16px !important; margin-bottom: 16px !important; ">
                    {{$post->body}}
                </p>
                <a href="{{url('/post')}}" class="btn btn-secondary">back</a>
                @if(auth()->user()->id == $post->user_id)
                    <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-success">edit</a>
                    <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger">delete</a>
                @endif
            </div>
        @endif
        @if($post->image != null)

            <div class="col-lg-6">
                <div class="my-3">
                    <img
                        class="img img-fluid mb-4"
                        style="width: 600px; display: block !important;"
                        src="{{asset($post->image)}}"
                        alt="not found"
                    >
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <h1 class="mb-0">{{$post->title}}</h1>
                    <small>{{$post->created_at}}</small>
                    <b>by {{$post->user->name}}</b>
                    <p style="line-height: 1.6; margin-top: 16px !important; margin-bottom: 16px !important; ">
                        {{$post->body}}
                    </p>
                    <a href="{{url('/post')}}" class="btn btn-secondary">back</a>
                    @if(auth()->user()->id == $post->user_id)
                        <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-success">edit</a>
                        <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger">delete</a>
                    @endif
                </div>
            </div>

        @endif
</div>
@endsection
