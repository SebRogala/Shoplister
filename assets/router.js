import {createRouter, createWebHashHistory} from "vue-router";

import Home from "./views/Home";
import About from "./views/About";
import ShoppingList from "./views/ShoppingList/ShoppingList";
import ShoppingListId from "./views/ShoppingList/ShoppingListId";

const routes = [
    {path: '/', name: "home", component: Home},
    {path: '/about', component: About},
    {path: '/shopping-list', name: "shopping-list", component: ShoppingList},
    {path: '/shopping-list/:id', name: "shopping-list-id", component: ShoppingListId},
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router
