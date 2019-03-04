@extends('admin.layout')

@section('titulo', 'CodeHacking')



@section('conteudo')
    <h2>posts</h2>
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
      <tr>
              <td>Gustavo Torregrosa</td>
              <td>Imagem</td>
              <td>Titulo</td>
              <td>Corpo</td>
              <td> 
                    <button class="btn btn-primary btn-sm">Editar</button>
                    &nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm">Apagar</button>
              </td>
              
            </tr>
      <tbody>
      
      </tbody>
    </table>
    



@endsection
