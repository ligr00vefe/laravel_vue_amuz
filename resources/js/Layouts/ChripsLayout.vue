<script setup>
  defineProps(['subTitle']);
</script>

<template>
  <div class="pt-11 pb-5 md:pb-40 bg-white md:bg-transparent">
      <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:pt-11 lg:pb-10 lg:px-20 bg-white rounded-xl ">           

        <div id="sub-title" class="flex justify-center">
            <h1 class="pretendard-font font-bold text-black text-lg sm:text-2xl lg:text-5xl">{{subTitle}}</h1>
        </div>        

        <div>        
          <slot name="content" />
        </div>
    </div>
  </div>   
</template>