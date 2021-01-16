<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
    
        return view('post.index')->with('posts', $user->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:40',
            'text' => 'required|max:100'
          ]);    
    
          $post = new Post;
          $post->title = $request->input('title');
          $post->text = $request->input('text');
          $post->public = $request->input('public') === 'public';
          $post->user_id = auth()->user()->id;
    
          $post->save();
    
          return redirect('/posts')->with('success','Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $post->title;
        $post->text;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        return view('post.edit')->with('posts', $user->posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:40',
            'text' => 'required|max:100'
          ]);    
    
          $post = Post::find($id);
          $post->title = $request->input('title');
          $post->text = $request->input('text');
          $post->public = $request->input('public') === 'public';
          $post->user_id = auth()->user()->id;
    
          $post->save();
    
          return redirect('/posts')->with('success', 'Your post has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/posts')->with('success', 'Your post has been deleted.'); 
    }

    public function delete($id)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        return view('post.delete')->with('posts', $user->posts);   
    }

    public function __construct(){
        $this->middleware('auth', ['except' => ['public']]);
    }

    public function public(){
    $posts = Post::where('public', true)->get();

    return view('post.public')->with('posts', $posts);
    }
}
