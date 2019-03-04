@extends('admin.layout')

@section('titulo', 'CodeHacking')

@section('conteudo')

    categorias

    <ul>
    @foreach($categorias as $categoria)
        <li>{{$categoria->name}}</li>
    @endforeach
    </ul>
@endsection
