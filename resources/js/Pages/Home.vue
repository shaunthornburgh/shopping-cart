<template>
    <main>
        <!-- Hero -->
        <div class="flex flex-col border-b border-gray-200 lg:border-0">
            <nav aria-label="Offers" class="order-last lg:order-first bg-white">
                <div class="mx-auto max-w-7xl lg:px-8">
                    <ul role="list" class="grid grid-cols-1 divide-y divide-gray-200 lg:grid-cols-3 lg:divide-y-0 lg:divide-x">
                        <li class="flex flex-col">
                            <a href="#" class="relative flex flex-1 flex-col justify-center bg-white py-6 px-4 text-center focus:z-10">
                                <p class="text-sm text-gray-500">Download the app</p>
                                <p class="font-semibold text-gray-900">Get an exclusive $5 off code</p>
                            </a>
                        </li>

                        <li class="flex flex-col">
                            <a href="#" class="relative flex flex-1 flex-col justify-center bg-white py-6 px-4 text-center focus:z-10">
                                <p class="text-sm text-gray-500">Return when you&#039;re ready</p>
                                <p class="font-semibold text-gray-900">60 days of free returns</p>
                            </a>
                        </li>

                        <li class="flex flex-col">
                            <a href="#" class="relative flex flex-1 flex-col justify-center bg-white py-6 px-4 text-center focus:z-10">
                                <p class="text-sm text-gray-500">Sign up for our newsletter</p>
                                <p class="font-semibold text-gray-900">15% off your first order</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="relative">
                <div aria-hidden="true" class="absolute hidden h-full w-1/2 bg-gray-100 lg:block"></div>
                <div class="relative bg-gray-100 lg:bg-transparent">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:grid lg:grid-cols-2 lg:px-8">
                        <div class="mx-auto max-w-2xl py-24 lg:max-w-none lg:py-64">
                            <div class="lg:pr-16">
                                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl xl:text-6xl">Focus on what matters</h1>
                                <p class="mt-4 text-xl text-gray-600">All the charts, datepickers, and notifications in the world can't beat checking off some items on a paper card.</p>
                                <div class="mt-6">
                                    <a href="#" class="inline-block rounded-md border border-transparent bg-indigo-600 py-3 px-8 font-medium text-white hover:bg-indigo-700">Shop Productivity</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-48 w-full sm:h-64 lg:absolute lg:top-0 lg:right-0 lg:h-full lg:w-1/2">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-hero-half-width.jpg" alt="" class="h-full w-full object-cover object-center">
                </div>
            </div>
        </div>

        <!-- Trending products -->
        <section aria-labelledby="trending-heading" class="bg-white" v-if="products.length">
            <div class="py-16 sm:py-24 lg:mx-auto lg:max-w-7xl lg:py-32 lg:px-8">
                <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                    <h2 id="trending-heading" class="text-2xl font-bold tracking-tight text-gray-900">Trending products</h2>
                    <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                        See everything
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="relative mt-8">
                    <div class="relative w-full overflow-x-auto">
                        <ul role="list" class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0">

                            <li v-for="product in products.slice(0, 4)"
                                :key="product.id"
                                class="inline-flex w-64 flex-col text-center lg:w-auto"
                            >
                                <router-link
                                    :to="{name: 'product.show', params: {slug: product.slug}}"
                                >
                                    <div class="group relative">
                                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-product-01.jpg" alt="Black machined steel pen with hexagonal grip and small white logo at top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <div class="mt-6">
                                            <p class="text-sm text-gray-500">Black</p>
                                            <h3 class="mt-1 font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{product.name}}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-gray-900">${{product.skus[0].price}}</p>
                                        </div>
                                    </div>
                                </router-link>

                                <h4 class="sr-only">Available colors</h4>
                                <ul role="list" class="mt-auto flex items-center justify-center space-x-3 pt-6">

                                    <li class="h-4 w-4 rounded-full border border-black border-opacity-10" style="background-color:#111827">
                                        <span class="sr-only"> Black </span>
                                    </li>

                                    <li class="h-4 w-4 rounded-full border border-black border-opacity-10" style="background-color:#FDE68A">
                                        <span class="sr-only"> Brass </span>
                                    </li>

                                    <li class="h-4 w-4 rounded-full border border-black border-opacity-10" style="background-color:#E5E7EB">
                                        <span class="sr-only"> Chrome </span>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 px-4 sm:hidden">
                    <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        See everything
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Trending packages -->
        <section aria-labelledby="trending-heading" class="bg-white" v-if="packages.length">
            <div class="py-16 sm:py-24 lg:mx-auto lg:max-w-7xl lg:py-32 lg:px-8">
                <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                    <h2 id="trending-heading" class="text-2xl font-bold tracking-tight text-gray-900">Trending packages</h2>
                    <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
                        See everything
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="relative mt-8">
                    <div class="relative w-full overflow-x-auto">
                        <ul role="list" class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0">

                            <li v-for="packageItem in packages.slice(0, 4)"
                                :key="packageItem.id"
                                class="inline-flex w-64 flex-col text-center lg:w-auto"
                            >
                                <router-link
                                    :to="{name: 'package.show', params: {slug: packageItem.slug}}"
                                >
                                    <div class="group relative">
                                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200">
                                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-product-01.jpg" alt="Black machined steel pen with hexagonal grip and small white logo at top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <div class="mt-6">
                                            <p class="text-sm text-gray-500">Black</p>
                                            <h3 class="mt-1 font-semibold text-gray-900">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{packageItem.name}}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-gray-900">${{ packageItem.price }}</p>
                                        </div>
                                    </div>
                                </router-link>


                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 px-4 sm:hidden">
                    <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                        See everything
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Collections -->
        <section aria-labelledby="collections-heading" class="bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                    <h2 id="collections-heading" class="text-2xl font-bold text-gray-900">Collections</h2>

                    <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                        <div class="group relative">
                            <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="h-full w-full object-cover object-center">
                            </div>
                            <h3 class="mt-6 text-sm text-gray-500">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Desk and Office
                                </a>
                            </h3>
                            <p class="text-base font-semibold text-gray-900">Work from home accessories</p>
                        </div>

                        <div class="group relative">
                            <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg" alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant." class="h-full w-full object-cover object-center">
                            </div>
                            <h3 class="mt-6 text-sm text-gray-500">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Self-Improvement
                                </a>
                            </h3>
                            <p class="text-base font-semibold text-gray-900">Journals and note-taking</p>
                        </div>

                        <div class="group relative">
                            <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-03.jpg" alt="Collection of four insulated travel bottles on wooden shelf." class="h-full w-full object-cover object-center">
                            </div>
                            <h3 class="mt-6 text-sm text-gray-500">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Travel
                                </a>
                            </h3>
                            <p class="text-base font-semibold text-gray-900">Daily commute essentials</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sale and testimonials -->
        <div class="relative overflow-hidden">
            <!-- Decorative background image and gradient -->
            <div aria-hidden="true" class="absolute inset-0">
                <div class="absolute inset-0 mx-auto max-w-7xl overflow-hidden xl:px-8">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-sale-full-width.jpg" alt="" class="h-full w-full object-cover object-center">
                </div>
                <div class="absolute inset-0 bg-white bg-opacity-75"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-white via-white"></div>
            </div>

            <!-- Sale -->
            <section aria-labelledby="sale-heading" class="relative mx-auto flex max-w-7xl flex-col items-center px-4 pt-32 text-center sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <h2 id="sale-heading" class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">Get 25% off during our one-time sale</h2>
                    <p class="mx-auto mt-4 max-w-xl text-xl text-gray-600">Most of our products are limited releases that won't come back. Get your favorite items while they're in stock.</p>
                    <a href="#" class="mt-6 inline-block w-full rounded-md border border-transparent bg-gray-900 py-3 px-8 font-medium text-white hover:bg-gray-800 sm:w-auto">Get access to our one-time sale</a>
                </div>
            </section>

            <!-- Testimonials -->
            <section aria-labelledby="testimonial-heading" class="relative mx-auto max-w-7xl py-24 px-4 sm:px-6 lg:py-32 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <h2 id="testimonial-heading" class="text-2xl font-bold tracking-tight text-gray-900">What are people saying?</h2>

                    <div class="mt-16 space-y-16 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                        <blockquote class="sm:flex lg:block">
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true" class="flex-shrink-0 text-gray-300">
                                <path d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z" fill="currentColor" />
                            </svg>
                            <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                                <p class="text-lg text-gray-600">My order arrived super quickly. The product is even better than I hoped it would be. Very happy customer over here!</p>
                                <cite class="mt-4 block font-semibold not-italic text-gray-900">Sarah Peters, New Orleans</cite>
                            </div>
                        </blockquote>

                        <blockquote class="sm:flex lg:block">
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true" class="flex-shrink-0 text-gray-300">
                                <path d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z" fill="currentColor" />
                            </svg>
                            <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                                <p class="text-lg text-gray-600">I had to return a purchase that didn’t fit. The whole process was so simple that I ended up ordering two new items!</p>
                                <cite class="mt-4 block font-semibold not-italic text-gray-900">Kelly McPherson, Chicago</cite>
                            </div>
                        </blockquote>

                        <blockquote class="sm:flex lg:block">
                            <svg width="24" height="18" viewBox="0 0 24 18" aria-hidden="true" class="flex-shrink-0 text-gray-300">
                                <path d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z" fill="currentColor" />
                            </svg>
                            <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                                <p class="text-lg text-gray-600">Now that I’m on holiday for the summer, I’ll probably order a few more shirts. It’s just so convenient, and I know the quality will always be there.</p>
                                <cite class="mt-4 block font-semibold not-italic text-gray-900">Chris Paul, Phoenix</cite>
                            </div>
                        </blockquote>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>

<script setup>
import {useCartStore} from "../Store/cart";
import { computed } from "vue";
const store = useCartStore();

const products = computed(() => {
    return store.products;
});
const packages = computed(() => {
    return store.packages;
});
</script>

<style scoped>

</style>
