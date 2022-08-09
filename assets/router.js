import {createRouter, createWebHashHistory} from "vue-router";

import Home from "./views/Home";
import About from "./views/About";
import ShoppingList from "./views/ShoppingList/ShoppingList";
import ShoppingListId from "./views/ShoppingList/ShoppingListId";
import Shops from "./views/Shop/Shops";


const routes = [
    {path: '/', name: "home", component: Home},
    {path: '/about', component: About},
    {path: '/shopping-list', name: "shopping-list", component: ShoppingList},
    {path: '/shopping-list/:id', name: "shopping-list-id", component: ShoppingListId},
    {path: '/shop', component: Shops},
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router
