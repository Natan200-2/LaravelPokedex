<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokeAPIController extends Controller
{

    public function index(){
        $client = new Client();
        try{
            $response = $client->request("GET", "https://pokeapi.co/api/v2/pokemon?limit=151", ['verify' => false]);
            $data = json_decode($response->getBody(), true);
        
            $pokemonDetails = collect($data['results'])->map(function ($pokemon) use ($client) {
                $pokemonId = $this->extractPokemonIdFromUrl($pokemon['url']);
                $imageUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$pokemonId}.png";

                $response = $client->request("GET","https://pokeapi.co/api/v2/pokemon/{$pokemonId}", ["verify"=> false]);

                $pokemonData = json_decode($response->getBody(), true);

                $types = collect($pokemonData["types"])->pluck('type.name')->toArray();
        
                return [
                    'id' => $pokemonId,
                    'image_url' => $imageUrl,
                    'name' => $pokemon['name'],
                    'types' => $types,
                ];
            });
        
            return view('welcome', ['pokemonDetails' => $pokemonDetails]);
            
        }catch (\Exception $e){ 

            return view('errors.pokemon_error', ['error' => $e->getMessage()]);

        }
    }

    private function extractPokemonIdFromUrl($url){
    // Extrai o ID do Pokémon da URL
    $matches = [];
    preg_match('/\/(\d+)\/$/', $url, $matches);

    return $matches[1] ?? null;

    }

    public function show($id){
        $client = new Client();
        try{
        $response = $client->request('GET','https://pokeapi.co/api/v2/pokemon/'. $id, ['verify' => false]);

        $imageUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$id}.png";
        
        $pokemon = json_decode($response->getBody(), true);
        
        $abilities = collect($pokemon["abilities"])->pluck("ability.name")->toArray();
        
        $types = collect($pokemon["types"])->pluck('type.name')->toArray();

        $stats = $pokemon['stats'];

        $hp = $stats[0]['base_stat'];
        $attack = $stats[1]['base_stat'];
        $defense = $stats[2]['base_stat'];
        $speed = $stats[5]['base_stat'];
        
        $locationRequest = $client->request('GET','https://pokeapi.co/api/v2/pokemon/'.$id. '/encounters', ['verify' => false]);

        $locations = json_decode($locationRequest->getBody(), true);

        return view('show', ['pokemon'=> $pokemon, 'image'=> $imageUrl, 'types' => $types, 'abilities'=> $abilities, 'hp' => $hp, 'attack' => $attack, 'defense' => $defense, 'speed' => $speed,'locations' => $locations]);

        }catch (\Exception $e){

            return view('errors.pokemon_error', ['error' => $e->getMessage()]);

        }
    }

}