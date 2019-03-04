@extends('admin.layout')

@section('titulo', 'CodeHacking')



@section('conteudo')
    <h2>posts</h2>
    <input type="hidden" id="base-url" value="{{ url('/admin/posts') }}">
    <br>
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Usuario</th>
          <th scope="col">Foto</th>
          <th scope="col">Titulo</th>
          <th scope="col">Corpo</th>
          <th scope="col">Acoes</th>
        </tr>
      </thead>
      <tbody>
      @foreach($posts as $post)
      <tr>
              <td>{{$post->user->name}}</td>
              <td>
                  @if($post->photo)
                      <img style="max-width: 200px;" src="{{url(\Storage::url($post->photo->path))}}">
                  @endif
              </td>
              <td>{{$post->titulo}}</td>
              <td>{{substr($post->corpo, 0, 15)}}</td>
              <td> 
                    <button data-id="{{$post->id}}" class="btn edita-post btn-primary btn-sm">Editar</button>
                    &nbsp;&nbsp;
                    <button data-id="{{$post->id}}" class="btn btn-am-deleta-post btn-danger btn-sm">Apagar</button>
              </td>
              
      </tr>
      @endforeach
      </tbody>
    </table>
    

    <div id="mdl-deleta-post" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Deleta post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="frm-deleta-post" method="post">
          @csrf
          @method('delete')
          <div class="modal-body">
            <p>Deseja deletar o post?</p>
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
