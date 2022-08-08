<template>
    <v-expansion-panels v-model="panel">
        <v-expansion-panel
            v-for="item in value"
        >
            <v-expansion-panel-title v-slot="{ open }">
                <v-row no-gutters :class="item.isDone ? 'text-decoration-line-through' : ''">
                    <v-col class="d-flex align-center">
                        <v-btn
                            class="mr-3 text-decoration-none"
                            icon="mdi-check"
                            size="x-small"
                            :color="item.isDone ? 'success' : ''"
                            variant="tonal"
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
    name: 'StandardShoppingList',
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
            this.$api.post(`/shopping-list-item/${id}/toggle-is-done`).then(() => {
                this.$emit('itemChanged');
            });
        }
    }
}
</script>

<style>

</style>
