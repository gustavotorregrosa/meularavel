@extends('admin.layout')

@section('titulo', 'CodeHacking')



@section('conteudo')
    usuarios
    @if($usuarios)
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Criado</th>
          <th scope="col">Atualizado</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $usuario)
            <tr>
              <td>{{ $usuario->id }}</td>
              <td>{{ $usuario->name }}</td>
              <td>{{ $usuario->email }}</td>
              <td>{{ $usuario->created_at->diffForHumans()}}</td>
              <td>{{ $usuario->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
    @endif
@endsection
