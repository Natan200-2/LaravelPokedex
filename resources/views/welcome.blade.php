@extends('layouts.main')

@section('title', 'Início')

@section('content')
    <h1>Pokemon List</h1>

    <div id="pokemonList" class="row row-cols-1 row-cols-md-4 g-3 w-100">
        <!-- Aqui serão exibidos os resultados da API -->
    </div>

    <div id="paginationButtons" class="mt-4 btn-pagination">
        <!-- Botões de paginação -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pokemonListElement = document.getElementById('pokemonList');
            const paginationButtonsElement = document.getElementById('paginationButtons');

            // Função para obter os tipos de um Pokémon
            async function getPokemonTypes(url) {
                const response = await fetch(url);
                const data = await response.json();
                return data.types.map(type => type.type.name);
            }

            // Função para obter o ID de um Pokémon a partir da URL
            function getPokemonIdFromUrl(url) {
                const matches = url.match(/\/(\d+)\/$/);
                return matches ? matches[1] : null;
            }

            // Função para carregar os detalhes dos Pokémon em uma determinada página
            async function loadPokemonDetails(page) {
                try {
                    const response = await fetch(`https://pokeapi.co/api/v2/pokemon?limit=151`);
                    const data = await response.json();

                    // Paginação: Divide os Pokémon em grupos de 12
                    const itemsPerPage = 12;
                    const start = (page - 1) * itemsPerPage;
                    const end = start + itemsPerPage;
                    const pokemonSubset = data.results.slice(start, end);

                    // Limpa o conteúdo atual
                    pokemonListElement.innerHTML = '';

                    // Itera sobre a lista de Pokémon
                    for (const pokemon of pokemonSubset) {
                        const pokemonId = getPokemonIdFromUrl(pokemon.url);
                        const imageUrl = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${pokemonId}.png`;

                        // Obtém os tipos do Pokémon
                        const types = await getPokemonTypes(pokemon.url);

                        // Adiciona o Pokémon à lista
                        pokemonListElement.innerHTML += `
                            <div class="col">
                                <div class="card">
                                    <div class="circles-container">
                                        <div class="circle" style="background-color: #FE0000"></div>
                                        <div class="circle" style="background-color: #F4CE14"></div>
                                        <div class="circle" style="background-color: #0c9e49"></div>
                                    </div>
                                    <img src="${imageUrl}" class="card-img-top ${types[0]}" alt="${pokemon.name}">
                                    <div class="card-body">
                                        <h5 class="card-title">${pokemon.name}</h5>
                                        <p class="card-text">${types}</p>
                                        <a href="/pokemon/${pokemonId}" class="btn">About</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    }

                    // Adiciona os botões de paginação
                    const totalPages = Math.ceil(data.results.length / itemsPerPage);
                    buildPaginationButtons(page, totalPages);
                } catch (error) {
                    console.error('Erro na requisição:', error);
                }
            }

            // Função para construir os botões de paginação
            function buildPaginationButtons(currentPage, totalPages) {
                paginationButtonsElement.innerHTML = '';

                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement('button');
                    button.textContent = i;
                    button.className = `btn ${i === currentPage ? 'btn-primary' : 'btn-secondary'}`;
                    button.addEventListener('click', () => loadPokemonDetails(i));
                    paginationButtonsElement.appendChild(button);
                }
            }

            // Chama a função para carregar os detalhes dos Pokémon na página 1 inicialmente
            loadPokemonDetails(1);
        });
    </script>
@endsection
