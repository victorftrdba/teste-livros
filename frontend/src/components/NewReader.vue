<template>
  <form @submit.prevent="storeReader()">
    <div v-for="error in errors">
      {{error}}
    </div>
    <div>
      <label for="name">Nome</label>
      <input type="text" v-model="name" />
    </div>
    <div>
      <label for="email">E-mail</label>
      <input type="email" v-model="email" />
    </div>
    <div>
      <label for="phone">Telefone</label>
      <input type="text" v-model="phone" />
    </div>
    <div>
      <label for="address">Endereço</label>
      <input type="text" v-model="address" />
    </div>
    <div>
      <label for="birthday">Aniversário</label>
      <input type="date" v-model="birthday" />
    </div>
    <div>
      <button type="submit">Enviar</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "NewReader.vue",
  data() {
    return {
      errors: [],
      name: "",
      email: "",
      phone: "",
      address: "",
      birthday: "",
    }
  },
  methods: {
    storeReader() {
      this.errors = [];

      const data = {
        name: this.name,
        email: this.email,
        phone: this.phone,
        address: this.address,
        birthday: this.birthday
      }

      if (this.name === "") {
        this.errors.push("Nome é obrigatório!");
      }

      if (this.email === "") {
        this.errors.push("E-mail é obrigatório!");
      }

      if (this.phone === "") {
        this.errors.push("Telefone é obrigatório!");
      }

      if (this.address === "") {
        this.errors.push("Endereço é obrigatório!");
      }

      if (this.birthday === "") {
        this.errors.push("Aniversário é obrigatório!");
      }

      this.$router.push({ name: 'home' });
    }
  }
}
</script>

<style scoped>

</style>