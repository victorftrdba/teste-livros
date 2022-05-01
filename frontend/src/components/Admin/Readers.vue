<script setup>
import moment from 'moment'
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <RouterLink to="/admin/new-reader">Novo Leitor</RouterLink>
        <table class="table table-bordered text-center mt-3">
          <thead>
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Aniversário</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="reader in readers">
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
    const response = await axios.get('http://localhost:8000/api/readers');

    return this.readers = response.data.readers;
  },
}
</script>