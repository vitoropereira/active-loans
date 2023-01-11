
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Chart from 'chart.js/auto';
defineProps({
    graphicsData: [],
    graphicsDataActive: String,
});

</script>
<template>

    <Head title="Gráficos" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">B3 Dados</h2>
        </template>
        {{ graphicsDataActive }}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg min-h-96">
                    <div v-if="graphicsData" class="flex flex-col items-start justify-start ml-4 min-h-screen">
                        <InputLabel for="date" value="Selecione um ativo pra visualizar o gráfico." class="text-lg" />
                        <select v-model="selectedOption" v-bind="graphicsDataActive" id="select"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-2">
                            >
                            <option v-for="option in graphicsData" :key="option.id" :value="option.TckrSymb">
                                {{ option.TckrSymb }}
                            </option>
                        </select>
                        <div class="flex align-middle w-[90%] m-3">
                            <canvas ref="chart"></canvas>
                        </div>
                    </div>
                    <div v-else class="flex justify-center items-center m-10">
                        <div
                            class="animate-spin h-5 w-5 mr-3 border-t-4 border-r-4 border-b-4 rounded border-indigo-500 ">
                            <div class="animate-spin h-5 w-5 mr-3 border-4 rounded border-white ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

export default {


    data() {
        return {
            selectedOption: '',
            options: [
                { value: 'opção 1', text: 'Opção 1' },
                { value: 'opção 2', text: 'Opção 2' },
                { value: 'opção 3', text: 'Opção 3' }
            ]
        }
    },
    watch: {
        async selectedOption(newOption) {

            // Obtenha os dados do gráfico para a opção selecionada
            const chartData = await this.getChartData(newOption);

            // Atualize o gráfico com os novos dados
            console.log('chartData')
            console.log(chartData)
            this.updateChart(chartData);
        }
    },
    methods: {
        async getData(active) {
            try {
                const response = await fetch(`/api/active/${active}`);
                const data = await response.json();
                console.log('data')
                console.log(data)
                return data;
            } catch (error) {
                console.log(error)
            }
        },
        async getChartData(option) {
            const color1 = ['#0000CD', '#00BFFF', '#00FFFF', '#20B2AA', '#00FA9A'];
            const color2 = ['#000C4D', '#50BF6F', '#00FF8F', '#203291', '#00dA9A'];
            const { data } = await this.getData(option)
            const chartData = {
                labels: [],
                datasets: [
                    {
                        label: 'Saldo',
                        data: [],
                        backgroundColor: color1[Math.floor(Math.random() * 4)],
                        borderColor: '#0000CD',
                        fill: false,
                        borderJoinStyle: 'miter'
                    }
                ]
            };
            data.forEach(item => {
                console.log('item')
                console.log(item)
                chartData.labels.push(item.RptDt);
                chartData.datasets[0].data.push(parseFloat(item.BalVal));
            });
            return chartData;
        },
        updateChart(data) {

            if (this.chart) {
                this.chart.data = data;
                this.chart.update();
            } else {
                const chartConfig = {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: true
                    }
                };
                //                 barController
                // barElement
                // categoryScale
                // Tooltip
                // Legend

                this.chart = new Chart(this.$refs.chart, chartConfig);
            }
        }
    }
}
</script>
