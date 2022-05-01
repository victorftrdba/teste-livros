<script setup>
  import { RouterLink } from 'vue-router'
</script>

<template>
  <header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3 shadow-sm">
      <div class="container-fluid">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-4">
              <RouterLink class="me-3" to="/admin/books">Livros</RouterLink>
              <RouterLink class="me-3" to="/admin/readers">Leitores</RouterLink>
            </div>
            <div class="col-6 d-flex justify-content-end">
              <button @click="logout()" class="btn btn-danger rounded-0">Logout</button>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "NavBar",
  methods: {
    logout() {
      localStorage.removeItem('admin-token');

      this.$router.push({name:'admin-login'});
    }
  }
}
</script>