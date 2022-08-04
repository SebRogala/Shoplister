<template>
    <v-row class="align-center">
        <v-btn
            class="ma-2"
            color="#81C784"
            @click="createShoppingList"
            icon="mdi-plus"
        ></v-btn>
        <v-text-field
            class="mr-2"
            label="Nazwa listy (opcjonalne)"
            variant="outlined"
            density="comfortable"
            hide-details="auto"
            v-model="newShoppingListName"
        ></v-text-field>
    </v-row>

    <v-list class="mt-4">
        <v-list-item
            v-for="(item, i) in shoppingList"
            :key="i"
            :value="item"
            :to="{name: 'shopping-list-id', params: {id: item.id}}"
        >
            <v-list-item-title>
                <template v-if="item.name">{{ item.name }} -</template>
                {{ $datetime(item.createdAt) }}
            </v-list-item-title>
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
