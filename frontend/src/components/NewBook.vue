<template>
  <form @submit.prevent="storeBook()">
    <div v-for="error in errors">
      {{error}}
    </div>
    <div>
      <label for="name">Nome</label>
      <input type="text" v-model="name" />
    </div>
    <div>
      <label for="gender">Gênero</label>
      <input type="text" v-model="gender" />
    </div>
    <div>
      <label for="author">Autor</label>
      <input type="text" v-model="author" />
    </div>
    <div>
      <label for="pages">Páginas</label>
      <input type="number" v-model="pages" />
    </div>
    <div>
      <label for="year">Ano</label>
      <input type="number" v-model="year" />
    </div>
    <div>
      <label for="language">Idioma</label>
      <input type="text" v-model="language" />
    </div>
    <div>
      <label for="edition">Edição</label>
      <input type="text" v-model="edition" />
    </div>
    <div>
      <label for="editor.name">Nome da Editora</label>
      <input type="text" v-model="editor.name" />
    </div>
    <div>
      <label for="editor.code">Código da Editora</label>
      <input type="number" v-model="editor.code" />
    </div>
    <div>
      <label for="editor.phone">Telefone da Editora</label>
      <input type="number" v-model="editor.phone" />
    </div>
    <div>
      <label for="isbn">ISBN</label>
      <input type="text" v-model="isbn" />
    </div>
    <div>
      <button type="submit">Enviar</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "NewBook.vue",
  data() {
    return {
      errors: [],
      name: "",
      gender: "",
      author: "",
      pages: "",
      year: "",
      language: "",
      edition: "",
      editor: {
        name: "",
        code: "",
        phone: "",
      },
      isbn: "",
    }
  }
}
</script>

<style scoped>

</style>