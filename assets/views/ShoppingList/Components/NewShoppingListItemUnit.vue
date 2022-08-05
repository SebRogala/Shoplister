<template>
    <v-item>
        <v-btn
            variant="tonal"
            class="mb-1"
            @click="$emit('pickNewItemUnit', value)"
            icon
        >{{ value }}</v-btn>
    </v-item>
</template>

<script>
export default {
    name: 'NewShoppingListItemUnit',
    emits: ["pickNewItemUnit"],
    props: {
        value: String
    },
    data() {
        return {
        }
    }
}
</script>
