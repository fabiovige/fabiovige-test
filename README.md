# Crud utilizando Api / RestFull

### Descrição

Teste básico para avaliar os conhecimentos em Docker, GIT, Laravel e Postgres.

### Recursos aplicados

- Laravel 8.*
- Seeders / Factory
- Resource
- FormRequest
- DataTable (extra)
- Bootstrap 5.1 Laravel / ui
- Repository
- Service

### Instalação

Clonar repositório

```sh
git clone https://github.com/fabiovige/fabiovige-test.git

cd fabiovige-test/

cp .env.example .env
```

Subir os containers

```sh
docker-compose up -d
```

Acessando o container fabiovige_app

```sh
docker-compose exec fabiovige_app bash
```

Instalando as dependências

```sh
composer install
php artisan key:generate
php artisan migrate
php artisan queue:table
```

Instalando as dependências para bootstrap

```sh
composer require laravel/ui
php artisan ui bootstrap
npm install
npm run dev
```

Instalando jquery e popper.js

```sh
npm install jquery --save-dev
npm install popper.js --save-dev
npm run dev
```

Corrige dependencia 'stats.children: true' [opcional]

```sh
npm install autoprefixer@10.4.5 --save-exact
npm install
npm run dev
```

Adicione "127.0.0.1 fabiovige.test" no arquivo hosts

```sh
Linux
/etc/hosts 127.0.0.1 fabiovige.test

Windows
C:\Windows\System32\drivers\etc\hosts 127.0.0.1 fabiovige.test
```

Acesse
[http://fabiovige.test](http://fabiovige.test)


### API: Documentação Postman

[https://documenter.getpostman.com/view/1984537/UzJFwz7b](https://documenter.getpostman.com/view/1984537/UzJFwz7b)

```sh
GET http://fabiovige.test/api/v1/products
GET http://fabiovige.test/api/v1/products/1
POST http://fabiovige.test/api/v1/products
PUT http://fabiovige.test/api/v1/products/1
DELETE http://fabiovige.test/api/v1/products/1

```
