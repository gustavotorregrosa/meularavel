<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersERequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $dados = [
        'usuarios' => \App\User::all()
      ];

        return view('admin.users', $dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = [
            'papeis' => \App\Role::all()
        ];

        return view('admin.users-create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $role_id = $request->input('papel');
        $is_active = $request->input('status', '0');
        $nome = $request->input('nome');
        $email = $request->input('email');
        $password = \bcrypt($request->input('password'));
        $foto = $request->file('foto');
        $extensao = $foto->getClientOriginalExtension();
        $novoNome = \md5(time().$foto->getClientOriginalName());
        $novoNome .= ".".$extensao;
        $foto->move('storage/imagens/usuarios', $novoNome);
        $objFoto = \App\Photo::create([
            'path' => $novoNome
        ]);
        $id_foto = $objFoto->id;
        $usuario = \App\User::create([
            'role_id' => $role_id,
            'photo_id' => $id_foto,
            'is_active' => $is_active,
            'name' => $nome,
            'email' => $email,
            'password' => $password
        ]);

        \Session::flash('msg-sucesso', 'Usuario criado');
        return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          return view('admin.users-show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::with(['role', 'photo'])->where('id', $id)->first();
        $dados = [
            'usuario' => $user,
            'papeis' => \App\Role::all()
        ];
        return view('admin.users-edit', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersERequest $request, $id)
    {
        $usuario = \App\User::with('photo')->where('id', $id)->first();
        
        $usuario->role_id = $request->input('papel');
        $usuario->is_active = $request->input('status', '0');
        $usuario->name = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->save();

        if($fotoNova = $request->file('foto')){
                $id_foto = $usuario->photo_id;
                @unlink(public_path()."/storage".$usuario->photo->path);
                $extensao = $fotoNova->getClientOriginalExtension();
                $novoNome = \md5(time().$fotoNova->getClientOriginalName());
                $novoNome .= ".".$extensao;
                $fotoNova->move('storage/imagens/usuarios', $novoNome);
                $usuario->photo->path = $novoNome;
                $usuario->photo->save();    
        }
        return redirect('/admin/users');


    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = \App\User::with('photo')->where('id', $id)->first();
        @unlink(public_path()."/storage".$usuario->photo->path);
        $usuario->delete();
        return redirect('/admin/users');

    }

    public function deletaFoto($id){
        $usuario = \App\User::with('photo')->where('id', $id)->first();
        @unlink(public_path()."/storage".$usuario->photo->path);
        return redirect('/admin/users');
    }
}
