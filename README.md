# Plataforma EAD com o Laravel

Criação de um sistema real, uma plataforma ead (backend API) com o poderoso framework PHP, o Laravel.

### Instalação

Clone Repositório

```sh
git clone https://github.com/pedrobombig/laravel-api-ead.git
```

Crie o Arquivo .env

Atualize as variáveis de ambiente do arquivo .env

```sh
cp .env.example .env
```

Suba os containers do projeto

```sh
docker-compose up -d
```

Acessar o container

```sh
docker-compose exec app bash
```

Instalar as dependências do projeto

```sh
composer install
```

Gerar a key do projeto Laravel

```sh
php artisan key:generate
```

Criar as tabelas do Projeto

```sh
php artisan migrate
```

Acessar o projeto
[http://localhost:8989](http://localhost:8989)
