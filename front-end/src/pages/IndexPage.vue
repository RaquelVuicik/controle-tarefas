<template>
  <q-page class="flex flex-center">
    <img
      alt="Quasar logo"
      src="~assets/quasar-logo-vertical.svg"
      style="width: 200px; height: 200px"
    >
    <button @click="listarUsuarios">Listar</button>
    <pre>{{ usuarios }}</pre>
  </q-page>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'IndexPage',
  data () {
    return {
      usuarios: []
    }
  },
  mounted () {
    this.listarUsuarios()
  },
  methods: {
    listarUsuarios () {
      this.$api.get('/user').then((response) => {
        this.usuarios = response.data
      })
    }
  }
});
</script>
