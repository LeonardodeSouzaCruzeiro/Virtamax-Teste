<template>
  <div class="about">
    <h1>Pagina de Usuarios</h1>
  </div>
  
  <div v-for="user in users">
    {{user.name}}<br>
  </div>
  
</template>

<script>
  export default{

    data(){
      return {
        users:[]
      }
    },

    created(){
      fetch('http://localhost:8000/api/users')
      .then(response=>response.json())
      .then(r=> {
        this.users = r
      })

    }
  }
</script>
