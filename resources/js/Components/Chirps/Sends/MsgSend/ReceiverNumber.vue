<script setup>
    import { Link } from '@inertiajs/vue3';
    import { ref } from 'vue';

    import Button from '@/Components/Button.vue';
    import HumanIcon from '@/Components/Icons/HumanIcon.vue';
    import DocumentIcon from '@/Components/Icons/DocumentIcon.vue';
    import ClockIcon from '@/Components/Icons/ClockIcon.vue';

    const receiving_numbers = ref([]);

    // 반응형 참조 변수로 입력값을 관리합니다.
    const newReceivingNumber = ref('');

    const formatCellPhone = (phone) => {
        let str = phone.replace(/[^0-9]/g, '');
        let tmp = '';
        if (str.length < 4) {
            return str;
        } else if (str.length < 7) {
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
        } else if (str.length < 11) {
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 3);
            tmp += '-';
            tmp += str.substr(6);
        } else {
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7);
        }
        return tmp; // 변환된 값을 반환합니다.
};

// 입력값이 변경될 때마다 formatCellPhone 함수를 호출하고, 결과를 receivingNumber에 할당합니다.
const updateReceivingNumber = (event) => {
    newReceivingNumber.value = formatCellPhone(event.target.value);
};
</script>

<template>
   <div id="receiving-wrap">
      <div id="added-box" class="flex justify-between">
        <input 
          type="text" 
          id="add_receiving_number"
          class="w-full p-2 sm:p-4 bg-[#F4F5F6] rounded-lg pretendard-font text-sm sm:text-lg text-[#7B7B7B] border-0 focus:border-0 focus:outline-0 focus:shadow-0" 
          maxlength="13"
          placeholder="휴대폰번호 (숫자만 입력)"
          v-model="newReceivingNumber"
          @input="updateReceivingNumber"
        />
        <Button is-plus-icon="true" text-color="#fff" max-width="115px" class="ml-2 text-sm sm:text-lg cursor-not-allowed">추가</Button> 
      </div>

      <div id="added-list">
        <div class="min-h-[200px] sm:min-h-[250px] mt-3 relative border-[1px] border-[#CECECE] rounded-lg">
          <ul id="receiving-numbers" class="p-4 pb-12">

          </ul>
          <div id="list-status">
            <p id="list-placeholder" class="absolute left-4 top-4 pretendard-font text-sm lg:text-base text-[#7B7B7B]">
              번호를 입력하거나 후 엔터 혹은 추가하기를 클릭해 주세요.<br /> 최대 1만 건까지 붙여넣기 가능합니다.
            </p>
            <strong class="absolute left-4 bottom-4 pretendard-font font-semibold text-sm lg:text-base text-black">총 <span class="text-[#5E2BFF]">0</span>명</strong>
            <span class="absolute right-4 bottom-4 pretendard-font font-medium text-sm lg:text-base text-[#6A6A6A] underline cursor-not-allowed">모두 삭제</span>
          </div>
        </div>
      </div>

      <div id="added-options" class="mt-3">
        <ul class="grid grid-cols-1 xl:grid-cols-3 gap-3">
          <li class="p-2 sm:p-4 border-[1px] border-[#CECECE] rounded-lg flex items-center justify-center cursor-not-allowed">
            <HumanIcon />
            <span class="pretendard-font text-xs sm:text-sm text-[#7B7B7B]">주소록 불러오기</span>
          </li>
          <li class="p-2 sm:p-4 border-[1px] border-[#CECECE] rounded-lg flex items-center justify-center cursor-not-allowed">
            <DocumentIcon />
            <span class="pretendard-font text-xs sm:text-sm text-[#7B7B7B]">파일 불러오기</span>
          </li>
          <li class="p-2 sm:p-4 border-[1px] border-[#CECECE] rounded-lg flex items-center justify-center cursor-not-allowed">
            <ClockIcon />
            <span class="pretendard-font text-xs sm:text-sm text-[#7B7B7B]">최근 전송 내역</span>
          </li>
        </ul>
      </div>
   </div>
</template>