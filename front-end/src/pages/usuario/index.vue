<template>
  <q-page class="flex flex-center">
    <q-table
      flat bordered
      title="Usuários"
      :rows="usuarios"
      :columns="columns"
      row-key="name"
      :selected-rows-label="getSelectedString"
      selection="multiple"
      v-model:selected="selected"
    />
  </q-page>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'IndexPage',
  data () {
    return {
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
    }
  }
});
</script>
