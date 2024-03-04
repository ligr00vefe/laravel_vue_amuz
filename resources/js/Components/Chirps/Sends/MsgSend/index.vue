<script setup>
    import { useForm, Head, Link } from '@inertiajs/vue3';
    import { ref } from 'vue';

    import ReceiverNumber from '@/Components/Chirps/Sends/MsgSend/ReceiverNumber.vue'
    import MsgUpload from '@/Components/Chirps/Sends/MsgSend/MsgUpload.vue'
    import MsgRadios from '@/Components/Chirps/Sends/MsgSend/MsgRadios.vue'
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    defineProps(['chirps']);

    const form = useForm({
        title: '',
        message: '',
    });

    const options = ref([
        {
            'name': 'send_option',
            'value': 'immediate',
            'label': '즉시 발송',
        },
        {
            'name': 'send_option',
            'value': 'scheduled',
            'label': '예약 발송',
        },
    ])

    // 발송 옵션 상태 추가
    const sendOption = ref('');

    const viewContent = ref('');
</script>

<template>
  <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
      <div id="msg-wrap" class="flex flex-col lg:flex-row justify-between gap-4">                            
            <div id="control-container" class="min-w-[300px] lg:min-w-[400px] w-full lg:w-[60%]">
                <div class="py-6 lg:pt-0 border-t-[1px] lg:border-t-0 border-b-[1px] border-[#707070]/[30%]">
                    <h3 class="pretendard-font font-semibold text-sm sm:text-lg text-black mb-3">수신번호</h3>
                    <ReceiverNumber />
                </div>

                <div class="py-6 border-b-[1px] border-[#707070]/[30%]">
                    <h3 class="pretendard-font font-semibold text-sm sm:text-lg text-black mb-3">발신번호</h3>
                    <select 
                        name="" 
                        id="" 
                        class="w-full bg-[#F4F5F6] rounded-md border-0 pretendard-font text-[#7B7B7B] text-sm sm:text-base p-3 sm:p-4 cursor-pointer"
                    >
                        <option value="" selected hidden>전송할 발신번호 선택</option>
                        <option value="">010-1234-1234</option>
                    </select>
                </div>

                <div class="py-6">
                    <h3 class="pretendard-font font-semibold text-sm sm:text-lg text-black mb-3">메시지 입력</h3>

                    <MsgUpload :form="form" @update:message="message => viewContent = message" />
                </div>
            
            </div>
            <div 
                id="view-container" 
                class="
                    relative min-w-[200px] max-w-[full] lg:max-w-[400px] w-full h-auto lg:w-[40%] pb-6
                    order-first lg:order-last
                    flex justify-center lg:justify-end
                "
            >
                <div 
                    id="view-monitor"
                    class="sticky top-7 max-w-full sm:max-w-[400px] w-full h-[600px] lg:h-[775px] bg-[#EAF8FF] border-[5px] border-[#4D4D4D] rounded-2xl p-5 md:p-7 pt-10 md:pt-16"
                >
                    <p class="pretendard-font font-medium text-base md:text-lg lg:text-xl text-black">
                        <span class="absolute top-5 sm:top-7 left-5 sm:left-7 w-[15px] sm:w-4 h-[15px] sm:h-4 border-t-[3px] sm:border-t-4 border-l-[3px] sm:border-l-4 border-black transform -rotate-45 mr-1"></span>
                        {{ viewContent }}
                    </p>
                </div>
            </div>
        </div>

        <div class="py-6 border-y-[1px] border-[#707070]/[30%]">
            <h3 class="pretendard-font font-semibold text-sm sm:text-lg text-black mb-3">발송 설정</h3>
            <div class="grid grid-cols-2 gap-3 min-w-[300px] lg:min-w-[400px] w-full lg:w-[60%]">
                <!-- <MsgRadios name="send-option" v-model="sendOption" value="immediate" label-text="즉시 발송" />
                <MsgRadios name="send-option" v-model="sendOption" value="scheduled" label-text="예약 발송" /> -->
                <MsgRadios v-for="(option, index) in options" :key="index" :name="option.name" :value="option.value" v-model="sendOption" :label-text="option.label" :index="index" />
            </div>
            
        </div>
        
        <PrimaryButton class="mt-6 sm:mt-8" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">발송하기</PrimaryButton>
  </form>
</template>