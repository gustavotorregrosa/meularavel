@extends('admin.layout')

@section('titulo', 'CodeHacking')

@section('conteudo')

    <h2>Criar post</h2>

    <form method="post" enctype="multipart/form-data" action="{{ url('/admin/posts') }}"> 
        @csrf
        <div class="form-group">
            <label>Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
        </div>

        @if(isset($categorias))
        <div class="form-check">
            <label>Categoria</label>
            <br>
            <select class="form-control" name="categoria" id="categoria" required>
                <option disabled selected>Escolha uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                @endforeach
            </select> 
        </div>
        @endif


        <div class="form-check">
            <label>Body</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>

        <div class="form-check">
            <label>Choose a profile picture:</label>
            <input type="file" id="foto" name="foto">
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
