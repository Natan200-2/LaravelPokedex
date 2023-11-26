@extends('layouts.main')

@section('title', 'Início')

@section('content')
    <h1>Lista de Pokémons</h1>

    @if(isset($pokemonDetails))
    
    <div class="row row-cols-1 row-cols-md-4 g-3 w-100">
        @foreach($pokemonDetails as $pokemon)
        <div class="col">
            <div class="card">
                <div class="circles-container">
                    <div class="circle" style="background-color: #FE0000"></div>
                    <div class="circle" style="background-color: #F4CE14"></div>
                    <div class="circle" style="background-color: #0c9e49"></div>
                </div>
                    <img src='{{ $pokemon['image_url'] }}' class="card-img-top {{strtolower($pokemon['types'][0])}}" alt="{{ $pokemon['name'] }}">
               <div class="card-body">
                    <h5 class="card-title">{{ $pokemon['name'] }}</h5>
                    <p class="card-text">{{ implode(' | ', $pokemon['types']) }}</p>
                    <a href="/pokemon/{{$pokemon['id']}}" class="btn">Mais detalhes</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p>No Pokémon data available.</p>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var pokemonNames = document.querySelectorAll('.card-title');
    
            pokemonNames.forEach(function (pokemonNameElement) {
                var name = pokemonNameElement.innerText;
                var capitalized = name.charAt(0).toUpperCase() + name.slice(1);
                pokemonNameElement.innerText = capitalized;
            });
        });
    </script>
@endsection
