<template>
    <v-row class="mb-3">
        <v-col class="d-flex align-center text-center justify-center">01.08.2022, 14:39:17</v-col>
    </v-row>


    <StandardShoppingList
        :value="shoppingListItems"
        @itemChanged="loadShoppingListItems"
    ></StandardShoppingList>
</template>

<script>
import StandardShoppingList from "./Components/StandardShoppingList";

export default {
    name: 'ViewShoppingList',
    components: {StandardShoppingList},
    data() {
        return {
            isHttpError: false,
            httpError: "",
            shoppingListItems: [],
        }
    },
    mounted() {
        this.loadShoppingListItems();
    },
    methods: {
        loadShoppingListItems() {
            this.$api.get(`/shopping-list/${this.$route.params.id}/view-items`).then(res => {
                this.shoppingListItems = res.data;
            });
        }
    }
}
</script>

<style>
.shopping-list__new__quantity button {
    text-transform: lowercase;
}
</style>
