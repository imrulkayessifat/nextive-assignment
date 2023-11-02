<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios'; // Make sure to install axios via npm

// ... your existing code ...

// Create a reactive variable to store your products
const products = ref([]);
const categories = ref([]);
const selectedCategory = ref(null);

onMounted(async () => {
    try {
        // Make a GET request to your API endpoint
        const response = await axios.get('/api/products');
        // Assign the data to your reactive variable
        products.value = response.data;

        const responseCategories = await axios.get('/api/categories');
        console.log(responseCategories.data)
        // Assign the data to your reactive variable
        categories.value = responseCategories.data;
    } catch (error) {
        console.error(error);
    }
});

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Log in</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Register</Link>
            </template>
        </div>
        <div class="flex flex-col gap-5">
            <select v-model="selectedCategory" class="w-1/2 rounded-md m-4">
                <option value="">Please select a category</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div v-for="product in products.filter(product => !selectedCategory || product.category_id === selectedCategory)"
                    :key="product.id">
                    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-3">
                        <div class="md:flex">
                            <div class="p-8">
                                <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                                    Name : {{ product.name }}
                                </a>
                                <div class="flex justify-between gap-2">
                                    <p class="mt-2 text-gray-500">Price : {{ product.price }}</p>
                                    <p class="mt-2 uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                                        {{ categories.find(category => category.id === product.category_id).name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<style>

</style>
