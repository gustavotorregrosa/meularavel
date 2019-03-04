<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use \App\Post;

class PostController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with([
            'photo',
            'user'            
        ])->get();
        $dados = [
            'posts' => $posts
        ];
        return view('admin.posts', $dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $post = new Post;
        $post->user_id = \Auth::user()->id;
        $post->titulo = $request->input('titulo');
        $post->corpo = $request->input('body');

        if($foto = $request->file('foto')){
            $extensao = $foto->getClientOriginalExtension();
            $novoNome = \md5(time().$foto->getClientOriginalName());
            $novoNome .= ".".$extensao;
            $foto->move('storage/imagens', $novoNome);
            $objFoto = \App\Photo::create([
                'path' => $novoNome
            ]);
            $id_foto = $objFoto->id;
            $post->photo_id = $id_foto;
        }

        $post->save();
        \Session::flash('msg-sucesso', 'post criado');
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editar()
    {
        return view('admin.posts-edit');
    }


    public function edit($id)
    {
        $post = Post::with('photo')->where('id', $id)->first();
        $dados = [
            'post' => $post
        ];
        return view('admin.posts-edit', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        $post = Post::with('photo')->where('id', $id)->first();
        $post->titulo = $request->input('titulo');
        $post->corpo = $request->input('body');
        if($foto = $request->file('foto')){
            @unlink(public_path()."/storage".$post->photo->path);
            $extensao = $foto->getClientOriginalExtension();
            $novoNome = \md5(time().$foto->getClientOriginalName());
            $novoNome .= ".".$extensao;
            $foto->move('storage/imagens', $novoNome);
            $objFoto = \App\Photo::create([
                'path' => $novoNome
            ]);
            $id_foto = $objFoto->id;
            $post->photo_id = $id_foto;
        }

        $post->save();
        \Session::flash('msg-sucesso', 'post alterado');
        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::with('photo')->where('id', $id)->first();
        if($post->photo){
            @unlink(public_path()."/storage".$post->photo->path);
        }
        $post->delete();
        \Session::flash('msg-sucesso', 'post deletado');
        return redirect('/admin/posts');


    }
}
