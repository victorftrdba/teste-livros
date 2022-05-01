<script setup>
  import UpdateReader from "../../components/Admin/UpdateReader.vue";
  import NavBar from "../../components/Admin/NavBar.vue";
  import Auth from "../../components/Admin/Auth.vue";
</script>

<template>
  <Auth>
    <NavBar />
    <UpdateReader />
  </Auth>
</template>