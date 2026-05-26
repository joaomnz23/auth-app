<div align="center">

<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="340" alt="Laravel Logo">

# auth-app

**Sistema de Blog com Autenticação em Laravel 12**

[![PHP](https://img.shields.io/badge/PHP-^8.2-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net)
[![Laravel](https://img.shields.io/badge/Laravel-^12.0-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-^3.1-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/license-MIT-green?style=flat-square)](LICENSE)

</div>

---

## Índice

- [Sobre o Projeto](#-sobre-o-projeto)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias e Versões](#-tecnologias-e-versões)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Pré-requisitos](#-pré-requisitos)
- [Guia de Instalação e Execução Local](#-guia-de-instalação-e-execução-local)
- [Configurações Opcionais](#-configurações-opcionais)
- [Licença](#-licença)

---

## Sobre o Projeto

O **auth-app** é uma aplicação web de blog completa desenvolvida com **Laravel 12**, que combina um sistema robusto de autenticação de usuários com um painel administrativo para gerenciamento de conteúdo.

A aplicação utiliza o **Laravel Breeze** como starter kit de autenticação, proporcionando um fluxo completo de registro, login, logout e gerenciamento de perfil de forma segura e pronta para uso. Todo o painel administrativo - onde posts e categorias são gerenciados - é protegido por autenticação: somente usuários logados têm acesso.

A interface é construída com **Tailwind CSS** e **Blade Components**, resultando em um layout responsivo, limpo e moderno que funciona em qualquer dispositivo.

---

## Funcionalidades

### Autenticação (via Laravel Breeze)
- Registro de novos usuários (nome, e-mail e senha)
- Login e logout seguros
- Gerenciamento e atualização de perfil do usuário
- Alteração de senha com validação

### Gerenciamento de Categorias
- Listagem de todas as categorias cadastradas
- Criação de novas categorias
- Edição de categorias existentes
- Exclusão de categorias

### Gerenciamento de Posts
- Listagem de posts com paginação
- Criação de posts com os campos:
  - **Título** do artigo
  - **Texto/Conteúdo** do artigo
  - **Imagem** (upload de arquivo para o servidor)
  - **Categoria** (relacionamento `belongsTo` com a tabela de categorias)
- Edição de posts existentes (incluindo substituição da imagem)
- Exclusão de posts

> **Relacionamento entre modelos:** cada `Post` pertence a uma `Category` (`belongsTo`), e cada `Category` pode ter muitos `Post`s (`hasMany`), seguindo o padrão Eloquent do Laravel.

---

## Tecnologias e Versões

As versões abaixo são exatamente as definidas nos arquivos `composer.json` e `package.json` do repositório.


| Tecnologia | Versão |
|---|---|
| **PHP** | `^8.2` |
| **Laravel Framework** | `^12.0` |
| **Laravel Breeze** | `^2.4` |
| **Tailwind CSS** | `^3.1.0` |

### Banco de Dados

| Driver | Status |
|---|---|
| **SQLite** | Padrão (configurado no `.env.example`) |
| **MySQL** | Suportado (requer ajuste no `.env`) |
| **PostgreSQL** | Suportado (requer ajuste no `.env`) |

---

## 📁 Estrutura do Projeto

```
auth-app/
├── app/
│   ├── Http/
│   │   └── Controllers/        # PostController, CategoryController, etc.
│   └── Models/                 # Post, Category, User
├── database/
│   └── migrations/             # Tabelas: users, posts, categories, sessions...
├── resources/
│   ├── views/                  # Templates Blade (posts, categories, auth, layouts)
│   └── css/ & js/              # Assets compilados pelo Vite
├── routes/
│   └── web.php                 # Rotas da aplicação (protegidas por middleware auth)
├── storage/
│   └── app/public/             # Imagens de posts (acessíveis via link simbólico)
├── .env.example                # Exemplo de configuração de ambiente
├── composer.json               # Dependências PHP
└── package.json                # Dependências de front-end
```

---

## Pré-requisitos

Antes de iniciar, certifique-se de que os seguintes softwares estão instalados em sua máquina:

| Software | Versão Mínima | Link de Download |
|---|---|---|
| **PHP** | `8.2` | [php.net/downloads](https://www.php.net/downloads) |
| **Composer** | `2.x` | [getcomposer.org](https://getcomposer.org/download/) |
| **Node.js** | `18.x` (recomendado: 20 LTS ou superior) | [nodejs.org](https://nodejs.org/en/download) |
| **npm** | `9.x` ou superior (vem com o Node.js) | - |
| **Git** | Qualquer versão recente | [git-scm.com](https://git-scm.com/downloads) |

> **Banco de dados:** O projeto usa **SQLite por padrão**, que não requer instalação separada - um arquivo de banco é criado automaticamente em `database/database.sqlite`. Caso prefira usar **MySQL** ou **PostgreSQL**, consulte a seção [Configurações Opcionais](#-configurações-opcionais).

---

## Guia de Instalação e Execução Local

Siga os passos abaixo **na ordem indicada**. Não pule nenhuma etapa.

### Passo 1 - Clone o repositório

Abra o terminal na pasta onde deseja instalar o projeto e execute:

```bash
git clone https://github.com/joaomnz23/auth-app.git
```

Em seguida, entre na pasta do projeto:

```bash
cd auth-app
```

---

### Passo 2 - Instale as dependências PHP

Este comando lê o `composer.json` e baixa todas as dependências do Laravel e seus pacotes:

```bash
composer install
```

> **Aguarde** até que o Composer finalize a instalação. Dependendo da sua conexão, pode levar alguns minutos.

---

### Passo 3 - Crie e configure o arquivo de ambiente

O Laravel utiliza um arquivo `.env` para armazenar configurações sensíveis (banco de dados, chave da aplicação, etc.). Crie uma cópia a partir do exemplo fornecido:

**Linux / macOS:**
```bash
cp .env.example .env
```

**Windows (Prompt de Comando):**
```cmd
copy .env.example .env
```

**Windows (PowerShell):**
```powershell
Copy-Item .env.example .env
```

---

### Passo 4 - Gere a chave de aplicação

O Laravel usa uma chave criptográfica para assinar sessões, cookies e outros dados sensíveis. Gere-a com:

```bash
php artisan key:generate
```

Após a execução, a variável `APP_KEY` no seu arquivo `.env` será preenchida automaticamente com um valor único. **Nunca compartilhe essa chave publicamente.**

---

### Passo 5 - Configure o banco de dados

#### Opção A: SQLite (padrão - recomendado para rodar localmente sem configuração extra)

O arquivo `.env.example` já está pré-configurado com SQLite:

```env
DB_CONNECTION=sqlite
```

Neste caso, o arquivo de banco de dados será criado em `database/database.sqlite`. O Laravel cria o arquivo automaticamente durante as migrations, mas se por algum motivo isso não ocorrer, crie-o manualmente:

**Linux / macOS:**
```bash
touch database/database.sqlite
```

**Windows (PowerShell):**
```powershell
New-Item database/database.sqlite -ItemType File
```

#### Opção B: MySQL

Caso prefira usar MySQL, abra o arquivo `.env` e ajuste as variáveis de banco de dados. Substitua as linhas de `DB_CONNECTION` pelas seguintes (descomente conforme necessário):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auth_app
DB_USERNAME=seu_usuario_mysql
DB_PASSWORD=sua_senha_mysql
```

> **Lembre-se** de criar o banco de dados `auth_app` (ou o nome de sua preferência) no MySQL antes de continuar:
> ```sql
> CREATE DATABASE auth_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
> ```

---

### Passo 6 - Execute as migrations

Este comando cria todas as tabelas necessárias no banco de dados (users, posts, categories, sessions, cache, jobs, etc.):

```bash
php artisan migrate
```

Você verá uma saída semelhante a:

```
   INFO  Running migrations.

  2024_01_01_000001_create_users_table ........................ 12ms DONE
  2024_01_01_000002_create_cache_table ........................  5ms DONE
  ...
```

> Se aparecer a mensagem `Would you like to create the database?` (para SQLite), confirme com `yes`.

---

### Passo 7 - Crie o link simbólico para o storage

O upload de imagens dos posts é salvo em `storage/app/public`. Para que essas imagens sejam acessíveis pelo navegador via URL, é necessário criar um link simbólico da pasta `public/storage` para `storage/app/public`:

```bash
php artisan storage:link
```

A saída esperada é:

```
   INFO  The [public/storage] link has been connected to [storage/app/public].
```

> **Linux / macOS:** Caso encontre erros de permissão nesta etapa ou no upload de imagens, garanta que o diretório `storage` e `bootstrap/cache` tenham as permissões corretas:
> ```bash
> chmod -R 775 storage bootstrap/cache
> ```

---

### Passo 8 - Instale as dependências de front-end

Este comando lê o `package.json` e instala o Tailwind CSS, Alpine.js, Vite e demais dependências de front-end:

```bash
npm install
```

---

### Passo 9 - Compile os assets

Escolha uma das opções abaixo conforme sua necessidade:

**Para produção** (compilação otimizada, recomendado para avaliação final):
```bash
npm run build
```

**Para desenvolvimento** (com hot reload - os assets são recompilados automaticamente ao editar arquivos):
```bash
npm run dev
```

> Se optar por `npm run dev`, **mantenha este terminal aberto** e abra um segundo terminal para executar o próximo passo.

---

### Passo 10 - Inicie o servidor local

```bash
php artisan serve
```

A saída será semelhante a:

```
   INFO  Server running on [http://127.0.0.1:8000].

  Press Ctrl+C to stop the server
```

---

### Passo 11 - Acesse a aplicação no navegador

Abra seu navegador e acesse:

```
http://localhost:8000
```

ou

```
http://127.0.0.1:8000
```

---

### Passo 12 - Registre um usuário e teste as funcionalidades

1. Na página inicial, clique em **"Register"** (ou acesse `/register`).
2. Preencha os campos: **Name**, **Email** e **Password**, e confirme a senha.
3. Após o registro, você será redirecionado automaticamente para o **painel (dashboard)**.
4. A partir do painel, utilize o menu de navegação para:
   - Acessar **Categorias**: crie ao menos uma categoria antes de criar posts (os posts exigem uma categoria vinculada).
   - Acessar **Posts**: crie, visualize, edite e exclua artigos com upload de imagem.

> **Dica:** Para simular o fluxo completo, crie primeiro uma categoria (ex: "Tecnologia"), depois crie um post associado a ela com título, conteúdo e uma imagem.

---

## ⚙️ Configurações Opcionais

### Usando MySQL em vez de SQLite

Além de ajustar o `.env` conforme descrito no Passo 5, certifique-se de que a extensão `pdo_mysql` está habilitada no seu `php.ini`.

### Usando PostgreSQL

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=auth_app
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

Certifique-se de que a extensão `pdo_pgsql` está habilitada no seu `php.ini`.

### Rodando os testes automatizados

O projeto inclui suíte de testes com PHPUnit. Para executar:

```bash
php artisan test
```

---

## 📄 Licença

Este projeto é um software de código aberto licenciado sob a [MIT License](https://opensource.org/licenses/MIT).

---

<div align="center">
Desenvolvido com ❤️ usando <a href="https://laravel.com">Laravel 12</a>
</div>