@extends('admin.layout')

@section('titulo', 'CodeHacking')

@section('conteudo')

    <form method="post" action="{{ url('/admin/categoria') }}">
    @csrf
    <div class="form-group">
        <label>Nome da categoria</label>
        <input type="text" class="form-control" name="nome">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>

@endsection
