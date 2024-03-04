<script setup>
    import { useForm, Link } from '@inertiajs/vue3';
    import { watch, ref } from 'vue';
    import InputError from '@/Components/InputError.vue';

    import Button from '@/Components/Button.vue';
    import TextInput from '@/Components/TextInput.vue';
    import DocumentIcon from '@/Components/Icons/DocumentIcon.vue';
    import ClockIcon from '@/Components/Icons/ClockIcon.vue';
    import ReloadIcon from '@/Components/Icons/ReloadIcon.vue';
    import SwitchIcon from '@/Components/Icons/SwitchIcon.vue';
    import ImgAddIcon from '@/Components/Icons/ImgAddIcon.vue';
    
    const props = defineProps({
        form: Object,
    });

    const emit = defineEmits(['update:message']);

    function updateMessage(message) {
      emit('update:message', message);
    }    

    watch(() => props.form.message, (newMessage) => {
      updateMessage(newMessage);
    });
</script>

<template>
   <div id="upload-wrap" class="p-3 sm:p-5 bg-[#F6F6F6] border-[1px] border-[#E1E3E5] rounded-lg">
      <TextInput class="w-full" placeholder="제목을 입력해주세요. (단문 SMS는 제외, 최대 30byte)" v-model="props.form.title" />
      <InputError :message="form.errors.title" class="mt-2" />

      <div id="title-options" class="py-2 sm:py-3 flex justify-between">
        <span class="py-1 sm:py-2 px-3 sm:px-4 pretendard-font text-xs sm:text-sm text-white bg-[#5E2BFF] rounded-full cursor-not-allowed">
          단문 SMS
        </span>

        <div class="pretendard-font font-medium text-xs sm:text-sm text-[#8D8D8D] flex items-center">
          <span id="count" class="font-semibold text-[#5E2BFF]">0</span><span class="ml-1 mr-2">/ 90byte</span>
          <ReloadIcon class="cursor-not-allowed"/>
        </div>       
      </div>

      <div class="relative">
        <textarea
          v-model="props.form.message"
          class="block w-full min-h-[295px] border-[#CECECE] text-sm sm:text-base rounded-lg shadow-sm p-3 sm:p-4"
          placeholder="내용을 입력해 주세요. 90byte 초과 시 장문 문자로, 이미지 추가 시 포토 문자로 자동 전환 됩니다."
        ></textarea>
        <InputError :message="form.errors.message" class="absolute -b-10 mt-0 sm:mt-1" />

        <div id="textarea-options">
          <ul class="absolute right-0 bottom-0 pb-4 pr-4 flex gap-3">
            <li class="bg-[#F5F5F5] rounded-full"><span class="inline-flex items-center justify-center max-w-[107px] w-full h-full px-3 sm:px-5 py-1 sm:py-2 pretendard-font text-xs sm:text-sm text-[#646464] cursor-not-allowed">치환코드</span></li>
            <li class="bg-[#F5F5F5] rounded-full"><span class="inline-flex items-center justify-center max-w-[107px] w-full h-full px-3 sm:px-5 py-1 sm:py-2 pretendard-font text-xs sm:text-sm text-[#646464] cursor-not-allowed">템플릿</span></li>
            <li class="bg-[#F5F5F5] rounded-full"><span class="inline-flex items-center justify-center max-w-[107px] w-full h-full px-3 sm:px-5 py-1 sm:py-2 pretendard-font text-xs sm:text-sm text-[#646464] cursor-not-allowed">문자도구</span></li>
          </ul>
        </div>
      </div>
      
      <div id="upload-adv" class="flex items-center justify-between pt-3 sm:pt-6 pb-3 sm:pb-5 mt-3 sm:mt-5 border-[#707070]/[30%] border-t-[1px] border-b-[1px]">
        <strong class="pretendard-font font-semibold text-black text-sm sm:text-base">광고성 문자(080 수신거부번호 포함)</strong>
        <SwitchIcon class="cursor-not-allowed" />
      </div>

      <div id="upload-img" class="flex flex-col">
        <strong class="pretendard-font font-semibold text-black text-sm sm:text-base mt-3 sm:mt-4">이미지 추가</strong>
        <ImgAddIcon class="mt-2 sm:mt-3 mb-2 sm:mb-3 cursor-not-allowed" />
      </div>

      <div>
        <p class="pretendard-font text-xs sm:text-sm text-[#797979] pl-3 relative before:absolute before:content-[''] before:w-[3px] before:h-[3px] before:rounded-full before:bg-[#525252] before:left-1 before:top-1/2 before:transform before:-translate-y-1/2">이미지는 최대 3장까지 첨부 가능합니다.</p>
        <p class="pretendard-font text-xs sm:text-sm text-[#797979] pl-3 relative before:absolute before:content-[''] before:w-[3px] before:h-[3px] before:rounded-full before:bg-[#525252] before:left-1 before:top-1/2 before:transform before:-translate-y-1/2">이미지 파일 형식은 JPG, PNG, GIF만 가능합니다.</p>
      </div>
   </div>
</template>