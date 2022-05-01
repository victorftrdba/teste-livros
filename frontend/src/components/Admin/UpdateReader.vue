<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <form @submit.prevent="updateReader()">
          <div v-for="error in errors">
            {{error}}
          </div>
          <div class="mt-3 fw-bold text-uppercase">
            Editar Leitor
          </div>
          <div class="border border-2 rounded p-4 mb-3">
            <div class="row mb-3">
              <div class="col-4">
                <label for="name">Nome</label>
                <input class="form-control" type="text" v-model="name" />
              </div>
              <div class="col-4">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" v-model="email" />
              </div>
              <div class="col-4">
                <label for="email">Senha</label>
                <input class="form-control" type="password" v-model="password" />
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <label for="phone">Telefone</label>
                <input v-mask="'(##) #####-####'" class="form-control" type="text" v-model="phone" />
              </div>
              <div class="col-4">
                <label for="address">Endereço</label>
                <input class="form-control" type="text" v-model="address" />
              </div>
              <div class="col-4">
                <label for="birthday">Aniversário</label>
                <input class="form-control" type="date" v-model="birthday" />
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
import {mask} from 'vue-the-mask';

export default {
  directives: {mask},
  name: "UpdateReader",
  data() {
    return {
      errors: [],
      id: "",
      name: "",
      email: "",
      phone: "",
      address: "",
      birthday: "",
      password: "",
    }
  },
  mounted() {
    const reader = JSON.parse(this.$route.params.reader);

    this.id = reader._id;
    this.name = reader.name;
    this.email = reader.email;
    this.phone = reader.phone;
    this.address = reader.address;
    this.birthday = reader.birthday;
  },
  methods: {
    async updateReader() {
      this.errors = [];

      const data = {
        name: this.name,
        email: this.email,
        phone: this.phone,
        address: this.address,
        birthday: this.birthday,
        password: this.password,
      }

      if (this.name === "") {
        this.errors.push("Nome é obrigatório!");
        return false;
      }

      if (this.email === "") {
        this.errors.push("E-mail é obrigatório!");
        return false;
      }

      if (this.password === "") {
        this.errors.push("Senha é obrigatória!");
        return false;
      }

      if (this.phone === "") {
        this.errors.push("Telefone é obrigatório!");
        return false;
      }

      if (this.address === "") {
        this.errors.push("Endereço é obrigatório!");
        return false;
      }

      if (this.birthday === "") {
        this.errors.push("Aniversário é obrigatório!");
        return false;
      }

      const response = await axios.patch(`http://localhost:8000/api/readers/${this.id}`, data, {
        headers: {
          "Authorization": `Bearer ${localStorage.getItem('admin-token')}`
        }
      });

      this.$router.push({ name: 'readers' });
    }
  }
}
</script>