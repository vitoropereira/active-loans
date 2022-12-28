<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    lindingOpenPossitionData: [],
});

const form = useForm({
    date: new Date(),
});

const formGraphics = useForm({
    active: String,
});

</script>

<template>

    <Head title="B3 Dados" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">B3 Dados</h2>
        </template>

        <div class="py-12 h-96">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        class="flex flex-col justify-center items-center min-[760px]:flex-row min-[760px]:items-start min-[760px]:justify-between">
                        <div class="mx-3">
                            <form @submit.prevent="form.post(route('data.show'))"
                                class="mt-6 flex flex-col items-start justify-start">
                                <InputLabel for="date" value="Selecione uma data para ver o relatório." />
                                <div class="flex justify-start items-start gap-2 mb-3">
                                    <TextInput id="date" type="date" class="mt-1" v-model="form.date" required autofocus
                                        autocomplete="date" />
                                    <InputError class="mt-2" :message="form.errors.date" />

                                    <PrimaryButton class="mt-2" :disabled="form.processing">Ver dados 🎲</PrimaryButton>
                                </div>
                            </form>
                        </div>
                        <div class="mx-3" v-if="lindingOpenPossitionData">
                            <div class="flex justify-start items-start gap-2">
                                <a href="/data-b3/graphics"
                                    class="mt-12 px-4 py-1 transition ease-in duration-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                    Ver gráfico 📊
                                </a>
                            </div>
                        </div>
                        <div class="mx-3" v-else>

                        </div>

                    </div>
                    <div>
                        <div v-if="lindingOpenPossitionData" class="container px-4 mx-auto sm:px-8">
                            <div class="py-8">
                                <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
                                    <h2 class="text-2xl leading-tight">
                                        Posições em Aberto de Empréstimo de Ativos
                                    </h2>
                                    <div class="text-end">
                                        <!-- <form
                                            class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                                            <div class=" relative ">
                                                <input type="text" id="&quot;form-subscribe-Filter"
                                                    class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                    placeholder="name" />
                                            </div>
                                            <button
                                                class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                                type="submit">
                                                Filter
                                            </button>
                                        </form> -->
                                    </div>
                                </div>

                                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                        <table class="min-w-full leading-normal">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        Data
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        Ticker Symbol
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        ISIN
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        Asset
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        Balance Quantity
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        Average Trade Price
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        Price Factor
                                                    </th>
                                                    <th scope="col"
                                                        class="px-3 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                        Balance Value
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="report in lindingOpenPossitionData.data" :key="report.id">
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.RptDt }}
                                                        </p>
                                                    </td>
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.TckrSymb }}
                                                        </p>
                                                    </td>
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.ISIN }}
                                                        </p>
                                                    </td>
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.Asst }}
                                                        </p>
                                                    </td>
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.BalQty }}
                                                        </p>
                                                    </td>
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.TradAvrgPric }}
                                                        </p>
                                                    </td>
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.PricFctr }}
                                                        </p>
                                                    </td>
                                                    <td class="px-3 py-5 text-sm bg-white border-b border-gray-200">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ report.BalVal }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="container px-4 mx-auto sm:px-8">
                            <div class="py-8">
                                <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
                                    <h2 class="text-lg leading-tight">
                                        Nenhum dado foi encontrado neste dia. 😒 <br><br>
                                        Tente novamente mais tarde! 👌
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
