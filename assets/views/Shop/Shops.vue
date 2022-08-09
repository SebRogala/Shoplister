<template>
    <v-row>
        <v-col>
            <v-text-field
                label="Nazwa sklepu"
                variant="outlined"
                density="comfortable"
                hide-details="auto"
                v-model="newShopName"
            ></v-text-field>
        </v-col>
    </v-row>
    <v-row>
        <v-col>
            <v-text-field
                label="Adres sklepu"
                variant="outlined"
                density="comfortable"
                hide-details="auto"
                v-model="newShopAddress"
            ></v-text-field>
        </v-col>
    </v-row>
    <v-row>
        <v-col class="d-flex justify-end">
            <v-btn
                variant="tonal"
                color="success"
                @click="createShop"
            >
                Dodaj
            </v-btn>
        </v-col>
    </v-row>
    <v-table fixed-header>
        <thead>
        <tr>
            <th class="text-left">
                Name
            </th>
            <th class="text-left">
                Address
            </th>
        </tr>
        </thead>
        <tbody>
        <tr
            v-for="item in shops"
            :key="item.name"
        >
            <td>{{ item.name }}</td>
            <td>{{ item.address }}</td>
        </tr>
        </tbody>
    </v-table>
</template>

<script>
export default {
    name: 'Shops',
    data() {
        return {
            newShopName: "",
            newShopAddress: "",
            shops: []
        }
    },
    mounted() {
        this.loadShops();
    },
    methods: {
        createShop() {
            this.$api.post('/shop', this.$api.formData({
                name: this.newShopName,
                address: this.newShopAddress
            })).then(() => {
                this.loadShops();
                this.newShopName = "";
                this.newShopAddress = "";
            });
        },
        loadShops() {
            this.$api.get('/shops').then(res => {
                this.shops = res.data;
            });
        }
    }
}
</script>
