<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue', 'reports']);

defineEmits(['update:modelValue']);

const select = ref(null);

onMounted(() => {
    if (select.value.hasAttribute('autofocus')) {
        select.value.focus();
    }
});

// defineExpose({ focus: () => select.value.focus() });
</script>

<template>
    <select v-model="active" id="select-active"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-2"
        :value="modelValue" @change="$emit('update:modelValue', $event.target.value)" ref="select">
        <option v-for="report in reports" :key="report.id" :value="report.value">
            {{ report.TckrSymb }}
        </option>
    </select>
</template>
