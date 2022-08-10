import {createRouter, createWebHashHistory} from "vue-router";

import Home from "./views/Home";
import About from "./views/About";
import ShoppingList from "./views/ShoppingList/ShoppingList";
import HandleShoppingListItems from "./views/ShoppingList/HandleShoppingListItems";
import Shops from "./views/Shop/Shops";
import ShopConfig from "./views/Shop/ShopConfig";

const routes = [
    {path: '/', name: "home", component: Home},
    {path: '/about', component: About},
    {path: '/shopping-list', name: "shopping-list", component: ShoppingList},
    {path: '/shopping-list/:id/handle', name: "shopping-list-id", component: HandleShoppingListItems},
    {path: '/shop',  name: "shops",component: Shops},
    {path: '/shop/:id/config', name: "shop-config", component: ShopConfig},
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router
