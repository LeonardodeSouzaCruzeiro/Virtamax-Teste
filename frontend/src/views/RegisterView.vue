<template>
  <section>
    <div class="form">
      <img alt="Vue logo" src="../assets/logo.png"/>
      <div class="iconlogin">
        <router-link :to="{ name: 'home'}">
        <label>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
          </svg>
        Voltar</label></router-link><br>
      </div> 
      <form @submit.prevent="setPost" enctype="'multipart/form-data">
          <input v-model="contatoData.name" type="text" class="form-control" id="name" name="name" placeholder="Nome"/>
          <input v-model="contatoData.email" type="text" class="form-control" name="email" id="email" placeholder="Email"/>
          <input v-model="contatoData.password" type="password" class="form-control" name="password" id="password"  placeholder="Senha"/>

        
          
        <button class="btn btn-primary">Registrar</button>
      </form>
  </div> 
  </section>
</template>

   
<script>
  
  
    export default {
       
        data() {
            return {
              contatoData: {
            name: '',
            email:'',
            password:''
              
        
       
      },
      
            };
        },
        methods: {

        
            setPost(e) {
                e.preventDefault();
                let currentObj = this;
   
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
    
                let formData = new FormData();
              formData.append('name',this.contatoData.name);
              formData.append('email',this.contatoData.email);
              formData.append('password',this.contatoData.password);
              
   
                fetch('http://localhost:8000/api/auth/register',{
              method:  'post',
              body:formData,
              headers: config,
          
        
      })
        .then(response => response.json())
        .then(data => console.log(data))
        

            }
        }
    }
</script>
