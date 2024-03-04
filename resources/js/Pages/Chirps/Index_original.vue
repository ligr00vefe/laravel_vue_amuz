<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Chirp from '@/Components/Chirp.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';
 
defineProps(['chirps']);

const form = useForm({
    message: '',
});
</script>
 
<template>
    <Head title="Chirps" />
 
    <AuthenticatedLayout>
        <template #header>
            <ul class="flex justify-end">
                <li class="inline-flex px-6 py-2 bg-[#E1E7FD] rounded-md">
                    <Link 
                        :href="route('chirps.index')"
                        class="pretendard-font font-semibold text-md text-[#4F44F0]"
                    >메시지 전송</Link>
                </li>
                <li class="inline-flex px-6 py-2">
                    <Link 
                        href="#"
                        class="pretendard-font font-medium text-md text-[#555]"
                    >발신번호 관리</Link>
                </li>
                <li class="inline-flex px-6 py-2">
                    <Link 
                        href="#"
                        class="pretendard-font font-medium text-md text-[#555]"
                    >주소록 관리</Link>
                </li>
                <li class="inline-flex px-6 py-2">
                    <Link 
                        href="#"
                        class="pretendard-font font-medium text-md text-[#555]"
                    >발송결과</Link>
                </li>
            </ul>
        </template>

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>


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
              <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <Chirp
                    v-for="chirp in chirps"
                    :key="chirp.id"
                    :chirp="chirp"
                />
            </div>
            
        </div>
    </AuthenticatedLayout>
</template>