<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import ChripsLayout from '@/Layouts/ChripsLayout.vue';
    import MsgSend from '@/Components/Chirps/Sends/MsgSend/index.vue';
    import InputError from '@/Components/InputError.vue';
    import Footer from '@/Layouts/Footer.vue';

    import { useForm, Head, Link } from '@inertiajs/vue3';
    
    defineProps(['chirps']);

</script>
 
<template>
    <Head title="Chirps" />
 
    <AuthenticatedLayout>
        <template #header>
            <div class="w-full overflow-x-scroll md:overflow-visible">
                <ul class="min-w-[530px] flex justify-start sm:justify-end">
                    <li class="inline-flex bg-[#E1E7FD] rounded-md">
                        <Link 
                            :href="route('chirps.index')"
                            class="px-6 py-2 pretendard-font font-semibold text-sm sm:text-base lg:text-lg text-[#4F44F0]"
                        >메시지 전송</Link>
                    </li>
                    <li class="inline-flex">
                        <Link 
                            href="#"
                            class="px-6 py-2 pretendard-font font-medium text-sm sm:text-base lg:text-lg text-[#555] cursor-not-allowed"
                        >발신번호 관리</Link>
                    </li>
                    <li class="inline-flex">
                        <Link 
                            href="#"
                            class="px-6 py-2 pretendard-font font-medium text-sm sm:text-base lg:text-lg text-[#555] cursor-not-allowed"
                        >주소록 관리</Link>
                    </li>
                    <li class="inline-flex">
                        <Link 
                            href="#"
                            class="px-6 py-2 pretendard-font font-medium text-sm sm:text-base lg:text-lg text-[#555] cursor-not-allowed"
                        >발송결과</Link>
                    </li>
                </ul>
            </div>           
        </template>

            <ChripsLayout sub-title="메시지 전송">
                <template #content>
                    <div id="tab-wrap" class="pb-5 border-b-[1px] border-[#707070]/[30%]">
                        <ul id="sub-tab" class="grid grid-cols-1 md:grid-cols-3 gap-3 pt-6 pb-5">
                            <li class="inline-flex items-center justify-center bg-[#4F44F0] rounded-lg cursor-pointer"><span class="w-full p-2 md:p-5 Pretendard-font font-medium text-sm md:text-lg text-white text-center">문자 메시지</span></li>
                            <li class="inline-flex items-center justify-center bg-[#F5F6FA] rounded-lg cursor-not-allowed"><span class="w-full p-2 md:p-5 Pretendard-font text-sm md:text-lg text-[#555] text-center">알림톡 (카카오)</span></li>
                            <li class="inline-flex items-center justify-center bg-[#F5F6FA] rounded-lg cursor-not-allowed"><span class="w-full p-2 md:p-5 Pretendard-font text-sm md:text-lg text-[#555] text-center">친구톡 (카카오)</span></li>
                        </ul>

                        <p class="pretendard-font text-xs sm:text-sm text-[#525252] pl-3 relative before:absolute before:content-[''] before:w-[3px] before:h-[3px] before:rounded-full before:bg-[#525252] before:left-1 before:top-1/2 before:transform before:-translate-y-1/2">간편하게 한 화면에서 단문, 장문 포토메세지를 발송할 수 있습니다.</p>
                        <p class="pretendard-font text-xs sm:text-sm text-[#525252] pl-3 relative before:absolute before:content-[''] before:w-[3px] before:h-[3px] before:rounded-full before:bg-[#525252] before:left-1 before:top-1/2 before:transform before:-translate-y-1/2">90byte 초과 시 장문문자로 자동 전환되며, 최대 2,000byte까지 작성이 가능합니다.</p>
                    </div>
                    
                    <div id="tab-contents" class="py-7">
                        <MsgSend chirps="chirps" />
                    </div>                  
                  
                </template>                
            </ChripsLayout>             
    </AuthenticatedLayout>

    <Footer />
</template>