@extends('layouts\main')

@section('title', 'Lista de Formações Acadêmicas do Candidato')

@section('scripts')
    
@endsection

@section('content')
<div class='container mt-4'>
    <div class='row'>
        <div class=col-sm-10>
            <h1>Lista de Formações do {{ $candidato->nome }}</h1>
        </div>
        <div class=col-sm-2>
            <a href="{{ route('candidatos-index') }}" class='btn btn-outline-primary me-3'>Candidatos</a>
            <a href="{{ route('academicas-create', ['id' => $candidato->id]) }}" class='btn btn-outline-primary'>Novo</a>
        </div>
    </div>
    <hr>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Instituição</th>
      <th scope="col">Curso</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
    @foreach($academicas as $academica)
    <tr>
      <th scope="row">{{ $academica->id }}</th>
      <td>{{ $academica->instituicao }}</td>
      <td>{{ $academica->curso }}</td>      
      <td class='d-flex'>
        <form action="{{ route('academicas-edit', ['id' => $academica->id]) }}" method='POST'>
            @csrf
            <button type='submit' class='btn btn-primary me-2'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
            </button>
        </form>
        <form action="{{ route('academicas-destroy', ['idCandidato' => $candidato->id, 'id' => $academica->id]) }}" method='POST'>
            @csrf
            @method('DELETE')
            <button type='submit' class='btn btn-danger'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
            </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection