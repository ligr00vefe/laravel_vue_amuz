<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex flex-col sm:justify-center items-center pt-[250px] pb-[150px] bg-gray-100 dark:bg-gray-900">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-219 h-68 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-lg mt-14 px-8 dark:bg-gray-800 overflow-hidden"
        >
            <slot />
        </div>
    </div>
</template>
