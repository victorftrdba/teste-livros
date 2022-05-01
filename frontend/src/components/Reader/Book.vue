<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <div class="mb-3 fw-bold text-uppercase">
          Lista de livros cadastrados
        </div>
        <div>
          <button @click="logout()" class="btn-danger mb-3">
            Logout
          </button>
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
              <th>Ações</th>
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
            <td>
              <button @click="readBook(book._id)" class="btn btn-white rounded-0" title="Marcar como lido">
                <i class="fa-solid fa-square-check"></i>
              </button>
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
    data() {
      return {
        books: {}
      }
    },
    async created() {
      const response = await axios.get('http://localhost:8000/api/books', {
        headers: {
          "Authorization": `Bearer ${localStorage.getItem('reader-token')}`
        }
      });
      return this.books = response.data.books;
    },
    methods: {
      async readBook(book_id) {
        const user = JSON.parse(localStorage.getItem('user'));

        const data = {
          book_id
        };

        const response = await axios.post(`http://localhost:8000/api/store-read-book/${user._id}`, data, {
          headers: {
            "Authorization": `Bearer ${localStorage.getItem('reader-token')}`
          }
        });

        return alert(response.data.success);
      },
      logout() {
        localStorage.removeItem('reader-token');
        localStorage.removeItem('user');

        this.$router.push({name: 'reader-login'});
      }
    }
  }
</script>

<style>
  thead {
    font-size: 0.9em;
  }

  tr {
    font-size: 0.8rem;
  }
</style>