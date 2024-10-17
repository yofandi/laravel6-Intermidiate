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
import { ref, onMounted } from "vue";
import axios from "axios";

// Mendeklarasikan state
const tasks = ref([]);
const newTask = ref("");

// Mengambil data tasks saat komponen dimuat
onMounted(async () => {
    //   await axios.get('/tasks')
    //     .then(response => {
    //       tasks.value = response.data;
    //     })
    //     .catch(error => console.error('Error fetching tasks:', error));
    const response = await axios.get("/tasks");
    tasks.value = response.data;
    console.log(tasks);

    window.Echo.channel("tasks").listen("TaskStatusUpdated", (response) => {
        tasks.value.push(response.task.body);
    });
});

// Fungsi untuk menambah task
const addTask = async () => {
    await axios.post("/tasks", { body: newTask.value });
    tasks.value.push(newTask.value);
    newTask.value = "";
};
</script>
