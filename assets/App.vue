<script>
export default {
    name: 'App',
    data() {
        return {
            leftMenuItems: [
                {
                    title: "Home",
                    value: '/'
                },
                {
                    title: "Shopping List",
                    value: '/shopping-list'
                },
                {
                    title: "About",
                    value: '/about'
                }
            ]
        }
    }
}
</script>

<template>
    <v-app v-cloak>
        <v-app-bar short app>
            <v-app-bar-nav-icon variant="text"></v-app-bar-nav-icon>
            <v-toolbar-title>Shoplister</v-toolbar-title>
        </v-app-bar>

        <v-navigation-drawer bottom>
            <v-list>
                <v-list-item
                    v-for="(item,i) in leftMenuItems"
                    :key="i"
                    active-color="primary"
                    :value="item"
                    :to="item.value"
                >
                    <v-list-item-title v-text="item.title"></v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-main>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>
    </v-app>
</template>
