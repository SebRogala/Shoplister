<template>
    <v-row>
        <v-col>
            <v-text-field
                label="Nazwa listy (opcjonalne)"
                variant="outlined"
                density="comfortable"
                hide-details="auto"
                v-model="newShoppingListName"
            ></v-text-field>
        </v-col>
    </v-row>
    <v-row>
        <v-col @click="loadShops">
            <v-autocomplete
                variant="outlined"
                label="Sklep (opcjonalne)"
                density="comfortable"
                hide-details="auto"
                item-title="name"
                item-value="id"
                v-model="newShoppingListShopId"
                :items="shops"
            ></v-autocomplete>
        </v-col>
    </v-row>
    <v-row>
        <v-col class="d-flex justify-end">
            <v-btn
                variant="tonal"
                color="success"
                @click="createShoppingList"
            >
                Utwórz
            </v-btn>
        </v-col>
    </v-row>


    <v-table fixed-header class="mt-4">
        <thead>
        <tr>
            <th class="text-left">
                Nazwa
            </th>
            <th class="text-left">
                Pozycje
            </th>
            <th class="text-left">
                Data modyfikacji
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
            <td>
                <v-btn
                    size="x-small"
                    variant="tonal"
                    icon="mdi-playlist-plus"
                    :to="{name: 'shopping-list-id', params: {id: item.id}}"
                >
                </v-btn>
                <v-btn
                    size="x-small"
                    variant="tonal"
                    icon="mdi-share"
                    :to="{name: 'shopping-list-view', params: {id: item.id}}"
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
            newShoppingListShopId: "",
            shops: [],
        }
    },
    mounted() {
        this.loadShoppingList();
    },
    methods: {
        createShoppingList() {
            this.$api.post('/shopping_list', this.$api.formData({
                name: this.newShoppingListName,
                shopId: this.newShoppingListShopId
            })).then(() => {
                this.loadShoppingList();
                this.newShoppingListName = "";
            });
        },
        loadShoppingList() {
            this.$api.get('/shopping-list').then(res => {
                this.shoppingList = res.data;
            });
        },
        loadShops() {
            this.$api.get('/shops').then(res => {
                this.shops = res.data.map(shop => {
                    return {
                        id: shop.id,
                        name: `${shop.name} (${shop.address})`
                    }
                });
            });
        }
    }
}
</script>
