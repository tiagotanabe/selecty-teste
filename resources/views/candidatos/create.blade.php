@extends('layouts.main')

@section('title', 'Cadastro de Curriculo')

@section('scripts')
<script>
    $('#formCandidato').on('submit', function() {
        var nome = $('input[name="nome"]').val();
        var email = $('input[name="email"]').val();
        var telefone = $('input[name="telefone"]').val();
        if (nome.length == 0) {
            alert('Informe o nome do candidato');
            return false;
        } else if (email.length > 0 && telefone.length == 0) {
            alert('Informe o telefone');
            return false;
        } else if (telefone.length > 0 && email.length == 0) {
            alert('Informe o e-mail');
            return false;
        }
    });
</script>
@endsection

@section('content')
<div class='container mt-4'>
    <div class='row'>
        <div class='col-sm-10'>
            <h1>Cadastrar candidato</h1>
        </div>
        <div class='col-sm-2'>
            <a href="{{ route('candidatos-index') }}" class='btn btn-outline-primary'>Voltar</a>
        </div>
    </div>
    <hr>
    <form id='formCandidato' action="{{ route('candidatos-store') }}" method="POST">
        @csrf
        <h3>Dados Pessoais</h3>
        <div class='form-group'>
            <label for='nome'>Nome Completo</label>
            <input type='text' class='form-control' name='nome' placeholder='Digite seu nome completo'>
        </div>
        <div class='form-group mt-2'>
            <label for='email'>E-mail</label>
            <input type='text' class='form-control' name='email' placeholder='Digite seu e-mail para contato'>
        </div>   
        <div class='form-group mt-2'>
            <label for='telefone'>Telefone</label>
            <input type='text' class='form-control' maxlength='12' name='telefone' placeholder='Informe seu telefone'>
        </div>        
        <div class='form-group mt-3'>
            <input type='submit' class='btn btn-success' value='Enviar'>
        </div>
    </form>
</div>
@endsection