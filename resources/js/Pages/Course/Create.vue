<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { ref } from 'vue'

const course = ref({
  name: '',
  code: '',
  description: '',
  credits: '',
  teacher: '',
  period: '',
  capacity: '',
  status: ''
})

const teachers = [
  'Ing. Abraham Sikaffy',
  'Ing. Ledin Alvarado',
  'Ing. Jontahan Moncada',
  'Lic. Juan Perez',
  'Ing. Mario Escobar',
]

const periods = [
  'Primero',
  'Segundo',
  'Tercero'
]

const statusOptions = [
  'Activo',
  'Inactivo'
]
</script>

<template>
  <AuthenticatedLayout>
    <v-container>

      <h2 class="mb-4">Crear Curso</h2>

      <v-form>

        <v-text-field
          label="Nombre"
          v-model="course.name"
        />

        <v-text-field
          label="Código"
          v-model="course.code"
        />

        <v-text-field
          label="Descripción"
          v-model="course.description"
        />

        <v-text-field
          label="Créditos"
          type="number"
          v-model="course.credits"
        />

        <v-select
          label="Docente"
          :items="teachers"
          v-model="course.teacher"
        />

        <v-select
          label="Periodo Académico"
          :items="periods"
          v-model="course.period"
        />

        <v-text-field
          label="Capacidad"
          type="number"
          v-model="course.capacity"
        />

        <v-select
          label="Estado"
          :items="statusOptions"
          v-model="course.status"
        />

        <v-btn color="primary" class="mt-4">
          Guardar Curso
        </v-btn>

      </v-form>

    </v-container>

    <Link :href="route('students.index')">
            <v-list-item prepend-icon="mdi-account" title="Estudiantes" value="students" />
          </Link>
          <Link :href="route('teachers.index')">
            <v-list-item prepend-icon="mdi-account-tie" title="Catedratico" value="teachers" />
          </Link>
          <Link :href="route('courses.index')">
            <v-list-item prepend-icon="mdi-book" title="Cursos" value="Cursos" />
          </Link>
         <Link :href="route('enrollments.index')">
            <v-list-item prepend-icon="mdi-book" title="Matricula" value="Cursos" />
          </Link>
  </AuthenticatedLayout>
</template>

