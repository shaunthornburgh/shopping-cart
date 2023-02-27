<template>
    <div class="bg-gray-50">
        <Header />
        <slot>Default</slot>
        <Footer />
    </div>
</template>

<script setup>
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

</script>

<style scoped>

</style>
