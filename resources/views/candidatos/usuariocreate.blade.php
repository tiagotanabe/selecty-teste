@extends('layouts.main')

@section('title', 'Cadastro de Usuario do Candidato')

@section('scripts')
<script>
    $('#formCandidato').on('submit', function() {
        var usuario = $('input[name="usuario"]').val();
        var senha = $('input[name="senha"]').val();
        var confirmacao = $('input[name="confirmacaoSenha"]').val();
        if (usuario.length == 0) {
            alert('Informe o usuario');
            return false;
        } else if (senha != confirmacao) {
            alert('A confirmação da senha não combina com a senha informada!');
            return false;
        }
    });
</script>
@endsection

@section('content')
<div class='container mt-4'>
    <div class='row'>
        <div class='col-sm-10'>
            <h1>Cadastrar usuário</h1>
        </div>
        <div class='col-sm-2'>
            <a href="{{ route('candidatos-index') }}" class='btn btn-outline-primary'>Voltar</a>
        </div>
    </div>
    <hr>
    <form id='formCandidato' action="{{ route('usuario-store', ['id' => $id]) }}" method="POST">
        @csrf
        <h3>Dados Pessoais</h3>
        <div class='form-group'>
            <label for='usuario'>Usuário</label>
            <input type='text' class='form-control' name='usuario' placeholder='Digite um usuario para cadastrar'>
        </div>
        <div class='form-group mt-2'>
            <label for='senha'>Senha</label>
            <input type='password' class='form-control' name='senha' placeholder='Digite a sua senha'>
        </div>   
        <div class='form-group mt-2'>
            <label for='confirmacaoSenha'>Confirmação da senha</label>
            <input type='password' class='form-control' name='confirmacaoSenha' placeholder='Confirme a senha informada no campo de cima'>
        </div>        
        <div class='form-group mt-3'>
            <input type='submit' class='btn btn-success' value='Enviar'>
        </div>
    </form>
</div>
@endsection