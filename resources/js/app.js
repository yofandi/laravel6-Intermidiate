require("./bootstrap");

import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import TaskList from "./components/TaskList.vue";

const app = createApp({});
// const routes = [];

// const router = createRouter({
//     history: createWebHistory(),
//     routes,
// });

app.component("task-list", TaskList).mount("#app");
// createApp(TaskList).mount("#app");
