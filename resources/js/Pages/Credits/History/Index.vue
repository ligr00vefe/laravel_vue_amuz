<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Footer from '@/Layouts/Footer.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
 
defineProps(['credits']);

</script>
 
<template>
    <Head title="Credits History" />

    <AuthenticatedLayout>
       <template #header>
            <ul class="flex justify-end">
                <li class="inline-flex px-6 py-2">
                    <Link 
                        :href="route('credits.buy.index')"
                        class="pretendard-font font-medium text-md text-[#555]"
                    >크레딧 구매</Link>
                </li>
                <li class="inline-flex px-6 py-2 bg-[#E1E7FD] rounded-md">
                    <Link 
                        href="#"
                        class="pretendard-font font-semibold text-md text-[#4F44F0]"
                    >크레딧 내역</Link>
                </li>
            </ul>
        </template>
        <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">           
            작업중입니다...
        </div>
    </AuthenticatedLayout>

    <Footer />
</template>