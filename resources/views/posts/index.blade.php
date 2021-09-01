@extends('layouts.app')
@section('content')
        @if(count($posts) > 0)
            <div class="row">
                @foreach($posts as $post)
                    <div class="card m-4 w-100" style="width: 18rem;">
                        <div class="card-body post-card">
                            <h4 class="card-title mb-0">{{$post->title}}</h4>
                            <small>{{$post->created_at}} <b>by {{$post->user->name}}</b></small>
                            <p class="card-text mt-3">{{substr($post->body,0,100)}}
                                @if(strlen($post->body) > 100)
                                    <a href="{{url('post/'.$post->id)}}">
                                        Read More
                                    </a>
                                @endif
                            </p>
                            @if($post->image != null)
                                <img
                                    class="img img-fluid mb-4"
                                    style="width: 600px; display: block !important;"
                                    src="{{asset($post->image)}}"
                                    alt="not found"
                                >
                            @endif
                            <a href="{{url('post/'.$post->id)}}" class="btn btn-primary">show</a>
                            @if(auth()->user()->id == $post->user_id)
                            <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-success">edit</a>
                            <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger">delete</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            {{$posts->links()}}
        @else
          <p class="alert alert-danger">No Posts Founded</p>
        @endif
@endsection
