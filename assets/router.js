import {createRouter, createWebHashHistory} from "vue-router";

import Home from "./views/Home";
import About from "./views/About";
import ShoppingList from "./views/ShoppingList/ShoppingList";

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/shopping-list', component: ShoppingList },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router
