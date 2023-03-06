import axios from 'axios'
import { defineStore } from 'pinia'
import { useStorage } from "@vueuse/core";

export const useUserStore = defineStore({
    id: 'user',
    state: () => ({
        user: useStorage('user', {
            id: null,
            token: null,
            name: null,
            email: null
        })
    }),
    actions: {
        setUserDetails(response) {
            this.user.id = response.data.user.id
            this.user.name = response.data.user.name
            this.user.email = response.data.user.email
            this.user.token = response.data.token
        },

        clearUser() {
            this.user.id = null
            this.user.token = null
            this.user.name = null
            this.user.email = null
        }
    },
    persist: true
});
