<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Rodando o projeto

- Rode o comando <strong>composer install</strong>;
- Utilizar porta 8000;
- Gerar chave com <strong>php artisan key:generate</strong>;

## Informações importantes
- Configurar no .env as credenciais do mailtrap para testar o envio de e-mails;
- <a target="_blank" href="https://mailtrap.io/signin">MAILTRAP</a>;
- Para verificar as CRONs configuradas, rode o comando <strong>php artisan schedule:list</strong>
- O comando para testar o disparo de e-mails para os leitores em aniversário é: <strong>php artisan happy:birthday</strong>
- Caso não tenha as configurações do banco de dados NoSQL MongoDB no arquivo /config/database.php, poderá utilizar as seguintes credenciais (inserir ou alterar na chave 'connections')':
```sh
'mongodb' => [
      'driver' => 'mongodb',
      'dsn' => env('DB_URI',
      'mongodb+srv://localhost:dev102030@cluster0.mdupn.mongodb.net/myappdb?retryWrites=true&w=majority'),
      'database' => 'livros',
  ],
```
- Como estou utilizando Redis é necessário estar com o mesmo instalado, se estiver usando Windows verificar como instalar Redis no WSL e digite o comando <strong>sudo service redis-server start</strong>
- Documentação: <a target="_blank" href="https://redis.io/docs/getting-started/installation/install-redis-on-windows/">Install Redis</a>

## Logando no Sistema
- O front-end foi desenvolvido utilizando a biblioteca VueJS 3;
- Para realizar o login no painel administrativo e conseguir gerar usuários leitores, é necessário rodar o comando <strong>php artisan db:seed --class=UserSeeder</strong>;
- Credenciais do administrador:
```sh
    'email' => 'admin@teste.com'
    'password' => 'teste'
```
- Credenciais de leitor:
```sh
    'email' => 'teste@teste.com'
    'password' => 'teste'
```

## Testes
- Para rodar os testes, utilize o comando <strong>./vendor/bin/phpunit</strong>
