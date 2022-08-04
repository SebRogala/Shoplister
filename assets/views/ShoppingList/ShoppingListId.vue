<template>

    <v-row class="mb-3">
        <v-col class="d-flex align-center text-center justify-center">01.08.2022, 14:39:17</v-col>
        <v-col cols="5">
            <v-switch
                class="justify-end v-switch--label-below"
                v-model="addMode"
                label="Dodawanie"
                color="success"
                value="success"
                hide-details
            ></v-switch>
        </v-col>
    </v-row>

    <StandardShoppingList
        :value="x"
    ></StandardShoppingList>


</template>

<script>
import StandardShoppingList from "./Components/StandardShoppingList";

export default {
    name: 'ShoppingListId',
    components: {StandardShoppingList},
    data() {
        return {
            addMode: false,
            x: [
                {
                    name: 'Cukier',
                    quantity: 5,
                    unit: "kg"
                },
                {
                    name: 'Szynka drobiowa',
                    quantity: 100,
                    unit: "g"
                },
                {
                    name: 'Jakaś bardzo długa nazwa jakiegoś produktu',
                    quantity: 67676,
                    unit: "szt"
                },
                {
                    name: 'Mleko',
                    quantity: 2,
                    unit: "szt"
                },

            ]
        }
    }
}
</script>

<style>

</style>
