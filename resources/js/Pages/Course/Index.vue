<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const courses = ref([
  { ID: '1', Nombre: 'Redes 1', Codigo: 'RED', Descripcion: 'LAN Y WAN', Creditos: 4, MaestroId: 1, PeriodoId: 2026, Capacidad: 30, Estatus: 'Activo' },
  { ID: '2', Nombre: 'Desarrollo de Software', Codigo: 'DES', Descripcion: 'LARAVEL', Creditos: 4, MaestroId: 2, PeriodoId: 2026, Capacidad: 40, Estatus: 'Activo' },
  { ID: '3', Nombre: 'Redes2', Codigo: 'RES2', Descripcion: 'MICROTICK', Creditos: 4, MaestroId: 1, PeriodoId: 2026, Capacidad: 40, Estatus: 'Activo' },
  { ID: '4', Nombre: 'Base de Datos', Codigo: 'DATA', Descripcion: 'Bases', Creditos: 3, MaestroId: 3, PeriodoId: 2026, Capacidad: 40, Estatus: 'Activo' },
  { ID: '5', Nombre: 'Principios de Electrónica', Codigo: 'PRIN', Descripcion: 'Robots', Creditos: 3, MaestroId: 4, PeriodoId: 2026, Capacidad: 40, Estatus: 'Activo' },
  { ID: '6', Nombre: 'Excel', Codigo: 'EXC', Descripcion: 'Tablas', Creditos: 3, MaestroId: 4, PeriodoId: 2026, Capacidad: 30, Estatus: 'Activo' },
  { ID: '7', Nombre: 'Sistemas Inteligentes', Codigo: 'SIS', Descripcion: 'Sistemas de Negocios', Creditos: 3, MaestroId: 5, PeriodoId: 2026, Capacidad: 40, Estatus: 'Activo' },
  { ID: '8', Nombre: 'Ecología', Codigo: 'ECO', Descripcion: 'Medio Ambiente', Creditos: 3, MaestroId: 6, PeriodoId: 2026, Capacidad: 40, Estatus: 'Activo' },
  { ID: '9', Nombre: 'Robótica', Codigo: 'ROBO', Descripcion: 'Circuitos', Creditos: 1, MaestroId: 7, PeriodoId: 2026, Capacidad: 40, Estatus: 'Activo' },
  { ID: '10', Nombre: 'Senderismo', Codigo: 'SEND', Descripcion: 'Caminata', Creditos: 1, MaestroId: 10, PeriodoId: 2026, Capacidad: 40, Estatus: 'Inactivo' },
]);
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
            <v-list-item prepend-icon="mdi-account-tie" title="Catedrático" value="teachers" />
          </Link>
          <Link :href="route('courses.index')">
            <v-list-item prepend-icon="mdi-book" title="Cursos" value="cursos" />
          </Link>
          <Link :href="route('enrollments.index')">
            <v-list-item prepend-icon="mdi-book" title="Matrícula" value="matricula" />
          </Link>
        </v-list>
      </v-navigation-drawer>


      <v-main>
        <v-container>
          <v-row>

            <v-col cols="12" md="3" class="d-flex align-center">
              <Link :href="route('courses.create')">
                <v-btn color="primary" block>Crear Curso</v-btn>
              </Link>
            </v-col>


            <v-col cols="12" md="9">
              <v-table striped="even">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>ID Maestro</th>
                    <th>ID Periodo Académico</th>
                    <th>Capacidad</th>
                    <th>Estatus</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in courses" :key="item.ID">
                    <td>{{ item.ID }}</td>
                    <td>{{ item.Nombre }}</td>
                    <td>{{ item.Codigo }}</td>
                    <td>{{ item.Descripcion }}</td>
                    <td>{{ item.Creditos }}</td>
                    <td>{{ item.MaestroId }}</td>
                    <td>{{ item.PeriodoId }}</td>
                    <td>{{ item.Capacidad }}</td>
                    <td>
                      <v-chip :color="item.Estatus === 'Activo' ? 'green' : 'red'" dark>
                        {{ item.Estatus }}
                      </v-chip>
                    </td>
                  </tr>
                </tbody>
              </v-table>
            </v-col>
          </v-row>
        </v-container>
      </v-main>
    </v-layout>
  </AuthenticatedLayout>
</template>