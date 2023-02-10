<template>
<div class="nav">
  <div class="logo"><img alt="Vue logo" src="../assets/logo.png"/>
  </div>
  <div class="relatorio">
    
  <label for="toggle-1">
  Relatório Mensal&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-spreadsheet-fill" viewBox="0 0 16 16">
  <path d="M12 0H4a2 2 0 0 0-2 2v4h12V2a2 2 0 0 0-2-2zm2 7h-4v2h4V7zm0 3h-4v2h4v-2zm0 3h-4v3h2a2 2 0 0 0 2-2v-1zm-5 3v-3H6v3h3zm-4 0v-3H2v1a2 2 0 0 0 2 2h1zm-3-4h3v-2H2v2zm0-3h3V7H2v2zm4 0V7h3v2H6zm0 1h3v2H6v-2z"/>
</svg>
  </label>
  
  <input type="checkbox" id="toggle-1">
  <div id="mostra">
    <a type="button" href="http://localhost:8000/api/relatorio/janeiro" download="file.xlsx" class="btn btn-primary">Janeiro</a>
    <a type="button" href="http://localhost:8000/api/relatorio/fevereiro" download="file.xlsx" class="btn btn-primary">Fevereiro</a><br>
    <a type="button" href="http://localhost:8000/api/relatorio/marco" download="file.xlsx" class="btn btn-primary">Março</a>
    <a type="button" href="http://localhost:8000/api/relatorio/abril" download="file.xlsx" class="btn btn-primary">Abril</a><br>
    <a type="button" href="http://localhost:8000/api/relatorio/maio" download="file.xlsx" class="btn btn-primary">Maio</a>
    <a type="button" href="http://localhost:8000/api/relatorio/junho" download="file.xlsx" class="btn btn-primary">Junho</a><br>
    <a type="button" href="http://localhost:8000/api/relatorio/julho" download="file.xlsx" class="btn btn-primary">Julho</a>
    <a type="button" href="http://localhost:8000/api/relatorio/agosto" download="file.xlsx" class="btn btn-primary">Agosto</a><br>
    <a type="button" href="http://localhost:8000/api/relatorio/setembro" download="file.xlsx" class="btn btn-primary">Setembro</a>
    <a type="button" href="http://localhost:8000/api/relatorio/outubro" download="file.xlsx" class="btn btn-primary">Outubro</a><br>
    <a type="button" href="http://localhost:8000/api/relatorio/novembro" download="file.xlsx" class="btn btn-primary">Novembro</a>
    <a type="button" href="http://localhost:8000/api/relatorio/dezembro" download="file.xlsx" class="btn btn-primary">Dezembro</a>
  </div>
  </div>
     
  <div class="user">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>{{ name }}<br><router-link :to="{ name: 'home'}"><label>Sair</label></router-link>
    </div>

</div>
  <br><br><br>



<div class="teste"> 
<div class="tabela">
<table class="table table-hover">
  <thead> 
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Fotos</th>
    
      
      <th>
        
  <router-link :to="{ name: 'ContatoCreate'}"><label  id="criar"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg></label></router-link></th>
    </tr>
  </thead>
  <tbody>
 
        <tr  v-for="contato in contatos" v-bind:key="contato.id">
          
          
          
          <th>{{contato.nome}}</th>
          <th>{{contato.email}}</th>
          <th>{{contato.telefone}}</th>
          <th></th>
          <th>
           
          <router-link :to="{ name: 'ContatoRead' , params: {id: contato.id}}">View</router-link><br>
          <router-link :to="{ name: 'ContatoUpdate' , params: {id: contato.id}}">Edit</router-link>
          <a href=""  class="text-danger" @click.stop.prevent="setDelete(contato.id)">Delete</a>
          </th> 
         </tr>
  </tbody>
</table>
</div>
</div>  
</template>

<script>
    // @ is an alias to /src
  import axios from 'axios'

  window.axios = require('axios');

  window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

  axios.defaults.withCredentials = true;
  import User from "../apis/User";
  export default{
    

    data(){
      return {
        contatos:[],
        name:'',
      }
    },

    mounted(){
      User.auth().then(response => {
        this.name = response.data.name
    });
    },
 
    methods: {
      logout() {
      axios.post('http://localhost:8000/api/auth/logout').then(response => {
            localStorage.removeItem('token')
        this.$router.push({ name: 'home' })
      })
    },
      setDelete(contato){

         // DELETE request using fetch with async/await
        fetch('http://localhost:8000/api/contatos/delete/'+ contato, { method: 'DELETE' })
        .then( response => {
             location.reload()
        });
        

       

      },

      setRelatorio(){

      fetch('http://localhost:8000/api/contatos/relatorio', { method: 'GET' });
 

      },
    },

    created(){
      fetch('http://localhost:8000/api/contatos')
      .then(response=>response.json())
      .then(res=> {
       
        this.contatos = res.data;
      })

    },
    
  }
</script>
