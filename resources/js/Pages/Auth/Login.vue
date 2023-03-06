<template>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                <router-link
                    :to="{ name: 'auth.register' }"
                    class="font-medium text-indigo-600 hover:text-indigo-500"
                >register</router-link>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div v-if="state.errors.general" class="rounded-md bg-red-50 p-4 mb-2">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There was a problem with your login</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul role="list" class="list-disc space-y-1 pl-5">
                                    <li>{{ state.errors.general }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form
                    class="space-y-6"
                    @submit.prevent="login"
                >
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                        <div class="mt-1">
                            <input v-model="formData.email" id="email" name="email" type="email" autocomplete="email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="font-medium text-red-500 text-xs mt-1" v-if="state.errors.email">{{ state.errors.email[0] }}</div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="mt-1">
                            <input v-model="formData.password" id="password" name="password" type="password" autocomplete="current-password" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="font-medium text-red-500 text-xs mt-1" v-if="state.errors.password">{{ state.errors.password[0] }}</div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input v-model="formData.remember_me" id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            :disabled="state.loading"
                            @click.prevent="login"
                        >Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import axios from "axios";
import router from "../../Router";
import { useUserStore } from '../../store/user'

const state = reactive ({
    errors: [],
    loading: false
});
const userStore = useUserStore()
const formData = reactive({
    email: "",
    password: "",
    remember_me: ""
});

const login = async () => {
    state.errors = [];
    state.loading = true;
    axios
        .post("/api/login", {
            email: formData.email,
            password: formData.password
        })
        .then((response) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.token
            userStore.setUserDetails(response)

            router.push({ name: 'account.profile' })
        })
        .catch(error => {
            state.errors = error.response.data.errors
            state.loading = false;
        })
}
</script>
