Teste que eu fiz para a consolide em Laravel. Solicitaram posteriormente para fazer o mesmo teste usando yii2, segue o link:
https://github.com/MateusTorquato/consolide-yii2

Pré requisito
------------

* PHP >= 7.3
* [Composer](https://getcomposer.org/download/ "Composer")
* MySQL ou algum banco de dados relacional
* Instalar o laravel:
> composer global require "laravel/installer"

Instruções para subir a aplicação:
------------

* Baixar a aplicação do repositório.
> git clone https://github.com/MateusTorquato/consolide.git

* Configurar o .env
> cp .env.example .env

* Instalar dependências
> composer install

* Criar um novo database com o nome *consolide* e configurar o .env. O banco utilizado é o MySQL, porém outro poderá ser utilizado.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=consolide
DB_USERNAME=root
DB_PASSWORD=
```
* Rodar os comandos de migração
> php artisan migrate

* Rodar o comando para subir a aplicação
> php artisan serve
