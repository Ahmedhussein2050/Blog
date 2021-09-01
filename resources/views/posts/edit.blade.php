@extends('layouts.app')
@section('title')
    Edit Post
@endsection
@section('content')


    <form class="mb-5 w-50 m-auto" method="post" action="{{url('/post/'.$post->id)}}">
        @csrf
        <div class="m-3">
            <label class="form-label">Post title</label>
            @error('title')
            <div class="m-2 w-75 alert alert-danger">{{ $message }}</div>
            @enderror
            <input placeholder="Title" type="text" value="{{$post->title}}" name="title" class="form-control">
        </div>
        <div class="m-3">
            <label class="form-label">Post</label>
            @error('body')
            <div class="m-2 w-75 alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea class="form-control" name="body" rows="5">{{$post->body}}</textarea>
        </div>
        {{--        <label class="px-3 form-label">Category/ies</label>--}}
        {{--        <br>--}}
        {{--        @foreach($categories as $category)--}}
        {{--            <span class="p-3">--}}
        {{--                <input type="checkbox" name="category[]" value="{{$category->id}}">--}}
        {{--                {{$category->name}}--}}
        {{--            </span>--}}
        {{--        @endforeach--}}
        {{--        <div class="m-3">--}}
        {{--            <label for="exampleInputPassword1" class="form-label">Image</label>--}}
        {{--            @error('desc')--}}
        {{--            <div class="m-2 w-75 alert alert-danger">{{ $message }}</div>--}}
        {{--            @enderror--}}
        {{--            <input class="form-control" name="image" id="exampleInputPassword1" type="file" accept="image/*">--}}
        {{--        </div>--}}
        <button type="submit" class="btn btn-dark m-3">Post</button>
    </form>

@endsection
