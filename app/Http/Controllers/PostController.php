<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        if(!$posts) {
            return view("Database not concected");
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:225',
            'description' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show',compact('post'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

/**
 * Update the specified resource in storage.
 * 
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:225',
        'description' => 'required',
    ]);

    $post = Post::find($id);
    if (!$post) {
        return redirect()->route('posts.index')->with('error', 'Post not found');
    }
    $post->update($request->all());
    return redirect()->route('posts.index')->with('success', 'Post has been updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
    
        if (!$post) {
            return redirect()->route('posts.index')->with("error", "Post not found");
        }
    
        $post->delete();
        return redirect()->route('posts.index')->with("success", "Post deleted successfully");
    }
    
    public function create() {
        return view('posts.create');
    }


}
