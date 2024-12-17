<template>
    <q-page padding>
      <h1>Computed</h1>
      <input type="text" v-model="filtro">
      <pre>{{ filtro }}</pre>

      <button @click="maiusculo">Click</button>
      <pre>{{ computedMaiusculo }}</pre>
    </q-page>
  </template>
  
  <script>
  export default {
    name: 'ExemploComputed',
    data () {
      return {
        filtro: ''
      }
    },
    computed: {
      computedMaiusculo () {
        return this.filtro.toUpperCase()
      }
    },
    methods: {
      maiusculo () {
        console.log(this.filtro)
      }
    }
  }
  </script>
  