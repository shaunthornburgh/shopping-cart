<template>
    <MainLayout>
        <router-view />
    </MainLayout>
</template>

<script setup>
import MainLayout from "./Layouts/MainLayout.vue";
import { onMounted } from 'vue';
import { useCartStore } from './Store/cart.js';
const store = useCartStore()

onMounted(() => {
    store.getProducts()
})
</script>

<style>

</style>
