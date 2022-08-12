@extends('layouts.main')

@section('title', 'Editar experiência')

@section('content')
<div class='container mt-4'>
    <div class='row'>
        <div class='col-sm-10'>
            <h1>Editar experiência do candidato {{ $candidato->nome }}</h1>
        </div>
        <div class='col-sm-2'>
           
        </div>
    </div>
    <hr>
    <form action="{{ route('experiencias-update', ['id' => $experiencia->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <h3>Experiências</h3>
        <input type='hidden' value='{{ $candidato->id }}' name='candidato'>
        <div class='experiencias'>
            <div class='form-group mt-2'>
                <label for='empresa'>Empresa</label> 
                <input type='text' class='form-control mt-2' name='empresa' value='{{ $experiencia->empresa }}' placeholder='Conte-nos em qual empresa você já trabalhou ou está trabalhando'>
            </div>
            <label for='tempo' class='mt-2'>Tempo</label>
            <div class='input-group mt-2'>            
                <input type="text" class="form-control" placeholder="quando você iniciou nela" name='inicio' value='{{ $experiencia->inicio }}' aria-label="de">
                <span class="input-group-text">até</span>
                <input type="text" class="form-control" placeholder="e quando você saiu, caso seja atual, deixar em branco" name='fim' value='{{ $experiencia->fim }}' aria-label="ate">
            </div>
            <div class='form-group mt-2'>
                <label for='cargo'>Cargo</label> 
                <input type='text' class='form-control mt-2' name='cargo' value='{{ $experiencia->cargo }}' placeholder='Você exercia qual cargo?'>
            </div>
            <div class='form-group mt-2'>
                <label for='salario'>Salário</label> 
                <input type='number' class='form-control mt-2' name='salario' value='{{ $experiencia->salario }}' placeholder='Caso queira, pode informar qual era seu salário'>
            </div>
            <div class='form-group mt-2'>
                <label for='atividades'>Atividades</label> 
                <textarea type='text' class='form-control mt-2' name='atividades'  placeholder='E quais eram suas atividades?'>{{ $experiencia->atividades }}</textarea>
            </div>
        </div>
        <div class='form-group mt-3'>
            <input type='submit' class='btn btn-success' value='Enviar'>
        </div>
    </form>
</div>
@endsection