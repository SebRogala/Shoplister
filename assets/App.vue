<script>
export default {
    name: 'App',
    data() {
        return {
        }
    }
}
</script>

<template>
    <v-app v-cloak>
        <v-app-bar short app >Symfony + Vuetify</v-app-bar>
        <v-main>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>
    </v-app>
</template>
