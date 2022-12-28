# Sobre o projeto

Este projeto tem como objetivo coletar dados de "Posições em Aberto de Empréstimo de Ativos" através de uma job no Laravel que baixa um arquivo CSV da B3 e salva os dados no banco de dados.

É possível fazer cadastro e login no sistema. Ao fazer login e entrar no dashboard, a job é ativada e busca os dados dos últimos 5 dias. Na aba "Dados b3", é possível selecionar uma data e ativar a job para buscar os dados daquela data específica.

Existe também uma opção "Ver Gráficos" que leva para outra tela onde é possível selecionar um ativo e visualizar o gráfico deste ativo.

Este projeto foi desenvolvido como um teste de emprego na empresa Jumba FYT Tecnologia, utilizando Laravel e Vue.js.

Para rodar o projeto, é necessário fazer uma cópia do arquivo `.env.example` e configurar um banco de dados MySQL. Em seguida, execute os seguintes comandos:

1. `composer install` para instalar as dependências do Laravel
2. `npm install` para instalar as dependências do Vue.js
3. `php artisan migrate:refresh` para rodar as migrações do banco de dados
4. `php artisan queue:work` para deixar os jobs ativos
5. `php artisan serve` para iniciar o servidor
6. `npm run dev` para iniciar o Vue.js

Este projeto está sob licença liberada para uso geral.



