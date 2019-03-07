@extends('admin.layout')

@section('titulo', 'CodeHacking')

@section('conteudo')

    postar fotos


    <form action="/admin/photo" class="dropzone">
        @csrf
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>

@endsection
