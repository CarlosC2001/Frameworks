<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::all();
        $categories = Category::all();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3',
        ]);
    
        $post = new post;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->save();
    
        return redirect()->route('post')->with('success', 'post created successfully');
    }

    public function destroy($id){
        $post = post::find($id);
        $post->delete();
        return redirect()->route('post')->with('success', 'post deleted successfully');
    }

    public function show($id){
        $post = post::find($id);
        $categories = Category::all();
        return view('post.show', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, $id){
        $post = post::find($id);
        
        $post->title = $request->title;
        $post->save();

        return redirect()->route('post')->with('success', 'post updated successfully');
    }
}
