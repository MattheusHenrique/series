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
        <form method="post"  action="/series/remover/{{$serie->id}}"
            onsubmit="return confirm('Tem certeza?')">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
    </li>
    @endforeach
@endsection
