<b>Linguagem/Versão:</b> PHP 7.4
<b>Framework/Versão:</b> Laravel 8.12
<hr>

## Criar banco de dados MYSQL
### Na CLI do MYSQL:

- Criar usuário

    ~# CREATE USER 'userName'@'%' IDENTIFIED BY '1wMjSFwMjFszcMlHjJc';

- Criar banco de dados

    ~# CREATE DATABASE `investimentos` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

- Conceder permissão para o usuário na base criada.

    ~# GRANT ALL PRIVILEGES ON investimentos.* TO 'userName'@'%';

    ~# FLUSH PRIVILEGES;
   
 ### Configurar banco de dados no Laravel:
 Renomei o arquivo .env.example para .env e altere as credenciais do banco de dados.
 ```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=investimentos
DB_USERNAME=userName
DB_PASSWORD=1wMjSFwMjFszcMlHjJc
```

## Criar tabelas no banco de dados
- Para criar as tabelas será necessário rodar o comando abaixo

    ~# php artisan migrate
   

### Base de dados para popular o banco.

- Tabela Fundos: https://pastebin.com/Lb1PvJUD
- Tabela patrimonio https://pastebin.com/BKN2BdKc

### Instalar dependências
  
    ~# composer install
    
    ~# npm install

- Gerar chave da aplicação

    ~# php artisan key:generate

### Subir o servidor local

    ~# php artisan serve
    
#### Imagens da aplicação

![homeFundo](https://user-images.githubusercontent.com/39016254/115149517-e1b1b800-a03a-11eb-9096-bab9ec834915.png)

![dashboardFundos](https://user-images.githubusercontent.com/39016254/115149512-de1e3100-a03a-11eb-86e1-7bc38c1600f0.png)



