<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokeAPIController extends Controller
{

    public function index()
    {
        try {
        /*    $response = Http::withOptions(['verify'=>false])->get("https://pokeapi.co/api/v2/pokemon?limit=30");
            $data = $response->json();
        
            $pokemonDetails = collect($data['results'])->map(function ($pokemon) {
                $pokemonId = $this->extractPokemonIdFromUrl($pokemon['url']);
                $imageUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$pokemonId}.png";
        
                return [
                    'id' => $pokemonId,
                    'image_url' => $imageUrl,
                    'name' => $pokemon['name'],
                    'types' => $this->getPokemonTypes($pokemonId),
                ];
            });*/
        
            return view('welcome');
            
        } catch (\Exception $e) { 
            return view('errors.pokemon_error', ['error' => $e->getMessage()]);
        }
    }

    private function extractPokemonIdFromUrl($url)
    {
        return basename($url);
    }

    private function getPokemonTypes($pokemonId)
    {
        $response = Http::withOptions(['verify'=>false])->get("https://pokeapi.co/api/v2/pokemon/{$pokemonId}");
        $pokemonData = $response->json();

        return collect($pokemonData["types"])->pluck('type.name')->toArray();
    }

    public function show($id)
    {
        try {
            $imageUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$id}.png";
        
            $response = Http::withOptions(['verify'=>false])->get("https://pokeapi.co/api/v2/pokemon/{$id}");
            $pokemon = $response->json();
        
            $abilities = collect($pokemon["abilities"])->pluck("ability.name")->toArray();
            $types = collect($pokemon["types"])->pluck('type.name')->toArray();
            $stats = $pokemon['stats'];

            $hp = $stats[0]['base_stat'];
            $attack = $stats[1]['base_stat'];
            $defense = $stats[2]['base_stat'];
            $speed = $stats[5]['base_stat'];

            $locations = Http::withOptions(['verify'=>false])->get("https://pokeapi.co/api/v2/pokemon/{$id}/encounters")->json();
        
            return view('show', [
                'pokemon' => $pokemon,
                'image' => $imageUrl,
                'types' => $types,
                'abilities' => $abilities,
                'hp' => $hp,
                'attack' => $attack,
                'defense' => $defense,
                'speed' => $speed,
                'locations' => $locations
            ]);

        } catch (\Exception $e) {
            return view('errors.pokemon_error', ['error' => $e->getMessage()]);
        }
    }
}
