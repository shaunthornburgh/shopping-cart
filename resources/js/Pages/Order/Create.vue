<template>
    <main class="mx-auto max-w-7xl px-4 pt-16 pb-24 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <h1 class="sr-only">Checkout</h1>
            <form
                @submit.prevent
                class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16"
            >
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                        <div class="mt-4">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <div class="mt-1">
                                <input
                                    type="email"
                                    id="email-address"
                                    name="email-address"
                                    autocomplete="email"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    v-model="formData.email"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        id="first-name"
                                        name="first-name"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.firstName"
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        id="last-name"
                                        name="last-name"
                                        autocomplete="family-name"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.lastName"
                                    >
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="company"
                                        id="company"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.company"
                                    >
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="address"
                                        id="address"
                                        autocomplete="street-address"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.address"
                                    >
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="apartment" class="block text-sm font-medium text-gray-700">Apartment, suite, etc.</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="apartment"
                                        id="apartment"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.apartment"
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="city"
                                        id="city"
                                        autocomplete="address-level2"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.city"
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <div class="mt-1">
                                    <select
                                        id="country"
                                        name="country"
                                        autocomplete="country-name"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.country"
                                    >
                                        <option>United Kingdom</option>
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="region"
                                        id="region"
                                        autocomplete="address-level1"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.state"
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal code</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="postal-code"
                                        id="postal-code"
                                        autocomplete="postal-code"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.zipcode"
                                    >
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        autocomplete="tel"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        v-model="formData.phone"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery -->
                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900">Delivery method</legend>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">

                                <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none border-gray-300 undefined" @click="deliveryMethod = 'Standard'">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                          <span id="delivery-method-0-label" class="block text-sm font-medium text-gray-900">Standard</span>
                                          <span id="delivery-method-0-description-0" class="mt-1 flex items-center text-sm text-gray-500">4–10 business days</span>
                                          <span id="delivery-method-0-description-1" class="mt-6 text-sm font-medium text-gray-900">$5.00</span>
                                        </span>
                                      </span>
                                    <svg class="h-5 w-5 text-indigo-600" :class="{ 'hidden': !(deliveryMethod === 'Standard'), 'undefined': (deliveryMethod === 'Standard') }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true" :class="{ 'border border-indigo-500': (deliveryMethod === 'Standard'), 'border-2 border-transparent': !(deliveryMethod === 'Standard') }"></span>
                                </label>

                                <label  class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none border-gray-300 undefined" @click="deliveryMethod = 'Express'">
                                    <span class="flex flex-1">
                                        <span class="flex flex-col">
                                          <span id="delivery-method-1-label" class="block text-sm font-medium text-gray-900">Express</span>
                                          <span id="delivery-method-1-description-0" class="mt-1 flex items-center text-sm text-gray-500">2–5 business days</span>
                                          <span id="delivery-method-1-description-1" class="mt-6 text-sm font-medium text-gray-900">$16.00</span>
                                        </span>
                                      </span>
                                       <svg class="h-5 w-5 text-indigo-600" :class="{ 'hidden': (deliveryMethod === 'Standard'), 'undefined': !(deliveryMethod === 'Standard') }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true" :class="{ 'border border-indigo-500': !(deliveryMethod === 'Standard'), 'border-2 border-transparent': (deliveryMethod === 'Standard') }"></span>
                                </label>

                            </div>
                        </fieldset>
                    </div>

                    <!-- Payment -->
                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                        <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                            <div class="col-span-4">
                                <label for="card-element" class="block text-sm font-medium text-gray-700">Card details</label>

                                <div id="card-element">
                                    Stripe
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                    <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul role="list" class="divide-y divide-gray-200">

                            <li
                                v-for="cartItem in cart.products"
                                :key="cartItem.id"
                                class="flex py-6 px-4 sm:px-6"
                            >
                                <div class="flex-shrink-0">
                                    <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-02-product-01.jpg" alt="Front of men's Basic Tee in black." class="w-20 rounded-md">
                                </div>

                                <div class="ml-6 flex flex-1 flex-col">
                                    <div class="flex">
                                        <div class="min-w-0 flex-1">
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ cartItem.name }}</a>
                                            </h4>
                                            <p class="mt-1 text-sm text-gray-500">Black</p>
                                            <p class="mt-1 text-sm text-gray-500">Large</p>
                                        </div>

                                        <div class="ml-4 flow-root flex-shrink-0">
                                            <button
                                                @click="store.removeProductFromCart(cartItem, 'products')"
                                                type="button" class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-gray-500"
                                            >
                                                <span class="sr-only">Remove</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-1 items-end justify-between pt-2">
                                        <p class="mt-1 text-sm font-medium text-gray-900">${{ cartItem.price }}</p>

                                        <div class="ml-4">
                                            <label for="quantity" class="sr-only">Quantity</label>
                                            <select
                                                @change="updateCartItemQuantity(cartItem, 'products', $event)"
                                                id="quantity"
                                                name="quantity"
                                                class="rounded-md border border-gray-300 text-left text-base font-medium text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                                            >
                                                <option
                                                    v-for="option in cartItemOptions"
                                                    :selected="option === cartItem.quantity"
                                                >{{ option }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li
                                v-for="cartItem in cart.packages"
                                :key="cartItem.id"
                                class="flex py-6 px-4 sm:px-6"
                            >
                                <div class="flex-shrink-0">
                                    <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-02-product-01.jpg" alt="Front of men's Basic Tee in black." class="w-20 rounded-md">
                                </div>

                                <div class="ml-6 flex flex-1 flex-col">
                                    <div class="flex">
                                        <div class="min-w-0 flex-1">
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ cartItem.name }}</a>
                                            </h4>
                                            <p class="mt-1 text-sm text-gray-500">Black</p>
                                            <p class="mt-1 text-sm text-gray-500">Large</p>
                                        </div>

                                        <div class="ml-4 flow-root flex-shrink-0">
                                            <button
                                                @click="store.removeProductFromCart(cartItem, 'packages')"
                                                type="button" class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-gray-500"
                                            >
                                                <span class="sr-only">Remove</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-1 items-end justify-between pt-2">
                                        <p class="mt-1 text-sm font-medium text-gray-900">${{ cartItem.price }}</p>

                                        <div class="ml-4">
                                            <label for="quantity" class="sr-only">Quantity</label>
                                            <select
                                                @change="updateCartItemQuantity(cartItem, 'packages', $event)"
                                                id="quantity"
                                                name="quantity"
                                                class="rounded-md border border-gray-300 text-left text-base font-medium text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                                            >
                                                <option
                                                    v-for="option in cartItemOptions"
                                                    :selected="option === cartItem.quantity"
                                                >{{ option }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <dl class="space-y-6 border-t border-gray-200 py-6 px-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Subtotal</dt>
                                <dd class="text-sm font-medium text-gray-900">${{ subTotal }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Shipping</dt>
                                <dd class="text-sm font-medium text-gray-900">${{ shipping_estimate }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Taxes</dt>
                                <dd class="text-sm font-medium text-gray-900">${{ vatTotal }}</dd>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                <dt class="text-base font-medium">Total</dt>
                                <dd class="text-base font-medium text-gray-900">${{ orderTotal }}</dd>
                            </div>
                        </dl>

                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <button
                                type="submit"
                                class="w-full rounded-md border border-transparent bg-indigo-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                                @click="processPayment"
                                :disabled="localState.paymentProcessing"
                                v-text="localState.paymentProcessing ? 'Processing' : 'Pay Now'"
                            ></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>

<script setup>
import { loadStripe } from '@stripe/stripe-js';
import {reactive, onMounted, computed, ref} from "vue";
import { useCartStore } from "../../Store/cart";
import axios from "axios";
import router from "../../Router/index";

const store = useCartStore();
const deliveryMethod = ref("Standard");
const deliveryMethods = {
    Standard: 5.00,
    Express: 16.00,
}


const cart = computed(() => {
    return store.getCartContents;
});

const subTotal = computed(() => {
    return store.getCartTotal;

});
const vatTotal = computed(() => {
    return store.getVatTotal;

});

const shipping_estimate = computed(() => {
    return  (deliveryMethods[deliveryMethod.value]).toFixed(2);
});

const orderTotal = computed(() => {
    return (Number(subTotal.value) + Number(vatTotal.value) + Number(shipping_estimate.value)).toFixed(2);
});


const cartItemOptions = [1, 2, 3, 4, 5, 6, 7, 8];

function updateCartItemQuantity(cartItem, type, event) {
    store.updateCartItemQuantity(cartItem, type, event.target.value);
}

const localState = reactive({
    removingCartItem: false,
    paymentProcessing: false,
    stripe: {},
    cardElement: {},
    customer: {},
    orderError: null,
});

const formData = reactive({
    firstName: "",
    lastName: "",
    apartment: "",
    address: "",
    zipcode: "",
    city: "",
    state: "",
    email: "",
    phone: ""
});

onMounted(async () => {

    localState.stripe = await loadStripe(import.meta.env.VITE_STRIPE_KEY);
    const stripeElements = localState.stripe.elements();
    localState.cardElement = stripeElements.create("card", {
        classes: {
            base:
                "bg-white rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 p-3 leading-8 transition-colors duration-200 ease-in-out",
        },
    });
    localState.cardElement.mount("#card-element");
});

const processPayment = async () => {

    store.updateCustomer(formData);
    localState.paymentProcessing = true;

    const {
        firstName,
        lastName,
        address,
        zipcode,
        city,
        state,
        email,
    } = store.getCustomer;

    const { paymentMethod, error } = await localState.stripe.createPaymentMethod(
        "card",
        localState.cardElement,
        {
            billing_details: {
                name: `${firstName} ${lastName}`,
                email: email,
                address: {
                    line1: address,
                    city: city,
                    state: state,
                    postal_code: zipcode,
                },
            },
        }
    );

    if (error || !paymentMethod.id) {
        localState.paymentProcessing = false;
        localState.orderError = error;
        console.log(error)
        alert(error.message);
        return;
    }

    const finalCustomerDetails = {
        ...store.getCustomer,
        cart: JSON.stringify(store.getCartContents),
        payment_method_id: paymentMethod.id,
        paymentMethod: JSON.stringify(paymentMethod),
        delivery_method: deliveryMethod.value,
        total_amount: orderTotal.value
    };

    axios
        .post("/api/order", finalCustomerDetails)
        .then((response) => {
            if (response.status === 201) {
                localState.paymentProcessing = false;
                store.clearCart();
                store.clearCustomer();
                store.updateOrder(paymentMethod.id);
                router.push({ name: 'order.show', params: {id: response.data.data.id }});
            }
        })
        .catch((error) => {
            localState.paymentProcessing = false;
            localState.orderError = error;
            alert(error);
        });
};
</script>

<style scoped>

</style>
