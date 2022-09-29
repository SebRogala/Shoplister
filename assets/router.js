import {createRouter, createWebHashHistory} from "vue-router";

import Home from "./views/Home";
import About from "./views/About";
import ShoppingList from "./views/ShoppingList/ShoppingList";
import HandleShoppingListItems from "./views/ShoppingList/HandleShoppingListItems";
import Shops from "./views/Shop/Shops";
import ShopConfig from "./views/Shop/ShopConfig";
import ViewShoppingList from "./views/ShoppingList/ViewShoppingList";
import Recipes from "./views/Recipe/Recipes";

const routes = [
    {path: '/', name: "home", component: Home},
    {path: '/about', component: About},
    {path: '/shopping-list', name: "shopping-list", component: ShoppingList},
    {path: '/shopping-list/:id/handle', name: "shopping-list-id", component: HandleShoppingListItems},
    {path: '/shopping-list/:id/view', name: "shopping-list-view", component: ViewShoppingList},
    {path: '/shop', name: "shops", component: Shops},
    {path: '/shop/:id/config', name: "shop-config", component: ShopConfig},
    {path: '/recipe', name: "recipes", component: Recipes},
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router
