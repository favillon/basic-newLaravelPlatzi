<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('post.index', compact('posts'));
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
    public function store(PostRequest $request)
    {
        //dd($request->all());
        // Guardar
        $post = Post::create(
            [
                'user_id' => auth()->user()->id
            ] + $request->all()
        );
        //Imagen
        if ($request->file('file')) {
            $post->img = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        //retorno
        return back()->with('status', 'Creado post : ' . $post->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //dd($post->title, $post->img, $post->iframe, $post->id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
         //Imagen
        if ($request->file('file')) {
            // Eliminar Imagen
            Storage::disk('public')->delete($post->img);
            $post->img = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        return back()->with('status', 'Editado post : ' . $post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->img);
        $idPost = $post->id;
        $post->delete();
        return back()->with('status', 'Eliminado post ' . $idPost . ' con exito ');
    }
}
