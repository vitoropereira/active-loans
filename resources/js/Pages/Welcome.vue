<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>

    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Fazer login
                </Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> Cadastrar</Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-4xl">Posições em Aberto de Empréstimo de Ativos</h2>
            <div class="flex justify-center pt-8">
                <ApplicationLogo class="block h-80 w-auto fill-current text-gray-800" />
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

            </div>

            <div class="flex justify-center mt-4">
                <div class="text-center text-sm text-gray-500">
                    <div class="flex items-center justify-center w-full">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="text-sm text-gray-700 dark:text-gray-500">
                        <span class="px-4 py-2  text-base rounded-full text-gray-500 border border-gray-500
                                hover:border-0 hover:bg-gray-500 hover:text-white transition duration-500 ease-in-out">
                            Dashboard
                        </span>

                        </Link>

                        <template v-else>
                            <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500">
                            <span
                                class=" px-6 py-2 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                Fazer login
                            </span>

                            </Link>

                            <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm ">
                            <span
                                class=" px-6 py-2 transition ease-in duration-200 uppercase rounded-full bg-gray-800 text-white border-2 border-gray-800 hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                                Cadastrar
                            </span>
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
