<template>
  <div v-for="reader in readers">
    <hr />
      <div>
        Nome: {{reader.name}}
      </div>
      <div>
          E-mail: {{reader.email}}
      </div>
      <div>
          Telefone: {{reader.phone}}
      </div>
      <div>
          Endereço: {{reader.address}}
      </div>
      <div>
          Aniversário: {{reader.birthday}}
      </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Readers.vue",
  data() {
    return {
      readers: {}
    }
  },
  async created() {
    const response = await axios.get('http://localhost:8000/api/readers');

    return this.readers = response.data.readers;
  }
}
</script>

<style scoped>

</style>