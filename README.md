# Crud utilizando Api / RestFull

### Descrição

Teste básico para avaliar os conhecimentos em Docker, GIT, Laravel e Postgres.

### Recursos aplicados

- Laravel 8.*
- Seeders / Factory / Models / Resource / FormRequest
- Bootstrap 5.1 Laravel / ui / vuejs 
- Route api (boas práticas)
- Repository / Service
- Ambiente Docker com Postgres, Redis, Php7.4-fpm, Nginx
- Api de produtos com Consulta, Cadastro Atualização e Remoção
- Queue (extra com adicionamento de fila)
- Testes utilizando Postman
- Compartilhamento da API https://documenter.getpostman.com/view/1984537/UzJFwz7b
- Registro de Log

### Instalação do ambiente de desenvolvimento

Clonar repositório

```sh
git clone https://github.com/fabiovige/fabiovige-test.git
```

Colocar no etc/hosts de sua máquina:
```
127.0.0.1 fabiovige.test
```

Copiar o .env.example e alterar as variáveis de ambiente:
```
cp .env.example .env
```

Criar as imagens e containers do docker:
```
docker-compose up -d --build
```

Entrar no container para rodar composer e etc do projeto:
```
docker-compose exec fabiovige_app bash
```

Rodar o composer, dentro do container:
```
rm -rf vendor && composer install
```

Gerar a chave do laravel, dentro do container:
```
php artisan key:generate
```

Rodar as migrations e os seeders, dentro do container:
```
php artisan migrate --seed
```

Instalar o npm, dentro do container:
```
rm -rf node_modules && npm install && npm run dev
```

Acessar a aplicação via browser:

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
