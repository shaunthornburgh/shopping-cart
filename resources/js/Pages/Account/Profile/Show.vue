<template>
    <form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
        <!-- Profile section -->
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg font-medium leading-6 text-gray-900">Profile</h2>
                <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
            </div>

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">workcation.com/</span>
                            <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-grow rounded-none rounded-r-md border-gray-300 focus:border-sky-500 focus:ring-sky-500 sm:text-sm" value="deblewis">
                        </div>
                    </div>

                    <div>
                        <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                        <div class="mt-1">
                            <textarea id="about" name="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                    </div>
                </div>

                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                    <div class="mt-1 lg:hidden">
                        <div class="flex items-center">
                            <div class="inline-block h-12 w-12 flex-shrink-0 overflow-hidden rounded-full" aria-hidden="true">
                                <img class="h-full w-full rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                            </div>
                            <div class="ml-5 rounded-md shadow-sm">
                                <div class="group relative flex items-center justify-center rounded-md border border-gray-300 py-2 px-3 focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:bg-gray-50">
                                    <label for="mobile-user-photo" class="pointer-events-none relative text-sm font-medium leading-4 text-gray-700">
                                        <span>Change</span>
                                        <span class="sr-only"> user photo</span>
                                    </label>
                                    <input id="mobile-user-photo" name="user-photo" type="file" class="absolute h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative hidden overflow-hidden rounded-full lg:block">
                        <img class="relative h-40 w-40 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                        <label for="desktop-user-photo" class="absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-75 text-sm font-medium text-white opacity-0 focus-within:opacity-100 hover:opacity-100">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12">
                    <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                    <input type="text" name="url" id="url" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" name="company" id="company" autocomplete="organization" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                </div>
            </div>
        </div>

        <!-- Privacy section -->
        <div class="divide-y divide-gray-200 pt-6">
            <div class="px-4 sm:px-6">
                <div>
                    <h2 class="text-lg font-medium leading-6 text-gray-900">Privacy</h2>
                    <p class="mt-1 text-sm text-gray-500">Ornare eu a volutpat eget vulputate. Fringilla commodo amet.</p>
                </div>
                <ul role="list" class="mt-2 divide-y divide-gray-200">
                    <li class="flex items-center justify-between py-4">
                        <div class="flex flex-col">
                            <p class="text-sm font-medium text-gray-900" id="privacy-option-1-label">Available to hire</p>
                            <p class="text-sm text-gray-500" id="privacy-option-1-description">Nulla amet tempus sit accumsan. Aliquet turpis sed sit lacinia.</p>
                        </div>
                        <!-- Enabled: "bg-indigo-500", Not Enabled: "bg-gray-200" -->
                        <button type="button" class="bg-gray-200 relative ml-4 inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2" role="switch" aria-checked="true" aria-labelledby="privacy-option-1-label" aria-describedby="privacy-option-1-description">
                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                            <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </li>
                    <li class="flex items-center justify-between py-4">
                        <div class="flex flex-col">
                            <p class="text-sm font-medium text-gray-900" id="privacy-option-2-label">Make account private</p>
                            <p class="text-sm text-gray-500" id="privacy-option-2-description">Pharetra morbi dui mi mattis tellus sollicitudin cursus pharetra.</p>
                        </div>
                        <!-- Enabled: "bg-indigo-500", Not Enabled: "bg-gray-200" -->
                        <button type="button" class="bg-gray-200 relative ml-4 inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="privacy-option-2-label" aria-describedby="privacy-option-2-description">
                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                            <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </li>
                    <li class="flex items-center justify-between py-4">
                        <div class="flex flex-col">
                            <p class="text-sm font-medium text-gray-900" id="privacy-option-3-label">Allow commenting</p>
                            <p class="text-sm text-gray-500" id="privacy-option-3-description">Integer amet, nunc hendrerit adipiscing nam. Elementum ame</p>
                        </div>
                        <!-- Enabled: "bg-indigo-500", Not Enabled: "bg-gray-200" -->
                        <button type="button" class="bg-gray-200 relative ml-4 inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2" role="switch" aria-checked="true" aria-labelledby="privacy-option-3-label" aria-describedby="privacy-option-3-description">
                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                            <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </li>
                    <li class="flex items-center justify-between py-4">
                        <div class="flex flex-col">
                            <p class="text-sm font-medium text-gray-900" id="privacy-option-4-label">Allow mentions</p>
                            <p class="text-sm text-gray-500" id="privacy-option-4-description">Adipiscing est venenatis enim molestie commodo eu gravid</p>
                        </div>
                        <!-- Enabled: "bg-indigo-500", Not Enabled: "bg-gray-200" -->
                        <button type="button" class="bg-gray-200 relative ml-4 inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2" role="switch" aria-checked="true" aria-labelledby="privacy-option-4-label" aria-describedby="privacy-option-4-description">
                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                            <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="mt-4 flex justify-end py-4 px-4 sm:px-6">
                <button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Cancel</button>
                <button type="submit" class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-sky-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Save</button>
            </div>
        </div>
    </form>
</template>

<script setup>

</script>

<style scoped>

</style>
