import axios from "axios";
import { defineStore } from "pinia";
import { useStorage } from '@vueuse/core';

export const useShippingMethodStore = defineStore({
    id: 'shippingMethod',
    state: () => ({
        shippingMethods: useStorage('shippingMethods', []),
        loading: false,
        shippingMethod: useStorage('shippingMethod', []),
    }),
    actions: {
        async getShippingMethods() {
            try {
                this.loading = true;

                const result = await axios.get("/api/shipping-method");
                this.shippingMethods = result.data.data;

                this.loading = false;
            } catch (error) {
                this.error = error;
            }
        },
        setShippingMethod(shippingMethod) {
            this.shippingMethod = shippingMethod;
        },
        clearShippingMethod() {
            this.shippingMethod = null;
        }
    },
    getters: {
        getShippingMethod() {
            if (Object.keys(this.shippingMethod).length === 0) {
                this.shippingMethod = this.shippingMethods.filter(function (el) {
                    return el.default === 1
                })[0];
            }

            return this.shippingMethod;
        },
        getVatTotal() {
            return (this.shippingMethod.price * this.shippingMethod.vat.rate/100).toFixed(2);
        },
    },
    persist: true,
});
