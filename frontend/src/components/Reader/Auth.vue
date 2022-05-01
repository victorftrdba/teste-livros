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
        "Authorization": `Bearer ${localStorage.getItem('reader-token')}`
      }
    })
    .then(response => {
      localStorage.setItem('user', JSON.stringify(response.data));
    })
    .catch(error => {
      this.$router.push({name:'reader-login'});
    });
  }
}
</script>