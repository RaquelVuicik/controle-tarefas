<template>
  <q-page padding>
    <p class="text-h6">Formulário de Cadastro do Usuário</p>
      <q-form
        @submit="onSubmit"
        @reset="onReset"
        class="row q-col-gutter-md"
      >
        <q-input
          outlined
          clearable
          clear-icon="close"
          v-model="form.name"
          color="deep-purple"
          label="Nome"
          class="col-md-12 col-sm-12 col-xs-12"
          :rules="[
            val => val && val.length > 0 || 'Nome obrigatório'
          ]"
        >
          <template v-slot:prepend>
            <q-icon name="person"/>
          </template>
        </q-input>
        <q-input
          v-model="form.email"
          clearable
          clear-icon="close"
          label="E-mail"
          outlined
          class="col-md-12 col-sm-12 col-xs-12"
          color="deep-purple"
          :rules="[
            val => val && val.length > 0 || 'E-mail obrigatório'
          ]"
        >
          <template v-slot:prepend>
            <q-icon name="email"/>
          </template>
        </q-input>
        <q-select
          outlined
          v-model="form.nivel_permissao"
          :options="optionsNivelPermissao"
          label="Nível de Permissão"
          class="col-md-12 col-sm-12 col-xs-12"
          color="deep-purple"
          emit-value
          map-options
          :rules="[
            val => val && val.length > 0 || 'Nível de Permissão obrigatório'
          ]"
        />
        <q-input
          outlined
          v-model="form.password"
          :type="isPwd ? 'password' : 'text'"
          hint="Password with toggle"
          color="deep-purple"
          label="Senha"
          class="col-md-12 col-sm-12 col-xs-12"
        >
          <template v-slot:append>
            <q-icon
              :name="isPwd ? 'visibility_off' : 'visibility'"
              class="cursor-pointer"
              @click="isPwd = !isPwd"
            />
          </template>
        </q-input>
        <!-- <pre>{{ form }}</pre> -->
        <div class="col-12">
          <q-btn
            label="Atualizar"
            type="submit"
            color="deep-purple"
            class="float-right"
          />
          <q-btn
            label="Resetar"
            type="reset"
            color="default"
            class="float-right text-grey-10 q-mr-md"
            onclick="resetForm"
          />
        </div>
      </q-form>
  </q-page>
</template>

<script>
export default {
  name: 'UsuarioUpdate',
  data () {
    return {
      isPwd: true,

      form: {},
      optionsNivelPermissao: [
        { label: 'Administrador', value: 'admin' },
        { label: 'Colaborador', value: 'colaborador' }
      ],
    }
  },
  mounted () {
    this.buscarUsuario(this.$route.params.id)
  },
  methods: {
    buscarUsuario (id) {
      this.$api.get(`/user/${id}`)
      .then((response) => {
        this.form = {
          id: response.data.id,
          name: response.data.name,
          email: response.data.email,
          nivel_permissao: response.data.nivel_permissao,
          password: '',
        }
      })
    },
    onSubmit () {
      this.$api.put(`/user/${this.form.id}`, this.form)
      .then(() => {
        this.$q.notify({
          message: 'Cadastro realizado com sucesso',
          color: 'positive',
          icon: 'check_circle_outline'
        })
        this.$router.push('/usuario')
      })
    },
    async onReset () {
      await this.resetForm()
      this.$refs.myForm.resetValidation()
    },
    async resetForm () {
      this.form = {
        nome: '',
        email: '',
        nivelPermissao: '',
        password: '',
      }
    },
  }
}
</script>
