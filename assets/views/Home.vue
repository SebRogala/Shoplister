<script>
export default {
    name: 'Home',
    data() {
        return {
        }
    }
}
</script>

<template>
    <div>
        <v-alert
            type="success"
        >Testing components</v-alert>

        <router-link to="/about">
            <v-btn>About</v-btn>
        </router-link>
    </div>
</template>
