<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Credit from '@/Components/Credits/index.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Footer from '@/Layouts/Footer.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
 
defineProps(['credits']);

</script>
 
<template>
    <Head title="Credits Buy" />

    <AuthenticatedLayout>
       <template #header>
            <ul class="flex justify-end">
                <li class="inline-flex px-6 py-2 bg-[#E1E7FD] rounded-md">
                    <Link 
                        href="#"
                        class="pretendard-font font-semibold text-sm sm:text-base lg:text-lg text-[#4F44F0]"
                    >크레딧 구매</Link>
                </li>
                <li class="inline-flex px-6 py-2">
                    <Link 
                        :href="route('credits.history.index')"
                        class="pretendard-font font-medium text-sm sm:text-base lg:text-lg text-[#555]"
                    >크레딧 내역</Link>
                </li>
            </ul>
        </template>

        <div class="max-w-6xl mx-auto px-4 pt-4 pb-20 sm:pb-40 sm:pt-6 lg:pt-20 ">  
            <div id="sub-title" class="flex flex-col items-center">
                <h1 class="pretendard-font font-semibold text-black text-[20px] sm:text-[26px] lg:text-[38px]">크레딧 구매</h1>
                <span class="pretendard-font text-[#7B7B7B] text-[12px] sm:text-[19px] mt-2 sm:mt-4">메시지 전송을 위해 사용할 크레딧 상품을 선택해 주세요</span>
            </div>               

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 pt-5 sm:pt-8">
                <Credit
                    v-for="credit in 5"
                    :key="credit"
                />
            </div>           
        </div>
    </AuthenticatedLayout>

    <Footer />
</template>