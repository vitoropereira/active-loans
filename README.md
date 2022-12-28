<h1 align="center">
    <img alt="My Family" title="#MyFamily" src="./public/Business-crisis-amico.png" width="145px" height="145px" />
    <br/>
Active Loans
</h1>
<p align="center">
  <img alt="GitHub language count" src="https://img.shields.io/github/languages/count/vitoropereira/active-loans?color=%2304D361">
  <img alt="Repository size" src="https://img.shields.io/github/repo-size/vitoropereira/active-loans">
  <a href="https://github.com/vitoropereira/active-loans/commits/main">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/vitoropereira/active-loans">
  </a>
   <a href="https://github.com/vitoropereira/active-loans/stargazers">
    <img alt="Stargazers" src="https://img.shields.io/github/stars/vitoropereira/active-loans?style=social">
  </a>
</p>

## 🛠 Tecnologias

Algumas ferramentas que estão sendo usadas neste projeto:

- [Laravel][Laravel]
- [Vue.JS][vuejs]
- [VsCode][vscode]

## 🚀 Como executar o projeto

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [Node.js][nodejs], [Laravel][Laravel], outras...
Além disto é bom ter um editor para trabalhar com o código como [VSCode][vscode]

### 🧭 Rodando a aplicação

```bash
# Clone este repositório
$ git clone https://github.com/vitoropereira/active-loans

# Acesse a pasta do projeto no seu terminal/cmd
$ cd active-loans

# Instale as dependências do Laravel
$ composer install

# Instale as dependências do Vue.js
$ npm install

# Execute as migrações do banco de dados
$ php artisan migrate:refresh

# Deixe os jobs ativos
$ php artisan queue:work

# Inicie o servidor
$ php artisan serve

# Inicie o Vue.js em modo de desenvolvimento
$ npm run dev

# A aplicação será aberta na porta:3000 - acesse http://localhost:8000
```

## 📑 O projeto

Este projeto é um sistema web que coleta dados de "Posições em Aberto de Empréstimo de Ativos" da B3 (Bolsa de Valores Brasileira) através de uma job (tarefa automatizada) no Laravel. Os dados são baixados em formato CSV e salvos em um banco de dados. 
O sistema permite que os usuários se cadastrem e façam login. É possível também selecionar uma data específica para visualizar os dados relativo as "Posições em Aberto de Empréstimo de Ativo" do dia selecionado. Além disso, há uma opção para visualizar gráficos de um ativo selecionado. 
O projeto foi desenvolvido com Laravel e Vue.js como um teste de emprego para a empresa Jumba FYT Tecnologia.

## 😯 Como contribuir para o projeto

1. Faça um **fork** do projeto.
2. Crie uma nova branch com as suas alterações: `git checkout -b my-feature`
3. Salve as alterações e crie uma mensagem de commit contando o que você fez: `git commit -m "feature: My new feature"`
4. Envie as suas alterações: `git push origin my-feature`
> Caso tenha alguma dúvida confira este [guia de como contribuir no GitHub](https://github.com/firstcontributions/first-contributions)


[Laravel]: https://laravel.com/
[vuejs]: https://vuejs.org/
[vscode]: https://code.visualstudio.com/
[nodejs]:https://nodejs.org/
