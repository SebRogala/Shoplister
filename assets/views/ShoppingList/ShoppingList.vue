<template>
    <v-text-field
        label="Nazwa listy"
        variant="outlined"
        density="comfortable"
        hide-details="auto"
        v-model="newShoppingListName"
    ></v-text-field>

    <v-btn @click="createShoppingList">Dodaj</v-btn>

    <v-list>
        <v-list-item
            v-for="(item, i) in shoppingList"
            :key="i"
            :value="item"
        >
            <v-list-item-title><template v-if="item.name">{{ item.name }}, </template>({{ $datetime(item.createdAt) }})</v-list-item-title>
        </v-list-item>
    </v-list>
</template>

<script>
export default {
    name: 'ShoppingList',
    data() {
        return {
            shoppingList: [],
            newShoppingListName: "",
        }
    },
    mounted() {
        this.loadShoppingList();
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
