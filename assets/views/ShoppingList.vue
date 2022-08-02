<template>
    <v-btn @click="loadShoppingList">pobierz</v-btn>

    <v-text-field
        label="List name"
        variant="outlined"
        v-model="newShoppingListName"
    ></v-text-field>

    <v-btn @click="createShoppingList">Dodaj</v-btn>

    <ShoppingLists
        :items="shoppingList"
    ></ShoppingLists>
</template>

<script>
import ShoppingLists from "../components/ShoppingList/ShoppingLists";

export default {
    name: 'ShoppingList',
    components: {
        ShoppingLists
    },
    data() {
        return {
            shoppingList: [],
            newShoppingListName: "",
        }
    },
    mounted() {
        // this.getList();
    },
    methods: {
        createShoppingList() {
            this.$api.post('/shopping_list', this.$api.formData({name: this.newShoppingListName})).then(res => {
                this.loadShoppingList();
                this.newShoppingListName = "";
            });
        },
        loadShoppingList() {
            this.$api.get('/shopping-list').then(res => {
                this.shoppingList = res.data;
            });
        }
    }
}
</script>
