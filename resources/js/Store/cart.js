import axios from "axios";
import { defineStore } from "pinia";
import { useStorage } from '@vueuse/core';

export const useCartStore = defineStore({
    id: 'cart',
    state: () => ({
        cart: useStorage('cart', { products: [], packages: [] }),
        order: {},
        customer: {},
        loading: true,
        error: null,
        products: [],
        packages: [],
    }),
    actions: {
        async getProducts() {
            try {
                this.loading = true;

                const resProduct = await axios.get("/api/product");
                this.products = resProduct.data.data;

                const resPackage = await axios.get("/api/package");
                this.packages = resPackage.data.data;

                this.loading = false;
            } catch (error) {
                this.error = error;
            }
        },

        addToCart(item, type = "products") {
            const itemIndex = this.cart[type].findIndex(
                (cartItem) => item.id === cartItem.id
            );

            if (itemIndex > -1) {
                this.cart[type][itemIndex].quantity += 1;
            } else {
                item.quantity = 1;
                this.cart[type].push(item);
            }
        },
        removeProductFromCart(item, type = "products") {
            this.cart[type].splice(this.cart[type].indexOf(item), 1);
        },
        clearCart() {
            this.cart = {products: [], packages: []};
        },
        clearCustomer() {
            this.customer = {};
        },
        clearOrder() {
            this.order = {};
        },
        updateCustomer(customer) {
            this.customer = customer;
        },
        updateCartItemQuantity(item, type = "products", quantity) {
            const itemIndex = this.cart[type].findIndex(
                (cartItem) => item.sku === cartItem.sku
            );

            if (itemIndex > -1) {
                this.cart[type][itemIndex].quantity = parseInt(quantity);
            }
        },
        updateOrder(order) {
            this.order = order;
        },
        getSingleProduct(slug) {
            return this.products.find((product) => product.slug === slug);
        },
    },
    getters: {
        getCartQuantity() {
            return this.cart.products.reduce(
                (total, item) => total + item.quantity,
                0
            ) + this.cart.packages.reduce(
                (total, item) => total + item.quantity,
                0
            );
        },
        getOrderDetails() {
            return this.order;
        },
        getCartContents() {
            return this.cart;
        },
        getCustomer() {
            return this.customer;
        },
        getCartTotal() {
            return (this.cart.products.reduce(
                (total, item) => total + item.price * item.quantity,
                0
            ) + this.cart.packages.reduce(
                (total, item) => total + item.price * item.quantity,
                0
            )).toFixed(2);
        },
        getCartNonSubscriptionItems() {
            return this.cart.products.filter(function (el) {
                return el.is_subscription === false
            });
        },
        getCartSubscriptionItems() {
            return this.cart.products.filter(function (el) {
                return el.is_subscription === true
            });
        },
        getVatTotal() {
            return +(this.cart.products.reduce(
                (total, item) => total + (item.price * item.vat.rate/100) * item.quantity,
                0
            ) + this.cart.packages.reduce(
                (total, item) => total + (item.price * item.vat.rate/100) * item.quantity,
                0
            )).toFixed(2);
        },
    },
    persist: true,
});
