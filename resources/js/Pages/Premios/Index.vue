<template>
  <div>
    <h1>Premios</h1>
    <div class="premios">
      <div
        v-for="(premio, index) in premios"
        :key="premio.id"
        :class="['premio', { active: activeIndex === index }]"
      >
        <img :src="`/images/${premio.imagen}`" width="150" height="150" />
      </div>
    </div>

    <button @click="sortear">Sortear Premio</button>

    <div v-if="resultado">
      <h2>Premio seleccionado: {{ resultado }}</h2>
    </div>

    <hr />

    <h2>Registrar Participante</h2>
    <form @submit.prevent="registrar">
      <input v-model="form.nombre" placeholder="Nombre" required />
      <input v-model="form.email" placeholder="Email" required />
      <button type="submit">Registrar</button>
    </form>

    <h2>Lista de Participantes</h2>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="p in participantes" :key="p.id">
          <td>{{ p.nombre }}</td>
          <td>{{ p.email }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  premios: Array,
  participantes: Array
})

const activeIndex = ref(null)
const resultado = ref(null)

function sortear() {
  let index = 0
  resultado.value = null

  const interval = setInterval(() => {
    activeIndex.value = index
    index = (index + 1) % props.premios.length
  }, 150)

  setTimeout(() => {
    clearInterval(interval)
    const randomIndex = Math.floor(Math.random() * props.premios.length)
    activeIndex.value = randomIndex
    resultado.value = props.premios[randomIndex].id
  }, 3000)
}

const form = ref({
  nombre: '',
  email: ''
})

function registrar() {
  router.post('/premios/registrar', form.value) // ← corregido
}
</script>

<style scoped>
.premios {
  display: flex;
  gap: 20px;
}

.premio {
  border: 2px solid transparent;
  transition: border 0.3s;
}

.premio.active {
  border: 2px solid gold;
}
</style>