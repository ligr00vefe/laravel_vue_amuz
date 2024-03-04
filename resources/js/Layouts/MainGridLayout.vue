<script setup>
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import MainGridContent01 from '@/Components/Main/MainGridContent01.vue';
    import MainGridContent02 from '@/Components/Main/MainGridContent02.vue';
    import MainGridContent03 from '@/Components/Main/MainGridContent03.vue';

    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        mainId: String,
        title: String,
        subTitle: String,
    });

    // console.log('main-id: ' + props.mainId);
    // console.log('title: ' + props.title);
    // console.log('subTitle: ' + props.subTitle);
</script>

<template>
    <div class="bg-white pt-[100px] sm:pt-[150px] lg:pt-[200px] pb-[35px] sm:pb-[50px]">
        <div class="max-w-[1480px] mx-auto">    
            <div id="main-grid-title" class="flex flex-col items-center">
                <img :src="'/images/main' + props.mainId + '_title_icon.png'" alt="title icon img" class="w-[50px] sm:w-[60px] md:w-[70px] lg:w-[80px] h-auto">
                <h3 v-html="props.title" class="pretendard-font-bold text-lg sm:text-2xl lg:text-4xl xl:text-[56px]/[1.3] text-black mt-5 sm:mt-9 text-center"></h3>
                <p v-html="props.subTitle" class="pretendard-font text-[#5C5C5C] mt-3 sm:mt-5"></p>
            </div>

            <MainGridContent01 v-if="props.mainId === '02'" />

            <MainGridContent02 v-if="props.mainId === '03'" />

            <MainGridContent03 v-if="props.mainId === '04'" />

        </div>
    </div>
</template>
