@extends('admin.layout')

@section('titulo', 'CodeHacking')



@section('conteudo')
    <h2>usuarios</h2>
    <br>



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
              <td>{{ $usuario->role ? $usuario->role->name : "sem perfil" }}</td>
              <td>{{ $usuario->is_active ? 'Ativo' : 'Desativado' }}</td>
              <td>{{ $usuario->created_at->diffForHumans()}}</td>
              <td>{{ $usuario->updated_at->diffForHumans() }}</td>
              <td>
                <a href="{{ url('/admin/users/'.$usuario->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>
                <button data-id="{{ $usuario->id }}"  class="btn btn-danger btn-sm am-del-usuario">Deletar</button>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    @endif


    <div id="mdl-deleta-usuario" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="frm-deleta-usuario" method="post">
            @csrf
            @method('delete')
            <input type="hidden" id="url-fixa" value="{{ url('/admin/users/') }}">
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger">Deletar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>


@endsection
