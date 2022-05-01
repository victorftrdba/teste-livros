<script setup>
  import NewReader from '../../components/Admin/NewReader.vue';
  import NavBar from "../../components/Admin/NavBar.vue";
  import Auth from "../../components/Admin/Auth.vue";
</script>

<template>
  <Auth>
    <NavBar />
    <NewReader />
  </Auth>
</template>