# DESAFIO ZEE DOG

Aplicação de busca de repositórios do GitHub.

Versão: 1.0


### Descrição

Esta aplicação realiza consulta dos repositórios do GitHub, por meio de requisições aos endpoints da API em "https://developer.github.com/v3/".

Atualmente, a aplicação permite:
*   Listar dados dos repositorios: Nome completo, descrição, quantidade de estrelas, quantidade de forks, autor e data da última atualização
*   realizar buscar por meio de termo livre, por linguagem específica (tendo como padrão a linguagem ruby)
*   realizar a ordenação por quantidade de estrelas, por forks ou data da última atualização

### EndPoint
A aplicação realiza consulta ao endpoint https://api.github.com/search/repositories

*   Ao carregar o site, a requisição é feita ao endpoint acima, sem passagem de parâmetros, permitindo, assim, buscar todos os repositórios
*   Ao aplicar um filtro ou realizar ordenação, a requisição é feita ao endpoint acima, porém aplicando os devidos parâmetros de filtragem/ordenação. 
      
      Ex: https://api.github.com/search/repositories?q=".$param['searchFree']."+in:name,full_name,description".
				  "+language:".$param['lang']."+user:".$param['user'].
				  "&page=".$param['page']."&per_page=100".
				  "&sort=".$param['sort'].
          			  "&order=".$param['order'];

### PHP
A aplicação foi desenvolvida usando a linguagem PHP, por meio do paradigma orientado a objetos, com interfaces e classes para realizar as requisições à API GitHub.


### CSS

A aplicação usa CSS para definir o layout da página.


### JavaScript e jQuery

A aplicação usa JS para reconhecer as ações do usuário, como aplicar filtro e ordenar repositórios.


### Instalação

1. Baixe o conteúdo do repositório 'desafio-zeedog' do GitHub (https://github.com/guilhermersl/desafio-zeedog.git)
2. Descompacte o arquivo baixado, localize-o no local acessível pela Web. Suponha que a localização seja / var / www / desafio-zeedog.


### Heroku

URL = http://desafio-zeedog.herokuapp.com/
