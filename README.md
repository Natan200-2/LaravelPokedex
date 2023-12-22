<div align="center">
    <h1>Pokedex Laravel</h1>
    <h2>Projeto criado com intuito de aprendizado na consulta a API's</h2>    
</div>

<div>
    <h3>Detalhes do projeto</h3>
    <p>Este foi um projeto criado com Laravel, as views feitas com o Blade e a consulta a API com JavaScript</p>
    <p>A consulta a API foi feita no Client-Side através do JavaScript (o que reduziu drasticamente a lentidão da aplicação para carregar a página)</p>
    <p>É feita uma consulta na página inicial sobre 151 pokemons, separados por paginação a cada 12 pokemons apresentados, evitando sobrecarga ou lentidão no carregamento da página</p>
    <h3>Detalhes do pokemon</h3>
    <p>Selecionando "About" em cada pokemon, é aberto uma página com os detalhes do pokemon selecionado, incluindo HP, attack, speed e defense, localizações possíveis para encontrar o pokemon, tipo, e suas habilidades</p>
</div>
<div>
    <h3>Barra de pesquisa</h3>
    <p>A aplicação também possui uma barra de pesquisa na navbar, ao consultar o nome completo de um pokemon, será aberta a página detalhada do pokemon</p>
</div>


<div>
    <h3>Como rodar o projeto</h3>
    <p>Para rodar o projeto localmente é necessário ter uma aplicação de uso de servidor web (como XAMPP que disponibiliza o servidor web Apache), instalação do PHP, do Composer (um gerenciador de dependências PHP) na máquina, para permitir a instação do Laravel, e do Laravel na pasta da aplicação, seguindo os parâmetros do site do Laravel sobre como instalar</p>
    <a href="https://laravel.com/docs/10.x">Link para instalação do Laravel</a>
    <br>
    <p>Após as instações, basta abrir o terminal de comando, entrar na pasta da aplicação e digitar:</p>
    <strong>php artisan serve</strong>
    <br>
    <p>Com o comando executado, basta abrir o link "localhost:8000" no navegador</p>
</div>
