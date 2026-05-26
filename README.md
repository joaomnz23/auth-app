<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Sobre o Projeto

Blog desenvolvido com Laravel 12, Tailwind CSS v4 e Laravel Breeze, oferecendo um sistema completo de autenticação e um painel administrativo para gerenciamento de conteúdo.

Funcionalidades principais:

- **Gerenciamento de Posts:** criação, edição, exclusão e listagem de artigos, com suporte a upload de imagens e formatação de texto.
- **Gerenciamento de Categorias:** criação, edição e exclusão de categorias para organização dos posts.
- **Autenticação e Perfis:** sistema de registro, login e gerenciamento de perfil do usuário baseado no Laravel Breeze.

O projeto utiliza conceitos centrais do Laravel, como Migrations, Resource Controllers e Blade Components, resultando em uma aplicação web responsiva e totalmente funcional.

## Tecnologias Utilizadas

- **Laravel 12** – framework PHP
- **Tailwind CSS v4** – framework CSS utilitário
- **Laravel Breeze** – starter kit de autenticação (versão compatível com Laravel 12)

## Guia de Execução Local

Siga os passos abaixo para validar o funcionamento do projeto no seu ambiente de desenvolvimento:

### Pré-requisitos

- PHP >= 8.2
- Composer
- Node.js e NPM
- MySQL

### Passo a Passo para Instalação

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/joaomnz23/auth-app.git
    cd auth-app
    ```

2.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```

3.  **Configure o ambiente:**
    - Crie uma cópia do arquivo de ambiente de exemplo:
      ```bash
      cp .env.example .env
      ```
    - Gere uma nova chave de criptografia para a aplicação:
      ```bash
      php artisan key:generate
      ```

4.  **Configure o banco de dados:**
    - Crie um banco de dados MySQL localmente (ex: `auth_app`).
    - Abra o arquivo `.env` e atualize as credenciais:
      ```env
      DB_DATABASE=auth_app
      DB_USERNAME=seu_usuario
      DB_PASSWORD=sua_senha
      ```

5.  **Execute as migrações do banco de dados:**
    ```bash
    php artisan migrate
    ```

6.  **Instale as dependências do Node.js e compile os assets:**
    ```bash
    npm install
    npm run build
    ```

7.  **Inicie o servidor de desenvolvimento:**
    ```bash
    php artisan serve
    ```

8.  **Acesse a aplicação:**
    - Abra o navegador e acesse `http://127.0.0.1:8000`.
    - Registre um novo usuário para acessar o painel administrativo e testar todas as funcionalidades.


## Licença

Este projeto é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).
