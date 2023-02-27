<template>
    <main>
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="py-24 text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>
                <p class="mx-auto mt-4 max-w-3xl text-base text-gray-500">Thoughtfully designed objects for the workspace, home, and travel.</p>
            </div>

            <!-- Filters -->
            <section aria-labelledby="filter-heading" class="border-t border-gray-200 pt-6">
                <h2 id="filter-heading" class="sr-only">Product filters</h2>

                <div class="flex items-center justify-between">
                    <div class="relative inline-block text-left">
                        <div>
                            <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Sort
                                <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="absolute left-0 z-10 mt-2 w-40 origin-top-left rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>

                                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</a>

                                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem" tabindex="-1" id="menu-item-2">Newest</a>

                                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</a>

                                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
                    <button type="button" class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden">Filters</button>

                    <div class="hidden sm:flex sm:items-baseline sm:space-x-8">
                        <div id="menu" class="relative inline-block text-left">
                            <div>
                                <button type="button" class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                                    <span>Category</span>

                                    <span class="ml-1.5 rounded bg-gray-200 py-0.5 px-1.5 text-xs font-semibold tabular-nums text-gray-700">1</span>
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!--
                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <form class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-category-0" name="category[]" value="tees" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-0" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Tees</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-1" name="category[]" value="crewnecks" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-1" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Crewnecks</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-2" name="category[]" value="hats" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-2" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Hats</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-3" name="category[]" value="bundles" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-3" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Bundles</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-4" name="category[]" value="carry" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-4" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Carry</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-category-5" name="category[]" value="objects" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-category-5" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Objects</label>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="menu" class="relative inline-block text-left">
                            <div>
                                <button type="button" class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                                    <span>Brand</span>
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!--
                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <form class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-brand-0" name="brand[]" value="clothing-company" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-brand-0" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Clothing Company</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-brand-1" name="brand[]" value="fashion-inc" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-brand-1" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Fashion Inc.</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-brand-2" name="brand[]" value="shoes-n-more" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-brand-2" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Shoes &#039;n More</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-brand-3" name="brand[]" value="supplies-n-stuff" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-brand-3" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Supplies &#039;n Stuff</label>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="menu" class="relative inline-block text-left">
                            <div>
                                <button type="button" class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                                    <span>Color</span>
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!--
                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <form class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-color-0" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">White</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-1" name="color[]" value="black" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-color-1" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Black</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-2" name="color[]" value="grey" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-color-2" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Grey</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-3" name="color[]" value="blue" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-color-3" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Blue</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-4" name="color[]" value="olive" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-color-4" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Olive</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-color-5" name="color[]" value="tan" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-color-5" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">Tan</label>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="menu" class="relative inline-block text-left">
                            <div>
                                <button type="button" class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                                    <span>Sizes</span>
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!--
                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <form class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="filter-sizes-0" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-sizes-0" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">XS</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-sizes-1" name="sizes[]" value="s" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-sizes-1" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">S</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-sizes-2" name="sizes[]" value="m" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-sizes-2" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">M</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-sizes-3" name="sizes[]" value="l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-sizes-3" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">L</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-sizes-4" name="sizes[]" value="xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-sizes-4" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">XL</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="filter-sizes-5" name="sizes[]" value="2xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="filter-sizes-5" class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">2XL</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Product grid -->
            <section aria-labelledby="products-heading" class="mt-8">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    <a href="#" class="group">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg sm:aspect-w-2 sm:aspect-h-3">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-image-card-01.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                            <h3>Focus Paper Refill</h3>
                            <p>$13</p>
                        </div>
                        <p class="mt-1 text-sm italic text-gray-500">3 sizes available</p>
                    </a>

                    <a href="#" class="group">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg sm:aspect-w-2 sm:aspect-h-3">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-image-card-02.jpg" alt="Paper card sitting upright in walnut card holder on desk." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                            <h3>Focus Card Holder</h3>
                            <p>$64</p>
                        </div>
                        <p class="mt-1 text-sm italic text-gray-500">Walnut</p>
                    </a>

                    <a href="#" class="group">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg sm:aspect-w-2 sm:aspect-h-3">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-image-card-03.jpg" alt="Textured gray felt pouch for paper cards with snap button flap and elastic pen holder loop." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                            <h3>Focus Carry Pouch</h3>
                            <p>$32</p>
                        </div>
                        <p class="mt-1 text-sm italic text-gray-500">Heather Gray</p>
                    </a>

                    <!-- More products... -->
                </div>
            </section>

            <section aria-labelledby="featured-heading" class="relative mt-16 overflow-hidden rounded-lg lg:h-96">
                <div class="absolute inset-0">
                    <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-featured-collection.jpg" alt="" class="h-full w-full object-cover object-center">
                </div>
                <div aria-hidden="true" class="relative h-96 w-full lg:hidden"></div>
                <div aria-hidden="true" class="relative h-32 w-full lg:hidden"></div>
                <div class="absolute inset-x-0 bottom-0 rounded-bl-lg rounded-br-lg bg-black bg-opacity-75 p-6 backdrop-blur backdrop-filter sm:flex sm:items-center sm:justify-between lg:inset-y-0 lg:inset-x-auto lg:w-96 lg:flex-col lg:items-start lg:rounded-tl-lg lg:rounded-br-none">
                    <div>
                        <h2 id="featured-heading" class="text-xl font-bold text-white">Workspace Collection</h2>
                        <p class="mt-1 text-sm text-gray-300">Upgrade your desk with objects that keep you organized and clear-minded.</p>
                    </div>
                    <a href="#" class="mt-6 flex flex-shrink-0 items-center justify-center rounded-md border border-white border-opacity-25 bg-white bg-opacity-0 py-3 px-4 text-base font-medium text-white hover:bg-opacity-10 sm:mt-0 sm:ml-8 lg:ml-0 lg:w-full">View the collection</a>
                </div>
            </section>

            <section aria-labelledby="more-products-heading" class="mt-16 pb-24">
                <h2 id="more-products-heading" class="sr-only">More products</h2>

                <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    <a href="#" class="group">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg sm:aspect-w-2 sm:aspect-h-3">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-image-card-07.jpg" alt="Close up of long kettle spout pouring boiling water into pour-over coffee mug with frothy coffee." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                            <h3>Electric Kettle</h3>
                            <p>$149</p>
                        </div>
                        <p class="mt-1 text-sm italic text-gray-500">Black</p>
                    </a>

                    <a href="#" class="group">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg sm:aspect-w-2 sm:aspect-h-3">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-image-card-08.jpg" alt="Extra large black leather workspace pad on desk with computer, wooden shelf, desk organizer, and computer peripherals." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                            <h3>Leather Workspace Pad</h3>
                            <p>$165</p>
                        </div>
                        <p class="mt-1 text-sm italic text-gray-500">Black</p>
                    </a>

                    <a href="#" class="group">
                        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg sm:aspect-w-2 sm:aspect-h-3">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-01-image-card-09.jpg" alt="Leather long wallet held open with hand-stitched card dividers, full-length bill pocket, and simple tab closure." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900">
                            <h3>Leather Long Wallet</h3>
                            <p>$118</p>
                        </div>
                        <p class="mt-1 text-sm italic text-gray-500">Natural</p>
                    </a>

                    <!-- More products... -->
                </div>
            </section>
        </div>
    </main>
</template>

<script setup>

</script>

<style scoped>

</style>
