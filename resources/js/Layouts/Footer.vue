<script setup>
  import { Link } from '@inertiajs/vue3';
  import ApplicationLogo2 from '@/Components/ApplicationLogo2.vue';
</script>

<template>
  <div id="ft-wrap" class="flex justify-center bottom-0 bg-[#222222] overflow-hidden">
    <div 
      id="ft-container" 
      class="max-w-[1280px] w-full px-4 sm:px-6 lg:px-8"
    >
      <div 
        id="ft-top"
        class="pt-11 pb-7"
      >
        <div class="flex justify-between items-center flex-col sm:flex-row">
            <Link href="/">
                <ApplicationLogo2 class="block w-auto fill-current text-gray-800 dark:text-gray-200" nav-logo="true" />
            </Link>
            <ul class="flex justify-center w-full sm:justify-end lg:justify-center mt-7 sm:mt-0">
              <li class="px-4 flex items-center justify-center pretendard-font font-medium text-[#EDEDED] text-sm hover:text-gray-500"><Link :href="route('chirps.index')">메시지</Link></li>
              <li class="px-4 flex items-center justify-center pretendard-font font-medium text-[#EDEDED] text-sm hover:text-gray-500"><Link :href="route('credits.index')">크레딧</Link></li>
          </ul>
        </div>
      </div>
      <div 
        id="ft-bottom"
        class="relative pt-6 pb-20 before:content-[''] before:absolute before:top-0 before:w-screen before:h-[1px] before:left-1/2 before:transform before:-translate-x-1/2 before:bg-[#414141]"
      >
        <p class="pretendard-font font-medium text-[#D6D6D6] text-sm leading-5">문의 사항이 있으신가요? <br class="sm:hidden"/>텔레그램을 통해 고객센터로 문의 해 보세요.</p>
        <p class="pretendard-font font-medium text-[#F0F0F0] text-sm mt-2">Telegram : @shdevelope</p>
      </div>
    </div>
  </div>
</template>