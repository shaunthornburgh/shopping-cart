<template>
    <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">
            <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                <div class="flex px-4 pt-5 pb-2">
                    <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links -->
                <div class="mt-2">
                    <div class="border-b border-gray-200">
                        <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                            <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                            <button @click="womensMenuIsOpen = !womensMenuIsOpen" id="tabs-1-tab-1" class="text-gray-900 border-transparent flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>

                            <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                            <button @click="mensMenuIsOpen = !mensMenuIsOpen" id="tabs-1-tab-2" class="text-gray-900 border-transparent flex-1 whitespace-nowrap border-b-2 py-4 px-1 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
                        </div>
                    </div>

                    <!-- 'Women' tab panel, show/hide based on tab state. -->
                    <div v-if="womensMenuIsOpen" id="tabs-1-panel-1" class="space-y-12 px-4 pt-10 pb-6" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <div class="grid grid-cols-1 items-start gap-y-10 gap-x-6">
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-featured-heading-0" class="font-medium text-gray-900">Featured</p>
                                    <ul role="list" aria-labelledby="mobile-featured-heading-0" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Sleep</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Swimwear</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Underwear</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="mobile-categories-heading" class="font-medium text-gray-900">Categories</p>
                                    <ul role="list" aria-labelledby="mobile-categories-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Basic Tees</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Artwork Tees</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Bottoms</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Underwear</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Accessories</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-collection-heading" class="font-medium text-gray-900">Collection</p>
                                    <ul role="list" aria-labelledby="mobile-collection-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Everything</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Core</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">New Arrivals</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Sale</a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Full Nelson</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">My Way</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Re-Arranged</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Counterfeit</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Significant Other</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 'Men' tab panel, show/hide based on tab state. -->
                    <div v-if="mensMenuIsOpen" id="tabs-1-panel-2" class="space-y-12 px-4 pt-10 pb-6" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                        <div class="grid grid-cols-1 items-start gap-y-10 gap-x-6">
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-featured-heading-1" class="font-medium text-gray-900">Featured</p>
                                    <ul role="list" aria-labelledby="mobile-featured-heading-1" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Casual</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Boxers</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Outdoor</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="mobile-categories-heading" class="font-medium text-gray-900">Categories</p>
                                    <ul role="list" aria-labelledby="mobile-categories-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Artwork Tees</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Pants</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Accessories</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Boxers</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Basic Tees</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                                <div>
                                    <p id="mobile-collection-heading" class="font-medium text-gray-900">Collection</p>
                                    <ul role="list" aria-labelledby="mobile-collection-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Everything</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Core</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">New Arrivals</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Sale</a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Significant Other</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">My Way</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Counterfeit</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Re-Arranged</a>
                                        </li>

                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Full Nelson</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
                    </div>

                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 py-6 px-4">
                    <!-- Currency selector -->
                    <form>
                        <div class="inline-block">
                            <label for="mobile-currency" class="sr-only">Currency</label>
                            <div class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
                                <select id="mobile-currency" name="currency" class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
                                    <option>CAD</option>

                                    <option>USD</option>

                                    <option>AUD</option>

                                    <option>EUR</option>

                                    <option>GBP</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <header class="relative z-10">
        <nav aria-label="Top">
            <!-- Secondary navigation -->
            <div class="bg-white">
                <div class="border-b border-gray-200">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex h-16 items-center justify-between">
                            <!-- Logo (lg+) -->
                            <div class="hidden lg:flex lg:items-center">
                                <router-link :to="{ name: 'home' }">
                                    <span class="sr-only">Your Company</span>
                                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                                </router-link>
                            </div>

                            <div class="hidden h-full lg:flex">
                                <!-- Mega menus -->
                                <div class="ml-8">
                                    <div class="flex h-full justify-center space-x-8">
                                        <div class="flex">
                                            <div class="relative flex">
                                                <router-link to="/category" @click="womensMenuIsOpen = !womensMenuIsOpen"  class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out">Women</router-link>
                                            </div>

                                            <div v-if="womensMenuIsOpen" class="absolute inset-x-0 top-full text-gray-500 sm:text-sm">
                                                <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                                                <div class="relative bg-white">
                                                    <div class="mx-auto max-w-7xl px-8">
                                                        <div class="grid grid-cols-2 items-start gap-y-10 gap-x-8 pt-10 pb-12">
                                                            <div class="grid grid-cols-2 gap-y-10 gap-x-8">
                                                                <div>
                                                                    <p id="desktop-featured-heading-0" class="font-medium text-gray-900">Featured</p>
                                                                    <ul role="list" aria-labelledby="desktop-featured-heading-0" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Sleep</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Swimwear</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Underwear</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div>
                                                                    <p id="desktop-categories-heading" class="font-medium text-gray-900">Categories</p>
                                                                    <ul role="list" aria-labelledby="desktop-categories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Basic Tees</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Artwork Tees</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Bottoms</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Underwear</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Accessories</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-2 gap-y-10 gap-x-8">
                                                                <div>
                                                                    <p id="desktop-collection-heading" class="font-medium text-gray-900">Collection</p>
                                                                    <ul role="list" aria-labelledby="desktop-collection-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Everything</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Core</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">New Arrivals</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Sale</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <p id="desktop-brand-heading" class="font-medium text-gray-900">Brands</p>
                                                                    <ul role="list" aria-labelledby="desktop-brand-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Full Nelson</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">My Way</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Re-Arranged</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Counterfeit</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Significant Other</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex">
                                            <div class="relative flex">
                                                <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                                                <button @click="mensMenuIsOpen = !mensMenuIsOpen" type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">Men</button>
                                            </div>

                                            <div v-if="mensMenuIsOpen" class="absolute inset-x-0 top-full text-gray-500 sm:text-sm">
                                                <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                                                <div class="relative bg-white">
                                                    <div class="mx-auto max-w-7xl px-8">
                                                        <div class="grid grid-cols-2 items-start gap-y-10 gap-x-8 pt-10 pb-12">
                                                            <div class="grid grid-cols-2 gap-y-10 gap-x-8">
                                                                <div>
                                                                    <p id="desktop-featured-heading-1" class="font-medium text-gray-900">Featured</p>
                                                                    <ul role="list" aria-labelledby="desktop-featured-heading-1" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Casual</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Boxers</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Outdoor</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div>
                                                                    <p id="desktop-categories-heading" class="font-medium text-gray-900">Categories</p>
                                                                    <ul role="list" aria-labelledby="desktop-categories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Artwork Tees</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Pants</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Accessories</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Boxers</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Basic Tees</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-2 gap-y-10 gap-x-8">
                                                                <div>
                                                                    <p id="desktop-collection-heading" class="font-medium text-gray-900">Collection</p>
                                                                    <ul role="list" aria-labelledby="desktop-collection-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Everything</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Core</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">New Arrivals</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Sale</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <p id="desktop-brand-heading" class="font-medium text-gray-900">Brands</p>
                                                                    <ul role="list" aria-labelledby="desktop-brand-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Significant Other</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">My Way</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Counterfeit</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Re-Arranged</a>
                                                                        </li>

                                                                        <li class="flex">
                                                                            <a href="#" class="hover:text-gray-800">Full Nelson</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Company</a>

                                        <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Stores</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile menu and search (lg-) -->
                            <div class="flex flex-1 items-center lg:hidden">
                                <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                                <button type="button" class="-ml-2 rounded-md bg-white p-2 text-gray-400">
                                    <span class="sr-only">Open menu</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>

                                <!-- Search -->
                                <a href="#" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Search</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </a>
                            </div>

                            <!-- Logo (lg-) -->
                            <a href="#" class="lg:hidden">
                                <span class="sr-only">Your Company</span>
                                <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" class="h-8 w-auto">
                            </a>

                            <div class="flex flex-1 items-center justify-end">
                                <div class="flex items-center lg:ml-8">
                                    <div class="flex space-x-8">
                                        <div class="hidden lg:flex">
                                            <a href="#" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Search</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="flex relative">
                                            <div
                                                id="profile-menu-button"
                                                @click="profileMenuIsOpen = !profileMenuIsOpen"
                                                class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                            >
                                                <span class="sr-only">Account</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg>
                                            </div>
                                            <div
                                                v-if="profileMenuIsOpen"
                                                class="absolute right-0 z-10 mt-10 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                                            >
                                                <router-link
                                                    v-if="userStore.user.id"
                                                    :to="{ name: 'account.orders' }"
                                                    class="block py-2 px-4 text-sm text-gray-700"
                                                    role="menuitem"
                                                    tabindex="-1"
                                                    id="user-menu-item-0"
                                                >Order history</router-link>
                                                <router-link
                                                    v-if="userStore.user.id"
                                                    :to="{ name: 'account.profile' }"
                                                    class="block py-2 px-4 text-sm text-gray-700"
                                                    role="menuitem"
                                                    tabindex="-1" id="user-menu-item-1"
                                                >Account settings</router-link>
                                                <a
                                                    v-if="userStore.user.id"
                                                    href="#"
                                                    @click="logout"
                                                    class="block py-2 px-4 text-sm text-gray-700"
                                                    role="menuitem"
                                                    tabindex="-1" id="user-menu-item-2"
                                                >Sign out</a>
                                                <router-link
                                                    v-if="!userStore.user.id"
                                                    :to="{ name: 'auth.login' }"
                                                    class="block py-2 px-4 text-sm text-gray-700"
                                                    role="menuitem"
                                                    tabindex="-1" id="user-menu-item-1"
                                                >Sign in</router-link>
                                                <router-link
                                                    v-if="!userStore.user.id"
                                                    :to="{ name: 'auth.register' }"
                                                    class="block py-2 px-4 text-sm text-gray-700"
                                                    role="menuitem"
                                                    tabindex="-1" id="user-menu-item-1"
                                                >Register</router-link>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="mx-4 h-6 w-px bg-gray-200 lg:mx-6" aria-hidden="true"></span>

                                    <div class="flow-root">
                                        <router-link :to="{ name: 'cart.show' }" class="group -m-2 flex items-center p-2">
                                            <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                            <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ quantity }}</span>
                                            <span class="sr-only">items in cart, view bag</span>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import {computed, ref} from 'vue'
import {useCartStore} from "../Store/cart";
import { useUserStore } from '../store/user'
import router from "../Router";
import axios from "axios";

const userStore = useUserStore()

const cartStore = useCartStore();

const quantity = computed(() => {
    let quantity = 0;
    if (cartStore.getCartQuantity > 0) {
        quantity = cartStore.getCartQuantity
    } else {
        quantity = 0;
    }
    return quantity;
});

const mensMenuIsOpen = ref(false)
const womensMenuIsOpen = ref(false)
const profileMenuIsOpen = ref(false)

const logout = async () => {
    axios
        .delete('/api/logout', {
            headers: {
                Authorization: `Bearer ${userStore.user.token}`,
                token: userStore.user.token
            }
        })
        .then(() => {
            userStore.clearUser()
            router.push({name: 'home'})
        })
        .catch(error => {
            console.log(error)
        })
}

</script>

<style scoped>
div[id='profile-menu-button']:hover {
    cursor: pointer;
}
</style>

