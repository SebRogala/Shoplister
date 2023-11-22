<script>
export default {
    name: 'Home',
    data() {
        return {
            listName: "",
        }
    },
    methods: {
        addList() {
            // this.$api.post('/shopping_list', this.$api.formData({name: this.listName})).then(res => {
            //     console.log(res);
            // });
        },
        getList() {
            // this.axios.get()
        }
    }
}
</script>

<template>
    <div>
        <v-alert
            type="success"
        >Testing components

        </v-alert><v-alert
            type="success"
        >Testing GitHub Actions</v-alert>

        <v-text-field
            label="List name"
            variant="outlined"
            v-model="listName"
        ></v-text-field>

        <v-btn @click="addList">Dodaj</v-btn>
    </div>
</template>
