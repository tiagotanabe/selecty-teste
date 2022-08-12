@extends('layouts.main')

@section('title', 'Experiência do Candidato')

@section('scripts')
    <script>
        $('#novaFormacao').on('click', function() {
           $.ajax({
                type: "GET",
                url: '{{ route('nova-academicas') }}',
                dataType:"html",
                success: function(response){
                    $(".academicas:last").append(response);             
                }
            });
        });
    </script>
@endsection

@section('content')
<div class='container mt-4'>
    <div class='row'>
        <div class='col-sm-10'>
            <h1>Cadastrar formação do candidato {{ $candidato->id }}</h1>
        </div>
        <div class='col-sm-2'>
            <a href="{{ route('academicas-index', ['id' => $candidato->id]) }}" class='btn btn-outline-primary'>Voltar</a>
        </div>
    </div>
    <hr>
    <form action="{{ route('academicas-store') }}" method="POST">
        @csrf
        <h3>Formações</h3>
        <input type='hidden' value='{{ $candidato->id }}' name='candidato'>
        <div class='academicas'>
            <div class='form-group mt-2'>
                <label for='empresa'>Instituição</label> 
                <input type='text' class='form-control mt-2' name='instituicao[]' placeholder='Conte-nos em qual instituição você se formou ou está estudando'>
            </div>
            <div class='form-group mt-2'>
                <label for='cargo'>Curso</label> 
                <input type='text' class='form-control mt-2' name='curso[]' placeholder='E qual curso você faz nessa instituição?'>
            </div>
            <label for='tempo' class='mt-2'>Tempo</label>
            <div class='input-group mt-2'>            
                <input type="text" class="form-control" placeholder="quando você iniciou nela" name='inicio[]' aria-label="de">
                <span class="input-group-text">até</span>
                <input type="text" class="form-control" placeholder="e quando você concluiu, caso não concluiu, deixe em branco" name='fim[]' aria-label="ate">
            </div>            
        </div>
        <div class='form-group mt-3'>
            <input id='novaFormacao' type='button' class='btn btn-info' value='Nova Formação'>
        </div>
        <div class='form-group mt-3'>
            <input type='submit' class='btn btn-success' value='Enviar'>
        </div>
    </form>
</div>
@endsection