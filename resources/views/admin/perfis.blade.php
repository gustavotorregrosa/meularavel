@extends('admin.layout')

@section('titulo', 'CodeHacking')



@section('conteudo')
    <h2>Perfis</h2>
    <br><br>
    <button style="float: right;" id="btn-am-cria-perfil" class="btn btn-success btn-sm">Criar</button>
    <br><br>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Perfil</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Perfil 1</td>
                <td>
                    <button class="btn btn-primary btn-sm">Editar</button>
                        &nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm">Inativar</button>
                </td>
            </tr>
            <tr>
                <td>Perfil 2</td>
                <td>
                    <button class="btn btn-primary btn-sm">Editar</button>
                        &nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm">Inativar</button>
                </td>
            </tr>
        </tbody>
    </table>













    <div id="mdl-cria-perfil" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form method="post" action="{{ url('admin/perfil') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome do perfil</label>
                            <input name="nome-perfil" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

@endsection
