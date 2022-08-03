<template>
    <v-row
        class="shopping-list__row"
        v-for="item in x"
        dense
    >
        <v-col>
            <v-sheet>
                {{ item.name }}
            </v-sheet>
        </v-col>

        <v-col cols="3">
            {{ item.quantity }} {{ item.unit }}
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: 'ShoppingListId',
    data() {
        return {
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
.shopping-list__row {
    border-bottom: black solid 1px;
}
</style>
