<script setup>
    import { Link } from '@inertiajs/vue3';
    import PlusIcon from '@/Components/Icons/PlusIcon.vue';

    const props = defineProps({
        type: String,
        href: String,
        isPlusIcon: String,
        textColor: String,
        maxWidth: Number,
    });
    // console.log('isPlusIcon: ', props.isPlusIcon);
    // console.log('maxWidth_type: ', typeof props.maxWidth);
</script>

<template>
    <Link
        :href="props.href"
        :type="props.type ? props.type : 'text'"
        class="
            inline-flex items-center justify-center w-full py-2 sm:py-4 max-w-[150px] sm:max-w-[206px] bg-[#6250FF] rounded-full pretendard-font font-medium text-sm sm:text-[21px]
            color-white p-2 sm:p-4 sm:text-lg tracking-tight dark:bg-gray-200 border border-transparent
            dark:text-gray-800 uppercase hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 
            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        :style="{ maxWidth: props.maxWidth, color: props.textColor }"
        alt="링크 버튼"
    >
        <PlusIcon v-if="props.isPlusIcon" :text-color="props.textColor" />

        <slot />
        
    </Link>
</template>
