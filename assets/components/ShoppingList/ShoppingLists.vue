<template>
    <v-list>
        <v-list-item
            v-for="(item, i) in items"
            :key="i"
            :value="item"
        >
            <v-list-item-title><template v-if="item.name">{{ item.name }}, </template>({{ $datetime(item.createdAt) }})</v-list-item-title>
        </v-list-item>
    </v-list>
</template>

<script>
export default {
    name: 'ShoppingLists',
    props: {
        items: Array
    },
    data() {
        return {}
    },
    methods: {

    }
}
</script>
