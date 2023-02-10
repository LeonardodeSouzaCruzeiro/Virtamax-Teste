<template>
  <section>
    <div class="form">
      <img alt="Vue logo" src="../assets/logo.png"/>
      <div class="iconlogin">
        <router-link :to="{ name: 'register'}">
        <label>
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
          <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
          <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
        </svg>
        Criar conta?</label></router-link><br>
      </div> 
    <form  @submit.prevent="login">
        <div class="form-group">
          <input type="email" class="form-control"   placeholder="Email" v-model="form.email">
          <span class="text-danger" v-if="errors.email">
            {{ errors.email[0] }}
          </span>
        </div>

        <div class="form-group">
          <input type="password" class="form-control"  placeholder="Senha" v-model="form.password">
          <span class="text-danger" v-if="errors.password">
            {{ errors.password[0] }}
          </span>
        </div>
        <div class="button">
          <button  class="btn btn-primary">Entrar</button>
        </div>
      </form>
    </div>
 </section>



</template>

<script>
import User from "../apis/User";
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
        device_name: "browser"
      },
      errors: []
    };
  },
  methods: {
    login() {
      User.login(this.form)
        .then(response => {
          this.$root.$emit("login", true);
          localStorage.setItem("token", response.data);
          this.$router.push({ name: "Contatos" });
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
        });
    }
  }
};
</script>
