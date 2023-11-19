@extends('layouts.main')

@section('title', 'Início')

@section('content')
    <h1>Lista de Pokémons</h1>

    @if(isset($pokemonDetails))
    
    <div class="row row-cols-1 row-cols-md-4 g-3 w-100">
        @foreach($pokemonDetails as $pokemon)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src='{{ $pokemon['image_url'] }}' class="card-img-top" alt="{{ $pokemon['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $pokemon['name'] }}</h5>
                    <p class="card-text">{{ implode(' | ',$pokemon['types'])}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p>No Pokémon data available.</p>
    @endif
@endsection