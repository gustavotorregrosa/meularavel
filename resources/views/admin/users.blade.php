@extends('admin.layout')

@section('titulo', 'CodeHacking')



@section('conteudo')
    usuarios
    @if($usuarios)
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Foto</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Papel</th>
          <th scope="col">Ativo</th>
          <th scope="col">Criado</th>
          <th scope="col">Atualizado</th>
          <th scope="col">Acoes</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $usuario)
            <tr>
              <td>{{ $usuario->id }}</td>
              <td>{{ $usuario->name }}</td>
              <td><img class="img-fluid img-thumbnail"
                @if($usuario->photo)
                  src="{{ url(Storage::url($usuario->photo->path)) }}"
                  @else
                  alt="sem foto"
                @endif
                >
              </td>
              <td>{{ $usuario->email }}</td>
              <td>{{ $usuario->role->name }}</td>
              <td>{{ $usuario->is_active ? 'Ativo' : 'Desativado' }}</td>
              <td>{{ $usuario->created_at->diffForHumans()}}</td>
              <td>{{ $usuario->updated_at->diffForHumans() }}</td>
              <td><a href="{{ url('/admin/users/'.$usuario->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
    @endif
@endsection
