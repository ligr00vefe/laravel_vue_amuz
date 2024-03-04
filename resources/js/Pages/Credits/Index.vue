<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
 
defineProps(['credits']);

</script>
 
<template>
    <Head title="Credits" />
 
    <div>
        <router-view></router-view>
    </div>
</template>