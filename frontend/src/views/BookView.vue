<script setup>
import Books from '@/components/Books.vue'
</script>

<template>
  <RouterLink to="/new-book">Novo Livro</RouterLink>
  <Books />
</template>

<script>
export default {
  name: "BookView"
}
</script>

<style scoped>

</style>