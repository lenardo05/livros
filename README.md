# Projeto Livros

Este é um projeto Laravel 10 que gerencia livros. Siga as instruções abaixo para configurar e executar o projeto localmente.

## Pré-requisitos
- PHP 8.1
- Composer
- MySQL 8

## Clonar o Repositório
```bash
git clone https://github.com/lenardo05/livros.git
```
cd projeto-livros

## Configurar o .env
Copie o arquivo .env.example para .env e configure as variáveis de ambiente, especialmente as relacionadas ao banco de dados.

```bash
cp .env.example .env
```
## Configurar o Banco de Dados
Crie os bancos de dados necessário (livros e livros_teste) no MySQL e configure as credenciais no arquivo .env.

```bash
mysql -u root -p
```

## No console MySQL
```bash
CREATE DATABASE livros;
CREATE DATABASE livros_teste;
```
## Instalar Dependências
```bash
composer install
npm install
```
## Executar as Migrações e Seeders
```bash
php artisan migrate:fresh --seed
```
## Rodar o Servidor de Desenvolvimento
```bash
php artisan serve
```


# Teste - CRUD do Controller LivroController

## Criação de Livro
- [ ] Descrição: Testar a criação de um novo livro.
- [ ] Método: `POST`
- [ ] Endpoint: `/livros/salvar`
- [ ] Dados do Teste:
  - Parâmetros do formulário: `titulo`, `editora`, `edicao`, `ano_publicacao`.
- [ ] Expectativas:
  - Status HTTP 201 (Created) após a criação do livro.
  - Verificar se o livro foi inserido corretamente no banco de dados.

## Leitura de Livro
- [ ] Descrição: Testar a leitura de um livro existente.
- [ ] Método: `GET`
- [ ] Endpoint: `/livros/{id}`
- [ ] Dados do Teste:
  - ID de um livro existente.
- [ ] Expectativas:
  - Status HTTP 200 (OK) após a leitura do livro.
  - Verificar se os dados retornados correspondem aos dados esperados do livro.

## Atualização de Livro
- [ ] Descrição: Testar a atualização dos detalhes de um livro existente.
- [ ] Método: `PUT`
- [ ] Endpoint: `/livros/{id}/atualizar`
- [ ] Dados do Teste:
  - ID de um livro existente.
  - Novos parâmetros do formulário: `titulo`, `editora`, `edicao`, `ano_publicacao`, `autor_id`, `assunto_id`.
- [ ] Expectativas:
  - Status HTTP 200 (OK) após a atualização do livro.
  - Verificar se os dados do livro foram atualizados corretamente no banco de dados.

## Exclusão de Livro
- [ ] Descrição: Testar a exclusão de um livro existente.
- [ ] Método: `DELETE`
- [ ] Endpoint: `/livros/{id}`
- [ ] Dados do Teste:
  - ID de um livro existente.
- [ ] Expectativas:
  - Status HTTP 204 (No Content) após a exclusão do livro.
  - Verificar se o livro foi removido corretamente do banco de dados.
