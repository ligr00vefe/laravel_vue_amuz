<script setup>
    defineProps({
        type: {
            type: String,
            default: 'submit',
        },
    });
</script>

<template>
    <button
        :type="type"
        class="
        inline-flex items-center justify-center color-white w-full p-2 sm:p-4 rounded-lg bg-[#4F44F0] pretendard-font font-medium text-sm sm:text-lg tracking-tight dark:bg-gray-200 border border-transparent text-white 
        dark:text-gray-800 uppercase hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
