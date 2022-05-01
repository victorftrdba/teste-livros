<script setup>
import moment from 'moment'
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <RouterLink class="btn-primary p-2" to="/admin/new-reader">Novo Leitor</RouterLink>
        <table class="table table-bordered text-center mt-3 table-responsive">
          <thead>
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Aniversário</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(reader, index) in readers">
            <td>
              {{reader.name}}
            </td>
            <td>
              {{reader.email}}
            </td>
            <td>
              {{reader.phone}}
            </td>
            <td>
              {{reader.address}}
            </td>
            <td>
              {{moment(reader.birthday).format('DD/MM')}}
            </td>
            <td>
              <button @click="showReadBooks(reader.name, reader.books)" class="btn-primary">
                Ver livros lidos
              </button>
              <button @click="updateReader(reader)" class="btn-success ms-3">
                Editar leitor
              </button>
              <button @click="deleteReader(index, reader._id)" class="btn-danger ms-3">
                Excluir leitor
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
  name: "Readers.vue",
  data() {
    return {
      readers: {},
    }
  },
  async created() {
    const response = await axios.get('http://localhost:8000/api/readers', {
      headers: {
        "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
      }
    });

    return this.readers = response.data.readers;
  },
  methods: {
    showReadBooks(name, books) {
      this.$router.push({name: 'reader-book', params: {
          name,
          books: JSON.stringify(books)
        }});
    },
    updateReader(reader) {
      this.$router.push({name: 'update-reader', params: {
          reader: JSON.stringify(reader),
        }});
    },
    async deleteReader(index, id) {
      this.readers.splice(index,  1);

      await axios.delete(`http://localhost:8000/api/readers/${id}`, {
        headers: {
          "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
        }
      });
    }
  }
}
</script>