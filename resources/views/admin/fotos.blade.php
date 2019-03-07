@extends('admin.layout')

@section('titulo', 'CodeHacking')

@section('conteudo')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
  @foreach($fotos as $foto)
    <tr>
      <td>
            <img style="max-height: 100px;" class="img-fluid img-thumbnail" src="{{ url(Storage::url($foto->path)) }}">
      </td>
      <td>
            <button class="btn btn-danger btn-sm">deletar</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<br><br>

{{$fotos->links()}}

@endsection
