import {createRouter, createWebHistory} from "vue-router";

import Home from "./routes/Home";
import About from "./routes/About";

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
