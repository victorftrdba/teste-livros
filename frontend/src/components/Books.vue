<template>
  <div v-for="book in books">
    <hr />
    <div>
      Nome: {{book.name}}
    </div>
    <div>
      Gênero: {{book.gender}}
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Books.vue",
  data() {
    return {
      books: {}
    }
  },
  async created() {
    const response = await axios.get('http://localhost:8000/api/books');

    return this.books = response.data.books;
  }
}
</script>

<style scoped>

</style>