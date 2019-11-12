# Descrição
Desenvolva uma aplicação PHP 7+ utilizando o framework Laravel para resolver o seguinte problema:

Uma administradora de imóveis precisa realizar o cadastro dos imóveis que ela administra. Os dados que ela gostaria de guardar são:

- Endereço do imóvel
- Bairro
- Municipio
- Estado
- CEP ( Deve validar o padrão 00000-000 )
- Tipo do Imóvel ( Apartamento, Casa, Sítio, Andar )
- Nome do Proprietário

Para isso, utilize o banco de dados MySQL e crie um CRUD utilizando API REST. Deve ser possível pesquisar todos os imóveis de um municipio ou bairro. Deve ser possível também paginar e ordenar a lista de imóveis por bairro e município (não é necessário criar o front das telas, somente back com retorno em JSON).

# Tecnologias Utilizadas

- [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- [PHP 7.1](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Laravel](http://laravel.com)
- [MySql](https://www.mysql.com/downloads/)

# Instalando
1. Após a instalação do XAMPP coloque-o em funcionamento.

2. Clone este repositório para sua máquina, em uma pasta dentro do **htdocs** do xampp, em seguida rode o comando:
```
composer update
```
	*O composer irá se encarregar de instalar todas as dependências necessárias para o funcionamento da API*
3. Utilize o arquivo **.env.exemple** para criar seu arquivo **.env** padrão. Adicione as informações do seu banco de dados MySql (banco, usuário, senha)

	Rode o comando:
	```
	php artisan migrate:refresh --seed
	```

	*Com isso as tabelas necessárias e os primeiros dados deverão ser inseridos no seu banco de dados.*

# Utilização
Para os testes de requisição utilizei o programa [Insominia](https://insomnia.rest/download/), existem outras opções como por exemplo o [Postman](https://www.getpostman.com/).

### Rotas
|Tipo|Rota|Parametros|Retorno|
| ------------ | ------------ | ------------ | ------------ |
|GET|/imoveis| |Array contendo a lista de imóveis encontrados|
|GET|/imovel/show/{imovel} | {imovel} = id do imovel|Objeto com todas as informações do imóvel|
|DELETE|/imovel/delete/{imovel} |{imovel} = id do imovel|Retorno true ou false|
|POST|/imovel/create|Objeto contendo: <br>{<br>endereco,<br>proprietario,<br>cep,<br>tipo_id,<br>estado_id,<br>municipio_id,<br>bairro_id<br>}| Retorna o id do imóvel criado|
|POST|/imovel/update/{imovel}|{imovel} = id do imóvel + Objeto contendo os dados a serem atualizados|Objeto atualizado
|POST| /imovel/filter | Objeto contendo os valores podendo estar dentro das seguintes opções:  <br><br> 1- estado_id; <br>2- municipio_id; <br> 3- bairro_id; <br> 4- sortBy; <br> 5- orderBy; <br> 6- perPage; <br><br> podendo ter uma ou todas as opções dentro do objeto  |Array com:<br><br> 1- imóveis que foram filtrados; <br> 2- página atual;<br> 3- quantidade de imóveis por página;<br> 4- link da primeira página;<br> 5- link da próxima página;<br> 6- link da página anterior;<br> 7- total de páginas;<br>
