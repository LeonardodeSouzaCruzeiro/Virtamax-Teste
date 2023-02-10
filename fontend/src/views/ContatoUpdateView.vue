<template>

<section>
  <div class="form">
    <img alt="Vue logo" src="../assets/logo.png" />
    <div class="iconlogin">
        <router-link :to="{ name: 'Contatos'}">
        <label>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
          </svg>
        Voltar</label></router-link><br>
      </div>
    <form @submit.prevent="setPost" enctype="'multipart/form-data">
    <input type="text" class="form-control" v-model="contato.nome">
    <input type="text" class="form-control" v-model="contato.email">
    <input type="text" class="form-control" v-model="contato.telefone">
    <input id="foto" v-on:change="onFileChange" type="file" name="foto" class="form-control">
    <div class="form-group" v-if="contato.foto">
        <img :src="`${'http://localhost:8000/storage/app/public/'+contato.foto}`">
    </div>    
    <button class="btn btn-primary">Salvar</button>
    </form>

   
</div>
</section>
</template>

<script>
  import axios from 'axios';

  export default{


    data(){
      return {
        contato:{},
        nome: '',
        email:'',
        telefone:'',
        foto:'',
        
      }
    },

     
     methods: {

            load(){

             const contatorId = this.$route.params.id;
             fetch(`http://localhost:8000/api/contatos/read/${contatorId}`)
            .then(response => response.json())
            .then(res => this.contato = res.data);

            },

            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },

            
            setPost(e) {
                e.preventDefault();
                let currentObj = this;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
    
                let formData = new FormData();
                formData.append('nome',this.contato.nome);
                formData.append('email',this.contato.email);
                formData.append('telefone',this.contato.telefone);
                formData.append('foto',this.file);
                console.log(formData.get('foto').name);
   
                fetch('http://localhost:8000/api/contatos/update/'+ this.$route.params.id,{
                    method:  'post',
                    body:formData,
                    headers: config,
            
        
      })
        .then(response => response.json())
        .then(data => console.log(data))
        

            }
        },

        created(){
            this.load();
        }

    
        
   
}
</script>