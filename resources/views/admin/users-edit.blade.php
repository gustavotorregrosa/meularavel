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
            <label >Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario->name?>">
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
@endsection
