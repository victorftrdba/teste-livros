<script setup>
  import Books from '@/components/Admin/Books.vue';
  import NavBar from "../../components/Admin/NavBar.vue";
  import Auth from "../../components/Admin/Auth.vue";
</script>

<template>
  <Auth>
    <NavBar />
    <Books />
  </Auth>
</template>