@extends('series.layout')

@section('cabeçalho')
Series
@endsection
     
@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>

<ul class='list-group'>
    @foreach($series as $serie)
    <li class='list-group-item d-flex justify-content-between aling-items-center'>
        {{$serie->nome}}
        <span class="d-flex">
            <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">Temporadas</a>
                <i class="fas fa-external-link-alt"></i>
            <form method="post"  action="/series/remover/{{$serie->id}}"
                onsubmit="return confirm('Tem certeza?')">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </span>
    </li>
    @endforeach
@endsection
