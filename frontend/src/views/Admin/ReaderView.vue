<script setup>
  import Readers from "../../components/Admin/Readers.vue";
  import NavBar from "../../components/Admin/NavBar.vue";
  import Auth from "../../components/Admin/Auth.vue";
</script>

<template>
  <Auth>
    <NavBar />
    <Readers />
  </Auth>
</template>