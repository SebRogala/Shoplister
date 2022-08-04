<template>
    <v-row class="mb-3">
        <v-col class="d-flex align-center text-center justify-center">01.08.2022, 14:39:17</v-col>
        <v-col cols="5">
            <v-switch
                class="justify-end v-switch--label-below"
                v-model="addMode"
                label="Dodawanie"
                color="success"
                hide-details
            ></v-switch>
        </v-col>
    </v-row>

    <v-scroll-y-transition>
        <v-card
            class="mb-6"
            v-show="addMode"
            transition="slide-y-transition"
        >
            <v-card-item>
                <v-row>
                    <v-col>

                        <v-text-field
                            class="mt-3"
                            variant="outlined"
                            label="Nazwa pozycji"
                            density="comfortable"
                            hide-details="auto"
                            v-model="newItemName"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="4">
                        <v-text-field
                            variant="outlined"
                            label="Ilość"
                            density="comfortable"
                            hide-details="auto"
                            v-model="newItemQuantity"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-card-item>

            <v-card-actions class="justify-end">
                <v-btn
                    variant="tonal"
                    color="success"
                >
                    Dodaj
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-scroll-y-transition>

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
            addMode: true,
            newItemName: "",
            newItemQuantity: null,
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
