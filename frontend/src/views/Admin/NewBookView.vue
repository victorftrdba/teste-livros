<script setup>
  import NewBook from '../../components/Admin/NewBook.vue';
  import NavBar from "../../components/Admin/NavBar.vue";
  import Auth from "../../components/Admin/Auth.vue";
</script>

<template>
  <Auth>
    <NavBar />
    <NewBook />
  </Auth>
</template>