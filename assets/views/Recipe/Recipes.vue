<template>

</template>

<script>
export default {
    name: 'Recipes',
    data() {
        return {
        }
    },
    mounted() {
        this.loadRecipes();
    },
    methods: {
        createRecipe() {
            this.$api.post('/recipe', this.$api.formData({

            })).then(() => {
                this.loadRecipes();
            });
        },
        loadRecipes() {
            return;
            this.$api.get('/recipes').then(res => {
                this.shops = res.data;
            });
        }
    }
}
</script>
