# Laravue Template

Template pessoal para projetos utilizando **Laravel** e **Vue.js**.

## Pré-requisitos

- PHP
- Composer
- Node.js + NPM
- MySQL

## Instalação

### Linux / macOS / Git Bash

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate
```

### CMD

```cmd
composer install
npm install

copy .env.example .env
php artisan key:generate
```

### PowerShell

```powershell
composer install
npm install

Copy-Item .env.example .env
php artisan key:generate
```

## Banco de Dados

Configure o `.env` e execute:

```bash
php artisan migrate
```

## Desenvolvimento

```bash
php artisan serve
```

Em outro terminal:

```bash
npm run dev
```

## Produção

```bash
npm run build
```

## Observações

- O arquivo `.env` não deve ser versionado.
- Gere uma nova `APP_KEY` para cada projeto criado a partir deste template.
