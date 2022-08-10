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



    <v-table fixed-header class="mt-4">
        <thead>
        <tr>
            <th class="text-left">
                Nazwa
            </th>
            <th class="text-left">
                Ilość
            </th>
            <th class="text-left">
                Data modyfikacji
            </th>
            <th class="text-left">
                Data utworzenia
            </th>
            <th class="text-left">
                Akcje
            </th>
        </tr>
        </thead>
        <tbody>
        <tr
            v-for="item in shoppingList"
            :key="item.id"
        >
            <td>{{ item.name }}</td>
            <td>{{ item.counterOfItems }}</td>
            <td>{{ $datetime(item.updatedAt) }}</td>
            <td>{{ $datetime(item.createdAt) }}</td>
            <td>
                <v-btn
                    size="small"
                    variant="tonal"
                    icon="mdi-playlist-plus"
                    :to="{name: 'shopping-list-id', params: {id: item.id}}"
                >
                </v-btn>
            </td>
        </tr>
        </tbody>
    </v-table>
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
