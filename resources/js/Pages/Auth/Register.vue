<template>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register for free</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                <router-link :to="{ name: 'auth.login' }" class="font-medium text-indigo-600 hover:text-indigo-500">login</router-link>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="register" novalidate>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <div class="mt-1">
                            <input v-model="formData.name" id="name" name="name" type="text" autocomplete="email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="font-medium text-red-500 text-xs mt-1" v-if="state.errors.name">{{ state.errors.name[0] }}</div>
                    </div>

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
                            <input v-model="formData.password" id="password" name="password" type="password" autocomplete="password" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="font-medium text-red-500 text-xs mt-1"  v-if="state.errors.password">{{ state.errors.password[0] }}</div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <div class="mt-1">
                            <input v-model="formData.password_confirmation" id="password_confirmation" name="password_confirmation" type="password" autocomplete="password_confirmation" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="font-medium text-red-500 text-xs mt-1" v-if="state.errors.password_confirmation">{{ state.errors.password_confirmation[0] }}</div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input v-model="formData.remember_me" id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900 ">Remember me</label>
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            :disabled="state.loading"
                            @click.prevent="register"
                        >Create account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import {reactive} from "vue";
import axios from "axios";
import router from "../../Router";
import {useUserStore} from "../../Store/user";

const state = reactive ({
    errors: []
})
const userStore = useUserStore()
const formData = reactive({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
})

const register = async () => {
    axios
        .post("/api/register", {
            name: formData.email,
            email: formData.email,
            password: formData.password,
            password_confirmation: formData.password_confirmation,
        })
        .then((response) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.token
            userStore.setUserDetails(response)

            router.push({ name: 'account.profile' })
        })
        .catch(error => {
            console.log(error);
            state.errors = error.response.data.errors
            state.loading = false;
        })
}
</script>
