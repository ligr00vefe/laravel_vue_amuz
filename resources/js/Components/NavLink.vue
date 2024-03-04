<script setup>
    import { ref, computed } from 'vue';
    import { Link } from '@inertiajs/vue3';

    const props = defineProps(['href', 'active']);
    // console.log('active: ', props.active);

    const linkClasses = ref(['text-black']); 

    const currentPath = window.location.pathname;
    // console.log('currentPath: ', currentPath);

    if (currentPath === '/welcome') {
        // 메인 페이지가 아닐 경우
        linkClasses.value = 'text-[#D9D9D9]';
    }
    // console.log('linkClasses: ', linkClasses);
    // console.log('linkClasses.value: ', linkClasses.value);
    
    const classes = computed(() =>
        props.active
            ? 'min-w-40 inline-flex items-center justify-center px-1 pt-1 border-b-2 border-[#4E43ED] dark:border-indigo-600 pretendard-font text-sm sm:text-lg font-semibold leading-5 text-[#4E43ED] dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : [ linkClasses.value, 'min-w-40 inline-flex items-center justify-center px-1 pt-1 border-b-2 border-transparent pretendard-font text-sm sm:text-lg font-semibold leading-5 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out']
    );
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
