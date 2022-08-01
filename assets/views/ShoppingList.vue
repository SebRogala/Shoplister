<template>
    <v-btn @click="getList">pobierz</v-btn>
</template>

<script>
export default {
    name: 'ShoppingList',
    data() {
        return {
            shoppingList: []
        }
    },
    mounted() {
        // this.getList();
    },
    methods: {
        addList() {
            // this.$api.post('/shopping_list', this.$api.formData({name: this.listName})).then(res => {
            //     console.log(res);
            // });
        },
        getList() {
            this.$api.get('/shopping-list').then(res => {
                //TODO propagate this.shoppingList
                console.log(res.data)
            });
        }
    }
}
</script>
