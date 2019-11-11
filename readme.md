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
- [MySql](https://www.mysql.com/downloads/)

# Instalando
1. Após a instalação do XAMPP coloque o em funcionamento.

2. Clone este repositorio para sua máquina em uma pasta dentro do **htdocs** do xampp e rode o comando:
```
composer update
```
	*O composer irá se encarregar de instalar todas as dependencias necessária para o funcionamento da API*
3. Utilize o arquivo **.env.exemple** para criar seu arquivo **.env** padrão. adicione as informações do seu bando de dados MySql (banco, usuario,senha)

	Rode o comando:
	```
	php artisan migrate:refresh --seed
	```

	*Com isso as tabelas necessárias e os primeiros dados deverão ser inseridos no seu banco de dados.*

# Utilização
para os testes de requisição utilizei o programa [Insominia](https://insomnia.rest/download/), poderia ter usado também [Postman](https://www.getpostman.com/).

### Rotas
|Tipo|Rota|Retorno|
| ------------ | ------------ | ------------ |
|GET|/imoveis|Array contendo a lista de imóveis encontrados|
|GET|/imovel/show/{imovel} <br>{imovel} = id do imovel|Objeto com todas as informações do imóvel|
|DELETE|/imovel/delete/{imovel} <br>{imovel} = id do imovel|Retorno true ou false|
|POST|   |   |
|POST|   |   |
|POST| | |
