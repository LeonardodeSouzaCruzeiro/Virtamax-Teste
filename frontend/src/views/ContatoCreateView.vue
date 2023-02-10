<template>
  <section>

    <div class="form">
      <img alt="Vue logo" src="../assets/logo.png"/>
      <div class="iconlogin">
        <router-link :to="{ name: 'Contatos'}">
        <label>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
          </svg>
        Voltar</label></router-link><br>
      </div>
      <form @submit.prevent="setPost" enctype="'multipart/form-data">

				<input v-model="contatoData.nome" type="text" class="form-control" id="nome" name="nome" placeholder="Nome"/>

			
				<input v-model="contatoData.email" type="text" class="form-control" name="email" id="email" placeholder="Email"/>
				<input v-model="contatoData.telefone" type="text" class="form-control" name="telefone" id="telefone"  placeholder="Telefone"/><br><br>

			
        <div style="text-align: center;">
          <label><b>Foto Pessoal</b></label> 
				<input id="foto" v-on:change="onFileChange" type="file" name="foto" class="form-control" placeholder="Foto" ><br>
        
      </div>
       


				
      <button class="btn btn-primary">Salvar</button>
    </form>
  </div> 
  </section>
</template>

   
<script>
	
	
    export default {
       
        data() {
            return {
              contatoData: {
        	  nome: '',
        	  email:'',
              telefone:'',
              foto:'',
        
       
      },
      
            };
        },
        methods: {
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
	            formData.append('nome',this.contatoData.nome);
	            formData.append('email',this.contatoData.email);
	            formData.append('telefone',this.contatoData.telefone);
	            formData.append('foto',this.file);
	            console.log(formData.get('foto').name);
   
                fetch('http://localhost:8000/api/contatos/create',{
			        method:  'post',
			        body:formData,
			        headers: config,
        	
        
      })
        .then(response => response.json())
        .then(data => console.log(data))
        .then(()=>this.$router.push('contatos'))

            }
        }
    }
</script>
