<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;


use Illuminate\Http\Request;

class PostapiController extends Controller
{
    
    public function index()
    {
        $posts=Post::all();
        return $posts;
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5'
        ]);
        $post = new Post();
        $post->name=$request->input('name');
        $post->description=$request->input('description');
        $post->category_id=$request->input('category');
        $post->save();
        return $post;
    }

    public function show(Post $post)
    {
        //$post=Post::find($id);
        return $post;
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5'
        ]);
        $post = Post::find($id);
        $post->name=$request->input('name');
        $post->description=$request->input('description');
        $post->category_id=$request->input('category');
        $post->save();
        return $post;
    }

    public function destroy(string $id)
    {
        $post=Post::find($id);
        if (is_null($post))
        {
            return response()->json('No se pudo realizar la operacion.',404);
        }
        else{
            $post->delete();
            return response()->noContent();
        }
        
        //return ['Eliminado'];
        
    }
}
