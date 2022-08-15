<template>
    <v-row>
        <v-col>
            <draggable
                class="list-group"
                :list="sortedSections"
                group="sections"
                itemKey="name"
            >
                <template #item="{ element }">
                    <div class="mb-2 bg-grey-lighten-3 pa-3">{{ element.name }}</div>
                </template>
            </draggable>
        </v-col>

        <v-col>
            <draggable
                class="list-group"
                :list="unsortedSections"
                group="sections"
                itemKey="name"
            >
                <template #item="{ element }">
                    <div class="mb-2 bg-grey-lighten-3 pa-3">{{ element.name }}</div>
                </template>
            </draggable>
        </v-col>>
    </v-row>
</template>

<script>
import draggable from "vuedraggable";

export default {
    name: 'ShopConfig',
    components: {
        draggable
    },
    data() {
        return {
            sortedSections: [],
            unsortedSections: []
        }
    },
    mounted() {
        this.loadShoppingSections();
    },
    methods: {
        loadShoppingSections() {
            this.$api.get('/shop-sections').then(res => {
                this.unsortedSections = res.data;
            });
        },
    }
}
</script>
