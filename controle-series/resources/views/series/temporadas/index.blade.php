@extends('layout')

@section('cabeçalho')
    Temporadas
@endsection('conteudo')

@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item">{{$temporada->numero}}</li>
        @endforeach
    </ul>
@endsection