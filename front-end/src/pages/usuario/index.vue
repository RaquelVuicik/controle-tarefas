<template>
  <q-page class="flex-inline flex-column">
    <div class="justify-center">
      <div class="row items-center q-ma-lg">
        <q-btn
          class="col-12"
          color="deep-purple-6"
          label="Cadastrar Usuário"
          push
          size="lg"
          :to="{name: 'create'}"
        />
      </div>
      <div class="q-mx-lg q-mb-lg">
        <q-table
          flat bordered
          title="Usuários"
          :rows="usuarios"
          :columns="columns"
          row-key="name"
          :selected-rows-label="getSelectedString"
          selection="multiple"
          v-model:selected="selected"
        >
        <template v-slot:body-cell-actions="props">
          <q-td :props="props">
            <!-- <pre>{{props.row}}</pre> -->
            <q-btn icon="mode_edit" :to="`/usuario/update/${props.row.id}`"></q-btn>
            <q-btn icon="delete" @click="confirm = true, idSelecionadoParaDeletar = props.row.id"></q-btn>
          </q-td>
        </template>
        </q-table>
        <q-dialog v-model="confirm" persistent>
          <q-card>
            <q-card-section class="row items-center">
              <q-avatar icon="warning" color="deep-purple-6" text-color="white" />
              <span class="q-ml-sm">Você tem certeza que quer excluir esse cadastro?</span>
            </q-card-section>

            <q-card-actions align="right">
              <q-btn flat label="Cancelar" color="deep-purple-6" v-close-popup />
              <q-btn flat label="Excluir" color="deep-purple-6" @click="deletarUsuario(idSelecionadoParaDeletar)" v-close-popup />
            </q-card-actions>
          </q-card>
        </q-dialog>
      </div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'IndexPage',
  data () {
    return {
      idSelecionadoParaDeletar: null,
      confirm: false,
      usuarios: [],
      selected: [],
      columns: [
        {
          name: 'name',
          required: true,
          label: 'Nome',
          align: 'left',
          field: 'name',
          format: val => `${val}`,
          sortable: true
        },
        {
          name: 'email',
          required: true,
          label: 'E-mail',
          align: 'left',
          field: 'email',
          format: val => `${val}`,
          sortable: true
        },
        {
          name: 'nivel_permissao',
          required: true,
          label: 'Nível Permissão',
          align: 'left',
          field: 'nivel_permissao',
          format: val => `${val}`,
          sortable: true
        },
        {
          name: 'actions',
          label: 'Ações',
          align: 'center',
          field: 'actions',
        },
      ]
    }
  },
  mounted () {
    this.listarUsuarios()
  },
  computed: {
  },
  methods: {
    listarUsuarios () {
      this.$api.get('/user').then((response) => {
        this.usuarios = response.data
      })
    },
    getSelectedString () {
      return this.selected.length === 0 ? '' : `${this.selected.length} record${this.selected.length > 1 ? 's' : ''} selected of ${this.usuarios.length}`
    },
    deletarUsuario (id) {
      this.$q.loading.show()
      this.$api.delete(`/user/${id}`)
      .then(() => {
        this.listarUsuarios()
      })
      .catch(() => {
        alert('Deu errado!')
      })
      .finally(() => {
        this.$q.loading.hide()
      })
    }
  },
});
</script>
