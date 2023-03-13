<template>
    <MainLayout>
        <router-view />
    </MainLayout>
</template>

<script setup>
import MainLayout from "./Layouts/MainLayout.vue";
import { onMounted } from 'vue';
import { useCartStore } from './Store/cart.js';
import {useShippingMethodStore} from "./Store/shippingMethod";

const cartStore = useCartStore()
const shippingMethodStore = useShippingMethodStore()

onMounted(() => {
    cartStore.getProducts()
    shippingMethodStore.getShippingMethods()
})
</script>

<style>

</style>
