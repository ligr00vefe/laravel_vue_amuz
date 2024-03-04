<script setup>
    import PlusIcon from '@/Components/Icons/PlusIcon.vue';

    const props = defineProps({
        type: String,
        isPlusIcon: String,
        textColor: String,
        maxWidth: Number,
    });
    // console.log('isPlusIcon: ', props.isPlusIcon);
    // console.log('maxWidth_type: ', typeof props.maxWidth);
</script>

<template>
    <button
        :type="props.type ? props.type : 'text'"
        class="
            inline-flex items-center justify-center color-white w-full p-2 sm:p-4 rounded-lg bg-[#5146F0] pretendard-font font-medium text-base sm:text-lg tracking-tight dark:bg-gray-200 border border-transparent 
            dark:text-gray-800 uppercase hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        :style="{ maxWidth: props.maxWidth, color: props.textColor }"
    >
        <PlusIcon v-if="props.isPlusIcon === 'true'" :text-color="props.textColor" />
        <slot />
    </button>
</template>
