<script setup>
  import Dropdown from '@/Components/Dropdown.vue';
  import DropdownLink from '@/Components/DropdownLink.vue';
  import InputError from '@/Components/InputError.vue';
  import Button from '@/Components/Button.vue';
  import PlusIcon from '@/Components/Icons/PlusIcon.vue';
  import dayjs from 'dayjs';
  import relativeTime from 'dayjs/plugin/relativeTime';
  import { useForm } from '@inertiajs/vue3';
  import { ref } from 'vue';

  dayjs.extend(relativeTime);
  
  const props = defineProps(['credit']);
      
  const editing = ref(false);

</script>
 
<template>
    <div class="py-6 sm:py-8 px-4 sm:px-6 bg-white shadow-sm min-w-[240px] lg:min-w-[300px] xl:min-w-[330px] rounded-lg">
      <strong class="pretendard-font font-bold text-xl sm:text-4xl tracking-wide text-black">30,000 원</strong>
      <p class="pretendard-font text-sm sm:text-base text-[#7B7B7B] mt-3">총 66,667건 발송가능합니다</p>
      <p class="pretendard-font text-sm sm:text-base text-[#7B7B7B]">1건당 15원에 결제가능합니다</p>

      <div class="mt-4 sm:mt-7 flex items-center justify-between">
        <strong class="pretendard-font font-semibold text-base sm:text-2xl text-black">330,000 크레딧</strong>
        <span class="py-1 sm:py-[7px] pl-[2px] sm:pl-[5px] pr-[5px] sm:pr-[10px] bg-[#E0EDFF] rounded-xl flex items-center justify-center pretendard-font font-semibold text-xs sm:text-sm text-[#2116BF] align-middle">
          <PlusIcon color="#2116BF" icon-size="20" />
          10%
        </span>
      </div>

      <div class="mt-3 sm:mt-5 p-3 bg-[#F4F5F6] rounded-lg">
        <p class="flex items-center justify-between">
          <span class="pretendard-font text-xs sm:text-sm text-[#6E6E6E]">기본 크레딧</span>
          <span class="pretendard-font text-sm sm:text-base text-[#070707]">100,000</span>
        </p>
        <p class="flex items-center justify-between mt-3">
          <span class="pretendard-font text-xs sm:text-sm text-[#6E6E6E]">추가 크레딧</span>
          <span class="pretendard-font text-sm sm:text-base text-[#070707] flex items-center">
            <PlusIcon color="#070707" icon-size="20" />
            10,000
          </span>
        </p>
      </div>
      
      <form class="mt-5 sm:mt-8">
        <Button>
          구매하기
        </Button>
      </form>
    </div>
</template>