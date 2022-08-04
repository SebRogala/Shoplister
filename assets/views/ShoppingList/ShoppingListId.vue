<template>
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
