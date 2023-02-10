<template>
<div class="card-body">{{contato.id}}</div>
<div class="card-body">{{contato.nome}}</div>
<div class="card-body">{{contato.email}}</div>
<div class="card-body">{{contato.telefone}}</div>
<div class="card-body">{{contato.foto}}</div>
<div>
<img v-bind:src="`/storage/Fotos_Contatos/${contato.foto}`"/>
+
  <router-link :to="{ name: 'Contatos'}">Voltar</router-link>
            </div>
</template>

<script>
  export default{


    data(){
      return {
        contato:{}
      }
    },
     computed: {
        contatoId() {
            return this.$route.params.id;
        },
    },
    mounted() {
        const contatorId = this.$route.params.id;
        fetch(`http://localhost:8000/api/contatos/read/${contatorId}`)
            .then(response => response.json())
            .then(res => this.contato = res.data);
    },
}
</script>
