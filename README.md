# Crud utilizando Api / RestFull

### Descrição

Teste básico para avaliar os conhecimentos em Docker, GIT, Laravel e Postgres.

### Recursos aplicados

- Seeders / Factory
- Resource
- FormRequest
- DataTable (extra)
- Bootstrap Laravel / ui
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
docker-compose exec fabiovige_app bash
```

Instalar as dependências

```sh
composer install
php artisan key:generate
php artisan migrate:fresh --seeder
php artisan queue:table
```

Instalar as dependências para front end

```sh
composer require laravel/ui
php artisan ui bootstrap
npm install
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


### API: Acessando os end point (Insomnia ou Postman)

Listando todos os produtos

```sh
Verbo: GET 
http://fabiovige.test/api/products
```


Consultando um produto

```sh
Verbo: GET
http://fabiovige.test/api/products/1
```

Cadastrando um produto

```sh
Verbo: POST
http://fabiovige.test/api/products
```

Atualizando um produto

```sh
Verbo: PUT
http://fabiovige.test/api/products/1
```

Excluindo um produto

```sh
Verbo: DELETE
http://fabiovige.test/api/products/1
```
