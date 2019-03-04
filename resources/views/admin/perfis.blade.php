@extends('admin.layout')

@section('titulo', 'CodeHacking')



@section('conteudo')
    <h2>Perfis</h2>
 
    <button style="float: right;" id="btn-am-cria-perfil" class="btn btn-success btn-sm">Criar</button>
    <br><br>


    @if(count($perfis))
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perfis as $perfil)
                    <tr>
                        <td class="nome-perfil">{{$perfil->name}}</td>
                        <td>
                            <button data-id="{{$perfil->id}}" class="btn btn-primary btn-sm btn-am-edita-perfil">Editar</button>
                                &nbsp;&nbsp;
                            <button data-id="{{$perfil->id}}" class="btn btn-danger btn-sm btn-am-inativa-perfil">Inativar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


    <div id="mdl-inativa-perfil" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inativa perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form id="frm-inativa-perfil" method="post">
                    @csrf
                    @method('delete')
                    <input id="inp-base-url" type="hidden" value="{{ url('admin/perfil') }}">
                    <div class="modal-body">
                        <p>Inativar o perfil <span id="spn-nome-perfil"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Inativar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div id="mdl-edita-perfil" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form id="frm-edita-perfil" method="post">
                    @csrf
                    @method('put')
                    <input id="inp-base-url" type="hidden" value="{{ url('admin/perfil') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome do perfil</label>
                            <input id="nome-perfil" name="nome-perfil" type="text" class="form-control">
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
