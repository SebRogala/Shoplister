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
                @click="createShoppingList"
            >
                Dodaj
            </v-btn>
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: 'Shop',
    data() {
        return {
            newShopName: "",
            newShopAddress: "",
        }
    },
    methods: {
        createShoppingList() {
            this.$api.post('/shop', this.$api.formData({name: this.newShopName, address: this.newShopAddress})).then(() => {
                // this.loadShop();
                this.newShopName = "";
                this.newShopAddress = "";
            });
        },
    }
}
</script>
