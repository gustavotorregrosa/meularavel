@extends('admin.layout')

@section('titulo', 'CodeHacking')

@section('conteudo')

    <h2>Criar usuários</h2>

    <form method="post" enctype="multipart/form-data" action="{{ url('/admin/users') }}"> 
        @csrf
        <div class="form-group">
            <label >Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
        </div>

        <div class="form-check">
            <label>Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
 
        </div>
        <div class="form-check">
            <label>Papel</label>
            <br>
            <select class="form-control" name="papel" id="papel" required>
                <option disabled selected>Escolha um papel</option>
                @foreach($papeis as $papel)
                    <option value="{{ $papel->id }}">{{ $papel->name }}</option>
                @endforeach
            </select> 
        </div>

        <div class="form-check">
            <label>Choose a profile picture:</label>
            <input type="file" id="foto" name="foto">
        </div>



        <div class="form-check">
            <label>Status</label>
            <br>
            <select class="form-control" name="status" id="status" required>
                <option selected value="0">Inativo</option>
                <option value="1">Ativo</option>
            </select> 
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
