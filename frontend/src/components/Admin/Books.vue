<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <RouterLink class="btn-primary p-2" to="/admin/new-book">Novo Livro</RouterLink>
        <table class="table table-bordered text-center mt-3 table-responsive">
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
          <tr v-for="(book, index) in books">
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
              <button @click="updateBook(book)" class="btn-success">
                Editar livro
              </button>
              <button @click="deleteBook(index, book._id)" class="btn-danger ms-3">
                Exclur livro
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
import axios from 'axios';

export default {
  name: "Books.vue",
  data() {
    return {
      books: {}
    }
  },
  async created() {
    const response = await axios.get('http://localhost:8000/api/books', {
      headers: {
        "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
      }
    });
    return this.books = response.data.books;
  },
  methods: {
    updateBook(book) {
      this.$router.push({name: 'update-book', params: {
          book: JSON.stringify(book),
        }});
    },
    async deleteBook(index, id) {
      this.books.splice(index,  1);

      await axios.delete(`http://localhost:8000/api/books/${id}`, {
        headers: {
          "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
        }
      });
    }
  }
}
</script>