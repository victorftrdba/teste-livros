<template>
  <slot />
</template>

<script>
import axios from "axios";
export default {
  name: "Auth",
  created() {
    axios.get('http://localhost:8000/api/user', {
      headers: {
        "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
      }
    })
    .then(response => {
      localStorage.setItem('admin', JSON.stringify(response.data));
    })
    .catch(error => {
      this.$router.push({name:'admin-login'});
    });
  }
}
</script>