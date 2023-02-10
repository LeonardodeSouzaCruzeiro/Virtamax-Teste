# Laravel-8-vue.js-3
Teste VirtuaMax

# Rodando aplicação
Na pasta `backend` abra no terminal:

     cd /backend

Instalar os pacotes de dependências `vendor`

     composer update --ignore-platform-req=ext-gd

Utilizei um servidor local(Xampp com PHP 8) para simular meu banco de dados mysql com axílio do PhpMyAdmin. 

Temos criar um banco com nome 'laravel', utilizando a configuração padrão do arquivo `.env` na minha arquitetura Laravel 8


   ![bancodedadoslaravel](https://user-images.githubusercontent.com/51030497/218089227-f9a5b62a-15b6-450f-8589-95dfd6fe023b.png)

Criar tabelas:

     php artisan migrate

Inserir dados na tabela:
     
     php artisan migrate:fresh --seed



Rodando servidor local do Laravel:

     php artisan serve
     
Logo após abra a pasta `frontend` no terminal:  

     cd /frontend

Instalar os pacotes de dependências `node_modules`
    
    npm install

Rodando servidor local do Vue.js:

     npm run serve
     
Para vizualizar a aplicação abre o link gerado na resposta do teminal do servido Vue.js:

      http://localhost:8080/
     
OBS.: Após o download e  a extração da aplicação o caminho ficará  `\Virtuamax-Teste-main\Virtuamax-Teste-main\frontend`
isso irá gerar o erro `ERROR in Conflict: Multiple assets emit different content to the same filename index.html`
mantenha o caminho  `\Virtuamax-Teste-main\frontend`

# Experiência 
  
VirtuaMax

  Gostaria de agradecer desde já toda a oportunidade que me ofereceram e gostaria aqui também de relatar minha experiência neste teste de desenvolvimento em Laravel 8 e vue.js 3 desacoplado foi muito construtiva e me trouxe grande aprendizado pessoal e profissional, apesar de encontrar algumas dificuldades nesse desenvolvimento desacoplado entre Backend e Frontend, pelo motivo de (Nunca ter contato com essa e arquitetura igualmente  com framework  vue.js 3). Este teste me proporciono uma grande descoberta e muitos conhecimentos, me interessei pela linguagem e já quero adquirir e torná-la minha ferramenta de trabalho, ela possuí um alto potencial e performance em Frontend, me agradou bastante aprende-lá.

  O Laravel 8 foi pouco mais fácil de desenvolver também nunca havia desenvolvido, mas já tive contato com a linguagem PHP.
No momento atuo com o framework Symfony aonde o Laravel foi baseado e com esse desenvolvimento  minha visão sobre esse framework mudou, consegui perceber sua alta performance e arquitetura completa para desenvolvimentos web e bem simples com uma biblioteca completa e  comunidade grande.
Perante essas dificuldade  achei melhor estender o limite máximo do prazo do teste para obter o máximo de conhecimento nas linguagens requisitadas, pois se a empresa me permitir ter a oportunidade de trabalhar, terei uma experiência que me permitirá somar com a equipe, melhorando o entendimento da arquitetura e a lógica da aplicação da empresa, alguns pontos ficaram pendentes pois eu não tive o total sucesso, mas estou pronto para aprender e obter novas experiências e  desenvolver nessa linguagem de programação. Durante o teste, utilizei YouTube e Google para minhas pesquisas achei muito conteúdo interessante mais  se fosse possível eu ter  um feedback de vocês mesmo não surgindo a oportunidade ou alguma dica de estudo ficaria muito grato. 


  Agradeço muito mais uma vez pela oportunidade e digo mais um vez que estou preparado para desenvolver, aprender, crescer com a empresa e a equipe de desenvolvimento, garanto que darei meu máximo.
