<script setup>
import NavBar from "./NavBar.vue";
</script>

<template>
  <NavBar />
  <div class="container">
    <div class="row">
      <div class="col-12 mt-4">
        <div class="text-uppercase fw-bold mb-3">
          Livros lidos pelo leitor {{this.name}}: <span class="text-danger">{{this.books.length}}</span>
        </div>
        <table class="table table-bordered text-center table-responsive">
          <thead>
          <tr>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Autor</th>
            <th>Páginas</th>
            <th>Ano</th>
            <th>Idioma</th>
            <th>Edição</th>
            <th>Nome da Editora</th>
            <th>Código da Editora</th>
            <th>Telefone da Editora</th>
            <th>ISBN</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="book in books">
            <td>
              {{book.name}}
            </td>
            <td>
              {{book.gender}}
            </td>
            <td>
              {{book.author}}
            </td>
            <td>
              {{book.pages}}
            </td>
            <td>
              {{book.year}}
            </td>
            <td>
              {{book.language}}
            </td>
            <td>
              {{book.edition}}
            </td>
            <td>
              {{book.editor.name}}
            </td>
            <td>
              {{book.editor.code}}
            </td>
            <td>
              {{book.editor.phone}}
            </td>
            <td>
              {{book.isbn}}
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "ReaderBooks",
  data() {
    return {
      id: "",
      name: "",
      books: {},
    }
  },
  async created() {
    this.id = this.$route.params.id;
    this.name = this.$route.params.name;

    const response = await axios.get(`http://localhost:8000/api/readers/see-reader-books/${this.id}`, {
      headers: {
        "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
      }
    });

    this.books = response.data.books;
  }
}
</script>