<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

const enrollments = ref([
  {
    id: 1,
    enrollment_date: '2026-01-10',
    status: 'Activo',
    final_average: 90,
    student_name: 'Juan López',
    course_name: 'Matemáticas'
  },
  {
    id: 2,
    enrollment_date: '2026-01-12',
    status: 'Activo',
    final_average: 88,
    student_name: 'María Gómez',
    course_name: 'Desarrollo de Software'
  },
  {
    id: 3,
    enrollment_date: '2026-01-15',
    status: 'Activo',
    final_average: 85,
    student_name: 'Carlos Ramírez',
    course_name: 'Sistemas Inteligentes para Negocios'
  },
  {
    id: 4,
    enrollment_date: '2026-01-18',
    status: 'Activo',
    final_average: 92,
    student_name: 'Ana Martínez',
    course_name: 'Sistemas Automatizados'
  },
  {
    id: 5,
    enrollment_date: '2026-01-20',
    status: 'Activo',
    final_average: 87,
    student_name: 'Pedro Flores',
    course_name: 'Redes II'
  },
  {
    id: 6,
    enrollment_date: '2026-01-22',
    status: 'Activo',
    final_average: 89,
    student_name: 'Luis Hernández',
    course_name: 'Doctrina Social de la Iglesia'
  },
  {
    id: 7,
    enrollment_date: '2026-01-25',
    status: 'Activo',
    final_average: 91,
    student_name: 'Sofía Castillo',
    course_name: 'Salud y Nutrición'
  },
  {
    id: 8,
    enrollment_date: '2026-01-28',
    status: 'Activo',
    final_average: 84,
    student_name: 'Jorge Díaz',
    course_name: 'Historia de Honduras'
  },
  {
    id: 9,
    enrollment_date: '2026-02-01',
    status: 'Activo',
    final_average: 93,
    student_name: 'Laura Torres',
    course_name: 'Ciencias de la Computación'
  },
  {
    id: 10,
    enrollment_date: '2026-02-05',
    status: 'Inactivo',
    final_average: 80,
    student_name: 'Miguel Sánchez',
    course_name: 'Filosofía'
  }
])
</script>

<template>
  <AuthenticatedLayout>
    <v-layout>

      <!-- SIDEBAR -->
      <v-navigation-drawer expand-on-hover permanent rail>
        <v-list>
          <v-list-item
            prepend-avatar="https://image2url.com/r2/default/images/1771360358863-98b4b741-f775-4a01-bca9-3c8f2ef59585.jpg"
            :subtitle="$page.props.auth.user.email"
            :title="$page.props.auth.user.name"
          />
        </v-list>

        <v-divider />

        <v-list density="compact" nav>
          <Link :href="route('students.index')" class="text-decoration-none">
            <v-list-item prepend-icon="mdi-account" title="Estudiantes" />
          </Link>

          <Link :href="route('teachers.index')" class="text-decoration-none">
            <v-list-item prepend-icon="mdi-account" title="Docentes" />
          </Link>

          <Link :href="route('courses.index')" class="text-decoration-none">
            <v-list-item prepend-icon="mdi-book" title="Cursos" />
          </Link>

          <Link :href="route('enrollments.index')">
            <v-list-item prepend-icon="mdi-book" title="Matrícula" value="matricula" />
          </Link>
        </v-list>
      </v-navigation-drawer>

   
      <v-main>
        <v-container>

   
          <Link :href="route('enrollments.create')">
            <v-btn color="primary" class="mb-4">
              CREAR INSCRIPCIONES
            </v-btn>
          </Link>

    
          <v-table striped="even">
            <thead>
              <tr>
                <th>ID</th>
                <th>FECHA_MATRICULA</th>
                <th>ESTADO</th>
                <th>PROMEDIO_FINAL</th>
                <th>NOMBRE_ESTUDIANTE</th>
                <th>NOMBRE_CURSO</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="enrollment in enrollments" :key="enrollment.id">
                <td>{{ enrollment.id }}</td>
                <td>{{ enrollment.enrollment_date }}</td>
                <td>{{ enrollment.status }}</td>
                <td>{{ enrollment.final_average }}</td>
                <td>{{ enrollment.student_name }}</td>
                <td>{{ enrollment.course_name }}</td>
              </tr>
            </tbody>

          </v-table>

        </v-container>
      </v-main>

    </v-layout>
  </AuthenticatedLayout>
</template>