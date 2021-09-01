@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-secondary float-lg-right clearfix mb-5" href="{{url('post/create')}}">Post</a>
                        <br>
                        <h3 class="text-secondary text-center  d-block">{{ __('Here is your posts..!') }}</h3>
                        @foreach($posts as $post)
                            <div class="card my-2 w-100" style="width: 18rem;">
                                <div class="card-body post-card">
                                    <h4 class="card-title mb-0">{{$post->title}}</h4>
                                    <small>{{$post->created_at}}</small>
                                    <p class="card-text mt-3">{{substr($post->body,0,100)}}...
                                        <a href="{{url('post/'.$post->id)}}">
                                            Read More
                                        </a></p>
                                    <a href="{{url('post/'.$post->id)}}" class="card-link">show</a>
                                    <a href="{{url('post/'.$post->id.'/edit')}}" class="card-link">edit</a>
                                    <a href="{{url('post/delete/'.$post->id)}}" class="card-link">delete</a>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
