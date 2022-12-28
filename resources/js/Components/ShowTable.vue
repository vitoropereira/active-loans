
<template>

    <table class="border-solid border-2 border-gray-300 bg-gray-100 table-auto">
        <thead>
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Ticker Symbol</th>
                <th class="py-2 px-4">ISIN</th>
                <th class="py-2 px-4">Asset</th>
                <th class="py-2 px-4">Balance Quantity</th>
                <th class="py-2 px-4">Average Trade Price</th>
                <th class="py-2 px-4">Price Factor</th>
                <th class="py-2 px-4">Balance Value</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="report  in reports" :key="report.id">
                <td class="py-2 px-4">{{ report.id }}</td>
                <td class="py-2 px-4">{{ report.RptDt }}</td>
                <td class="py-2 px-4">{{ report.TckrSymb }}</td>
                <td class="py-2 px-4">{{ report.ISIN }}</td>
                <td class="py-2 px-4">{{ report.Asst }}</td>
                <td class="py-2 px-4">{{ report.BalQty }}</td>
                <td class="py-2 px-4">{{ report.TradAvrgPric }}</td>
                <td class="py-2 px-4">{{ report.PricFctr }}</td>
                <td class="py-2 px-4">{{ report.BalVal }}</td>
            </tr>
        </tbody>
    </table>
    {{ props }}
    {{ reports }}
</template>
<script>
export default {
    props: ['reports'],
};
</script>
