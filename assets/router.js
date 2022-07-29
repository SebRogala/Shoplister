import {createRouter, createWebHashHistory} from "vue-router";

import Home from "./views/Home";
import About from "./views/About";

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router
