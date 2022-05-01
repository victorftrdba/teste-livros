<script setup>
import NavBar from "../../components/Admin/NavBar.vue";
import UpdateBook from "../../components/Admin/UpdateBook.vue";
import Auth from "../../components/Admin/Auth.vue";
</script>

<template>
  <Auth>
    <NavBar />
    <UpdateBook />
  </Auth>
</template>

<script>
export default {
  name: "UpdateBookView"
}
</script>