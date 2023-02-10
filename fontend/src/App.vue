<template>
  
  <router-view/>
</template>
<script>
import Navigation from "@/components/Navigation.vue";
export default {
  components: {
    Navigation
  }
};

</script>

<style>
.h-screen {
  height: 100vh;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;

}

.tabela{


  margin: 10px;

}

.form{
  background-color: white;
  position: relative;
  width: 30%;
  height: auto;
  margin-left: auto;
  margin-right: auto;
  border-radius: 25px;
  text-align: center;
  padding: 25px;
  border: solid 1px #CED4DA;
  box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.2);
}

.form input{
  margin-top: 30px;
 
}

.form button{
  margin-top: 40px;
 
}

.form img{
  width: 100px;
 
}


.iconlogin{
  width: 100%;
  text-align: right;
  color: darkgray;
}

.iconlogin label{
  text-decoration: none  ;
  color:darkgray;
  font-size: 16px;
}

.iconlogin label:hover{
  cursor:pointer;
  text-decoration: underline;
  color:#0D6EFD;
  font-size: 18px;
}

body{
  background-image: url('/src/assets/fundo.jpg');
  background-size: cover;
  

}

.bi-person-circle{
  color: green;
  
  
}

.logo{
  width: 32%;
  height: auto;
  text-align: left;

}

.logo img{
  width: 100px;
  height: auto;
  margin-left: 30px;
  
}
.user{
  text-align: right;
  width: 32%;
  height: auto;
  font-size: 18px;
  margin-right: 30px;
  
}

.nav{
  position: fixed;
  display: flex;
  width: 100%;
  background-color: white;
  height: 70px;
  margin-left: auto;
  margin-right: auto;
  box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.2);
  padding-right: 100px;
 
 

}

.relatorio{
  width: 32%;
  height: auto;
  text-align: center;
  
}

.relatorio label{
 background-color: #0D6EFD;
 padding: 10px;
 color: white;
 border: solid 2px #0D6EFD;
 border-radius: 5px;
 font-weight: bold;
 margin-left: 50px;
 margin-top: 5px;
 
}



/* Checkbox Hack */
#toggle-1 {
   display:none;
   
   
}

/* CSS padrão da div */
#mostra {
   display:none;
}

/* CSS quando o checkbox está marcado */
#toggle-1:checked ~ #mostra {
   display:block;
   padding: 10px;
   
}

#mostra a{
   margin: 5px;
   width: 150px;
}

#criar{
  background-color: #0D6EFD;
  color: white;
  font-weight: bold;
  padding: 10px;
  border-radius: 5px;
  cursor:pointer;
}



thead{
  background-color: #0d6dfd67;
  border-radius: 5px;
  font-size: 22px;
}

.table{
  
  width: 100%;
  height: auto;
  margin-left: auto;
  margin-right: auto;
  background-color:white;
}

.teste{
  border:solid 2px darkgray;
  border-radius: 10px;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  background-color: white;
  box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.2);
  
}




</style>
