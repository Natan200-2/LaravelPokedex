@extends('layouts.main')

@section('title', 'Início')

@section('content')
    <h1>List of Pokémon</h1>

    @if(isset($pokemonImages))
    
    <div class="row row-cols-1 row-cols-md-4 g-3 w-100">
        @foreach($pokemonImages as $pokemon)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src='{{ $pokemon['image_url'] }}' class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $pokemon['name'] }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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