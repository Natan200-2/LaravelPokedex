<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokeAPIController extends Controller
{

    public function index(){
        $client = new Client();
        $response = $client->request("GET", "https://pokeapi.co/api/v2/pokemon?limit=151", ['verify' => false]);
        $data = json_decode($response->getBody(), true);
    
        $pokemonImages = collect($data['results'])->map(function ($pokemon) {
            $pokemonId = $this->extractPokemonIdFromUrl($pokemon['url']);
            $imageUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$pokemonId}.png";
    
            return [
                'image_url' => $imageUrl,
                'name' => $pokemon['name'],
            ];
        });
    
        return view('welcome', ['pokemonImages' => $pokemonImages]);
    }

    private function extractPokemonIdFromUrl($url){
    // Extrai o ID do Pokémon da URL
    $matches = [];
    preg_match('/\/(\d+)\/$/', $url, $matches);

    return $matches[1] ?? null;
    }

    public function getPokemon($pokemonName){
        $client = new Client();
        $response = $client->request("GET","https://pokeapi.co/api/v2/pokemon/". $pokemonName, ['verify' => false]);

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }

    public function getAllPokemons(){
        $client = new Client();
        $response = $client->request('GET','', ['verify' => false]);

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}
