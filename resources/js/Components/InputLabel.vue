<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block pretendard-font font-semibold text-sm sm:text-lg text-black dark:text-gray-300">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
