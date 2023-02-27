<template>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200">Register for free</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                <Link :href="route('login')" class="font-medium text-rose-600 hover:text-rose-500">login</Link>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white dark:bg-gray-900 py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="register" novalidate>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Name</label>
                        <div class="mt-1">
                            <input v-model="form.name" id="name" name="name" type="text" autocomplete="email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-rose-500 focus:outline-none focus:ring-rose-500 sm:text-sm">
                        </div>
                        <div class="input-error" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Email address</label>
                        <div class="mt-1">
                            <input v-model="form.email" id="email" name="email" type="email" autocomplete="email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-rose-500 focus:outline-none focus:ring-rose-500 sm:text-sm">
                        </div>
                        <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Password</label>
                        <div class="mt-1">
                            <input v-model="form.password" id="password" name="password" type="password" autocomplete="password" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-rose-500 focus:outline-none focus:ring-rose-500 sm:text-sm">
                        </div>
                        <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Confirm Password</label>
                        <div class="mt-1">
                            <input v-model="form.password_confirmation" id="password_confirmation" name="password_confirmation" type="password" autocomplete="password_confirmation" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-rose-500 focus:outline-none focus:ring-rose-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input v-model="form.remember_me" id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-rose-600 focus:ring-rose-500">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-200">Remember me</label>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-rose-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">Create account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { Link } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})
const register = () => form.post(route('user-account.store'))
</script>
