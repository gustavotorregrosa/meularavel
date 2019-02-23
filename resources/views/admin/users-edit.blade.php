@extends('admin.layout')

@section('titulo', 'CodeHacking')

@section('conteudo')

    <h2>Editar Usuario</h2>

    <?php // var_dump($usuario) ?>

    <img style="max-height:200px;" class="img-fluid img-thumbnail"
                @if($usuario->photo)
                  src="{{ url(Storage::url($usuario->photo->path)) }}"
                  @else
                  alt="sem foto"
                @endif
                >
    

    <form method="post" enctype="multipart/form-data" action="{{ url('/admin/users/'.$usuario->id) }}"> 
        @method('patch')
        @csrf
        <input type="hidden" name="id-usuario" value="<?= $usuario->id ?>">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario->name?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $usuario->email?>">
        </div>
        <div class="form-check">
            <label>Papel</label>
            <br>
            <select class="form-control" name="papel" id="papel" required>
                <option disabled>Escolha um papel</option>
                @foreach($papeis as $papel)
                    <option value="{{ $papel->id }}"
                    @if($papel->id == $usuario->role_id)
                        selected
                    @endif
                    >{{ $papel->name }}</option>
                @endforeach
            </select> 
        </div>

        <div class="form-check">
            <label>Choose a profile picture:</label>
            <input type="file" id="foto" name="foto">
        </div>

        <div class="form-check">
            <label>Status</label>
            <br>
            <select class="form-control" name="status" id="status" required>
                <option selected value="0">Inativo</option>
                <option  
                @if($usuario->is_active)
                    selected
                @endif
                value="1">Ativo</option>
            </select> 
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br><br>

    <form method="post" action="{{ url('/admin/users/del-foto/'.$usuario->id) }}"> 
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Deleta foto</button>
    </form>
@endsection
