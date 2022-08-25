<template>
    <v-row>
        <v-col>
            <v-btn @click="setShopDefaultSectionsOrder">
                Update
            </v-btn>
        </v-col>
    </v-row>
    <v-row class="shop-config__section-container">
        <v-col class="shop-config__section-col">
            <draggable
                class="list-group"
                :list="sortedSections"
                group="sections"
                itemKey="name"
                :delay="150"
                :delayOnTouchOnly="true"
            >
                <template #item="{ element }">
                    <div class="mb-2 bg-grey-lighten-3 pa-3">{{ element.name }}</div>
                </template>
            </draggable>
        </v-col>

        <v-col class="shop-config__section-col">
            <draggable
                class="list-group"
                :list="unsortedSections"
                group="sections"
                itemKey="name"
                :delay="150"
                :delayOnTouchOnly="true"
            >
                <template #item="{ element }">
                    <div class="mb-2 bg-grey-lighten-3 pa-3">{{ element.name }}</div>
                </template>
            </draggable>
        </v-col>
    </v-row>
</template>

<script>
import draggable from "vuedraggable";
import {toRaw} from "vue";

export default {
    name: 'ShopConfig',
    components: {draggable},
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
            this.$api.get(`/shop/${this.$route.params.id}/sections`).then(res => {
                this.sortedSections = res.data.orderedSections;
                this.unsortedSections = res.data.otherSections;
            });
        },
        setShopDefaultSectionsOrder() {
            this.$api.post(`/shop/${this.$route.params.id}/set-default-sections-order`, this.$api.formData({
                sectionsOrder: toRaw(this.sortedSections).map(item => item.id)
            })).then(() => {
            });
        },
    }
}
</script>

<style>
.shop-config__section-container {

}

.shop-config__section-col {
    overflow-y: scroll;
    max-height: 75vh;
}
</style>
