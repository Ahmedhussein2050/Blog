<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::query()->orderBy('updated_at', 'desc')->paginate(3);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StorePostRequest $request)
    {

        $imageName = '';

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $imageName = 'images/'.$name;
        }

        $validated = $request->validated();
        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->image = $imageName;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $post = Post::query()->findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $post = Post::query()->findOrFail($id);
        if (auth()->user()->id !== $post->user_id)
        {
            return redirect('/post')->with('error', 'unauthorized');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(EditPostRequest $request, $id)
    {
        $validated = $request->validated();
        $post = Post::query()->findOrFail($id);
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $post = Post::query()->findOrFail($id);
        if (auth()->user()->id == $post->user_id)
        {
            $post->delete();
            return redirect('/post');
        }
        return redirect('/post');

    }
}
