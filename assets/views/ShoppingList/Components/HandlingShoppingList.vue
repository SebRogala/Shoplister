<template>
    <v-expansion-panels v-model="panel">
        <v-expansion-panel
            v-for="item in value"
        >
            <v-expansion-panel-title v-slot="{ open }">
                <v-row no-gutters>
                    <v-col class="d-flex align-center">
                        <v-btn
                            class="mr-3"
                            icon="mdi-close"
                            size="x-small"
                            variant="tonal"
                            color="error"
                            @click.stop="toggleIsDone(item.id)"
                        ></v-btn>
                        {{ item.name }}
                    </v-col>
                    <v-col
                        cols="3"
                        class="d-flex align-center text--secondary"
                    >
                        {{ item.quantity }} {{ item.unit }}
                    </v-col>
                </v-row>
            </v-expansion-panel-title>
            <v-expansion-panel-text>
            </v-expansion-panel-text>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
export default {
    name: 'HandlingShoppingList',
    props: {
        value: Object
    },
    emits: ['itemChanged'],
    data() {
        return {
            panel: []
        }
    },
    methods: {
        toggleIsDone(id) {
            this.$api.delete(`/shopping-list-item/${id}`).then(() => {
                this.$emit('itemChanged');
            });
        }
    }
}
</script>

<style>

</style>
