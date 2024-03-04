<script setup>
    import { ref } from 'vue';
    import { Head, Link } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import MainGridLayout from '@/Layouts/MainGridLayout.vue';
    import RoundedLink from '@/Components/RoundedLink.vue';
    import Footer from '@/Layouts/Footer.vue';

    const mainGridList = ref([
        {
            'id': '02',
            'title': '복잡한 인터넷 문자 서비스를<br /> 간편하게 만나보세요.',
            'subTitle': '모든 종류의 인터넷 SMS를 편리하게.'
        },{
            'id': '03',
            'title': '샌드고의 다양한<br /> 기능들을 살펴보세요',
            'subTitle': '고객님들의 입장에서 고민하였습니다.'
        },{
            'id': '04',
            'title': '정확도와 다양함은 물론<br /> 신뢰할 수 있는 보안까지',
            'subTitle': '고객님들의 간편함을 고민하였습니다'
        }
    ]);

</script>

<template>
    <Head title="Welcome" />

    <AuthenticatedLayout>
        <div class="bg-black min-h-[700px] lg:min-h-[800px] xl:min-h-[900px] 2xl:min-h-[1080px] flex items-center justify-start relative overflow-hidden">
            <div class="max-w-6xl w-full mx-auto flex items-center justify-center md:justify-between px-4 sm:px-6 md:px-8">                       
                <div id="main-left" class="flex flex-col items-center md:items-start z-10">
                    <span class="pretendard-font-medium text-base sm:text-2xl text-[#FCFCFC]">인터넷 문자 메시지 전송의 모든 것</span>
                    <strong class="bg-gradient-to-r from-[#9FBAFD] to-[#4E81FF] bg-clip-text text-transparent mt-4 sm:mt-6 pretendard-font-extraBold text-5xl lg:text-[60px]/[1.3] text-center md:text-left">
                        가장 빠르고 안정적인<br />
                        문자 서비스 SENDGO
                    </strong>
                    <div class="w-full flex gap-3 sm:gap-4 mt-12">
                        <Link :href="route('register')" class="inline-flex items-center justify-center w-full py-2 sm:py-4 max-w-[150px] sm:max-w-[206px] bg-[#6250FF] rounded-full pretendard-font font-medium text-sm sm:text-[21px] text-white">회원가입</Link>
                        <Link :href="route('login')" class="inline-flex items-center justify-center w-full max-w-[150px] sm:max-w-[206px] bg-[#242424] shadow-sm rounded-full pretendard-font font-medium text-sm sm:text-[21px] text-[#E0E0E0]">로그인</Link>
                    </div>         
                </div>
                <div id="main-right" class="
                        absolute w-[150%] transform  
                        after:content-[''] after:absolute after:top-0 after:left-0 after:w-full after:h-full after:bg-gradient-to-r after:from-black after:opacity-100
                        right-3 -bottom-[300px] scale-100 rotate-12 opacity-20 
                        
                        sm:-right-5 sm:w-[120%] sm:opacity-50 
                        md:-right-20 md:w-fit md:scale-75 
                        lg:-right-15 lg:-bottom-[235px] lg:scale-75 lg:opacity-100 
                        xl:right-0 xl:-bottom-[60px] xl:scale-90 xl:rotate-0 xl:after:opacity-0 
                        2xl:right-20 2xl:bottom-0 2xl:scale-100               
                    "
                    >
                    <ul class="grid grid-cols-3 items-end gap-10 sm:gap-6">
                        <li class="relative w-[254px] h-[443px] bg-[#6250FF] rounded-3xl inline-flex -mb-52"><img src="/images/main01_img01.png" alt="메인01 이미지01"></li>
                        <li class="relative w-[254px] h-[524px] bg-[#37383E] rounded-3xl inline-flex items-end -mb-40"><img src="/images/main01_img02.png" alt="메인01 이미지02"></li>
                        <li class="relative w-[254px] h-[524px] bg-[#6250FF] rounded-3xl inline-flex items-center"><img src="/images/main01_img03.png" alt="메인01 이미지03"></li>
                        <li class="relative w-[254px] h-[609px] bg-[#25262C] rounded-3xl inline-flex items-center -mb-24"><img src="/images/main01_img04.png" alt="메인01 이미지04"></li>
                        <li class="relative w-[254px] h-[609px] bg-[#6250FF] rounded-3xl inline-flex items-center -mb-12"><img src="/images/main01_img05.png" alt="메인01 이미지05"></li>
                        <li class="w-[254px] h-[609px] bg-[#25262C] rounded-3xl inline-flex items-center mb-28"><img src="/images/main01_img06.png" alt="메인01 이미지06" class="absolute !max-w-auto w-[350px]"></li>
                    </ul>
                </div>
            </div>
        </div>

        <MainGridLayout :main-id="mainGridList[0].id" :title="mainGridList[0].title" :sub-title="mainGridList[0].subTitle" />

        <MainGridLayout :main-id="mainGridList[1].id" :title="mainGridList[1].title" :sub-title="mainGridList[1].subTitle" /> 

        <MainGridLayout :main-id="mainGridList[2].id" :title="mainGridList[2].title" :sub-title="mainGridList[2].subTitle" />
 
                
        <div class="bg-[#0C0C10] min-h-[700px] lg:min-h-[800px] xl:min-h-[1080px] flex items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <strong
                class="bg-gradient-to-r from-[#B6B7F7] to-[#7FB2FE] pretendard-font-extraBold font-900 text-3xl xs:text-5xl lg:text-[70px]/[1.3] bg-clip-text text-transparent text-center"  
                >
                    비지니스 광고의 시작,<br /> 이제 샌드고와 함께 하세요.
                </strong>

                <RoundedLink :href="route('chirps.index')" class="max-w-[150px] sm:max-w-[206px] text-white gap-3 sm:gap-4 mt-8 sm:mt-12">메시지 바로가기</RoundedLink>
                
            </div>            
        </div>

    </AuthenticatedLayout>

    <Footer />
</template>
