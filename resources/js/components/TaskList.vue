<template>
    <ul class="list-group">
        <li v-for="(task, key) in tasks" :key="key" class="list-group-item">
            {{ task }}
        </li>
    </ul>
    <br />
    <input type="text" class="form-control" v-model="newTask" @blur="addTask" />
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

// Mendeklarasikan state
const tasks = ref([]);
const newTask = ref('');

// Mengambil data tasks saat komponen dimuat
onMounted(() => {
  axios.get('/tasks')
    .then(response => {
      tasks.value = response.data;
    })
    .catch(error => console.error('Error fetching tasks:', error));

  window.Echo.channel('tasks').listen('TaskStatusUpdated', response => {
    tasks.value.push(response.task.body);
  });
});

// Fungsi untuk menambah task
const addTask = () => {
  if (newTask.value.trim() === '') return; // Cek input kosong

  axios.post('/tasks', { body: newTask.value })
    .then(() => {
      tasks.value.push({ body: newTask.value }); // Tambahkan task baru ke daftar
      newTask.value = ''; // Reset input
    })
    .catch(error => console.error('Error adding task:', error));
};
</script>
