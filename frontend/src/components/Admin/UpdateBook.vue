<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <form @submit.prevent="updateBook()">
          <div v-for="error in errors">
            {{error}}
          </div>
          <div class="mt-3 fw-bold text-uppercase">
            Editar Livro
          </div>
          <div class="border border-2 rounded p-4">
            <div class="row mb-3">
              <div class="col-4">
                <label for="name">Nome</label>
                <input class="form-control" type="text" v-model="name" />
              </div>
              <div class="col-4">
                <label for="gender">Gênero</label>
                <input class="form-control" type="text" v-model="gender" />
              </div>
              <div class="col-4">
                <label for="author">Autor</label>
                <input class="form-control" type="text" v-model="author" />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-4">
                <label for="pages">Páginas</label>
                <input class="form-control" type="number" v-model="pages" />
              </div>
              <div class="col-4">
                <label for="year">Ano</label>
                <input v-mask="'####'" class="form-control" type="number" v-model="year" />
              </div>
              <div class="col-4">
                <label for="language">Idioma</label>
                <input class="form-control" type="text" v-model="language" />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="edition">Edição</label>
                <input class="form-control" type="text" v-model="edition" />
              </div>
              <div class="col-6">
                <label for="isbn">ISBN</label>
                <input v-mask="'###-##-#####-##-#'" class="form-control" type="text" v-model="isbn" />
              </div>
            </div>
          </div>

          <div class="mt-3 fw-bold text-uppercase">
            Informações da Editora
          </div>
          <div class="border border-2 rounded p-4 mb-3">
            <div class="row">
              <div class="col-4">
                <label for="editor.name">Nome</label>
                <input class="form-control" type="text" v-model="editor.name" />
              </div>
              <div class="col-4">
                <label for="editor.code">Código</label>
                <input class="form-control" type="number" v-model="editor.code" />
              </div>
              <div class="col-4">
                <label for="editor.phone">Telefone</label>
                <input v-mask="'(##) #####-####'" class="form-control" type="text" v-model="editor.phone" />
              </div>
            </div>
          </div>

          <div>
            <button type="submit" class="btn-success fw-bold text-uppercase">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import {mask} from "vue-the-mask";

export default {
  directives: {mask},
  data() {
    return {
      errors: [],
      id: "",
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
  },
  mounted() {
    const book = JSON.parse(this.$route.params.book);

    this.id = book._id;
    this.name = book.name;
    this.gender = book.gender;
    this.author = book.author;
    this.pages = book.pages;
    this.year = book.year;
    this.language = book.language;
    this.edition = book.edition;
    this.editor.name = book.editor.name;
    this.editor.code = book.editor.code;
    this.editor.phone = book.editor.phone;
    this.isbn = book.isbn;
  },
  methods: {
    async updateBook()
    {
      this.errors = [];

      const data = {
        name: this.name,
        gender: this.gender,
        author: this.author,
        pages: this.pages,
        year: this.year,
        language: this.language,
        edition: this.edition,
        editor: {
          name: this.editor.name,
          code: this.editor.code,
          phone: this.editor.phone,
        },
        isbn: this.isbn,
      }

      if (this.name === "") {
        this.errors.push("Nome é obrigatório!");
        return false;
      }

      if (this.gender === "") {
        this.errors.push("Gênero é obrigatório!");
        return false;
      }

      if (this.author === "") {
        this.errors.push("Autor é obrigatório!");
        return false;
      }

      if (this.year === "") {
        this.errors.push("Ano é obrigatório!");
        return false;
      }

      if (this.language === "") {
        this.errors.push("Idioma é obrigatório!");
        return false;
      }

      if (this.edition === "") {
        this.errors.push("Edição é obrigatório!");
        return false;
      }

      if (this.editor.name === "") {
        this.errors.push("Nome da editora é obrigatório!");
        return false;
      }

      if (this.editor.code === "") {
        this.errors.push("Código da editora é obrigatório!");
        return false;
      }

      if (this.editor.phone === "") {
        this.errors.push("Telefone da editora é obrigatório!");
        return false;
      }

      if (this.isbn === "") {
        this.errors.push("ISBN é obrigatório!");
        return false;
      }

      const response = await axios.patch(`http://localhost:8000/api/books/${this.id}`, data, {
        headers: {
          "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
        }
      });

      this.$router.push({ name: 'books' });
    }
  }
}
</script>