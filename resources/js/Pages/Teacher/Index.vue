<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'   

const desserts = ref([
  { name: 'Frozen Yogurt', calories: 159 },
  { name: 'Ice cream sandwich', calories: 237 },
  { name: 'Eclair', calories: 262 },
  { name: 'Cupcake', calories: 305 },
  { name: 'Gingerbread', calories: 356 },
  { name: 'Jelly bean', calories: 375 },
  { name: 'Lollipop', calories: 392 },
  { name: 'Honeycomb', calories: 408 },
  { name: 'Donut', calories: 452 },
  { name: 'KitKat', calories: 518 },
])
</script>

<template>
  <AuthenticatedLayout>
    <v-layout>
      
      
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
        </v-list>
      </v-navigation-drawer>
      
      <v-main>
        <v-container>
          <v-table striped="even">
            <thead>
              <tr>
                   <th class="text-left">ID</th>
                <th class="text-left">Codigo de Empleado</th>
                <th class="text-left">Especialidad</th>
                <th class="text-left">Fecha de Contratacion</th>
                <th class="text-left">Estatus</th>
                <th class="text-left">Fecha de Creacion</th>
                <th class="text-left">Fecha de Actualizacion</th>
                <th class="text-left">Fecha de Eliminacion</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in desserts" :key="item.name">
                <td>{{ item.name }}</td>
                <td>{{ item.calories }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.calories }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.calories }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.calories }}</td>
                <td>{{ item.name }}</td>

              </tr>
            </tbody>
          </v-table>

          <div class="text-center mt-4">
            <v-bottom-sheet>
              <template v-slot:activator="{ props: activatorProps }">
                <v-btn v-bind="activatorProps" color="primary">Click Me</v-btn>
              </template>

              <v-card
                title="Bottom Sheet"
                text="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut, eos? Nulla aspernatur odio rem, culpa voluptatibus eius debitis dolorem perspiciatis asperiores sed consectetur praesentium! Delectus et iure maxime eaque exercitationem!"
              />
            </v-bottom-sheet>
          </div>
        </v-container>
      </v-main>
    </v-layout>
  </AuthenticatedLayout>
</template>