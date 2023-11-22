@extends('layouts.main')

@section('title', 'Erro')
    
@section('content')
    <div class="error">
        {{$error}}
        <div class="links">
            <a href="/">Voltar para o início</a>
        </div>
    </div>
@endsection