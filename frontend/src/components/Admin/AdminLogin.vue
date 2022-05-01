<template>
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center align-items-center mt-5">
        <form @submit.prevent="login()">
          <div class="text-center fw-bold text-uppercase mb-3">
            Painel do Administrador
          </div>
          <div class="row">
            <div class="col-6">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" v-model="email">
            </div>
            <div class="col-6">
              <label for="password">Senha</label>
              <input type="password" class="form-control" v-model="password">
            </div>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-success rounded-0 fw-bold text-uppercase">Autenticar</button>
            <a class="btn btn-primary rounded-0 fw-bold text-uppercase ms-3" href="/">Voltar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "AdminLogin",
  data() {
    return {
      email: "",
      password: "",
    }
  },
  methods: {
    login() {
      const data = {
        email: this.email,
        password: this.password,
      }

      axios.get('http://localhost:8000/sanctum/csrf-cookie').then(async response => {
        const res = await axios.post('http://localhost:8000/api/admin-login', data);

        localStorage.setItem('admin-token', res.data.plainTextToken);

        this.$router.push({ name: 'books' });
      });
    }
  }
}
</script>