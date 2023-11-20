<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokeAPIController extends Controller
{

    public function index(){
        $client = new Client();
        $response = $client->request("GET", "https://pokeapi.co/api/v2/pokemon?limit=25", ['verify' => false]);
        $data = json_decode($response->getBody(), true);
    
        $pokemonDetails = collect($data['results'])->map(function ($pokemon) use ($client) {
            $pokemonId = $this->extractPokemonIdFromUrl($pokemon['url']);
            $imageUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$pokemonId}.png";

            $response = $client->request("GET","https://pokeapi.co/api/v2/pokemon/{$pokemonId}", ["verify"=> false]);

            $pokemonData = json_decode($response->getBody(), true);

            $types = collect($pokemonData["types"])->pluck('type.name')->toArray();


    
            return [
                'image_url' => $imageUrl,
                'name' => $pokemon['name'],
                'types' => $types,
            ];
        });
    
        return view('welcome', ['pokemonDetails' => $pokemonDetails]);
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
