<script setup>
    import { onMounted, ref } from 'vue';

    // iconType prop 추가
    defineProps(['modelValue', 'iconType', 'placeholder', 'type']);

    defineEmits(['update:modelValue']);

    const input = ref(null);

    onMounted(() => {
        if (input.value.hasAttribute('autofocus')) {
            input.value.focus();
        }
    });

    defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div class="relative mt-1 p-0 border-0 bg-transparent">
        <input
            class="
                w-full pl-9 sm:pl-11 pr-2 sm:pr-4 py-2 sm:py-4 border focus:outline-none focus:ring transition duration-150 pretendard-font text-sm sm:text-base
                border-[#cecece] dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
            :placeholder="placeholder"
            :type="type"
        />
        <!-- 조건부 SVG 렌더링 -->
        <svg v-if="iconType === 'user'" class="absolute w-7 h-7 text-gray-400 left-2 sm:left-4 top-1/2 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <g id="그룹_49941" data-name="그룹 49941" transform="translate(-704 -406)">
                <g id="사각형_28314" data-name="사각형 28314" transform="translate(704 406)" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
                <rect width="32" height="32" stroke="none"/>
                <rect x="0.5" y="0.5" width="31" height="31" fill="none"/>
                </g>
                <path id="Icon_ionic-md-people" data-name="Icon ionic-md-people" d="M9.13,13.667a2.9,2.9,0,1,0-2.949-2.9A2.931,2.931,0,0,0,9.13,13.667Zm0,2.124c-2.31,0-6.88,1.11-6.88,3.379v2.606h13.9V19.169C16.15,16.9,11.44,15.79,9.13,15.79Z" transform="translate(710.75 407.125)" fill="#868686"/>
            </g>
        </svg>

        <svg v-if="iconType === 'lock'" class="absolute w-7 h-7 text-gray-400 left-2 sm:left-4 top-1/2 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <g id="그룹_49943" data-name="그룹 49943" transform="translate(-704 -491)">
                <g id="그룹_49942" data-name="그룹 49942" transform="translate(0 85)">
                <g id="사각형_28314" data-name="사각형 28314" transform="translate(704 406)" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
                    <rect width="32" height="32" stroke="none"/>
                    <rect x="0.5" y="0.5" width="31" height="31" fill="none"/>
                </g>
                </g>
                <path id="Icon_awesome-lock" data-name="Icon awesome-lock" d="M10.206,5.715H9.593V3.878a3.878,3.878,0,0,0-7.756,0V5.715H1.225A1.225,1.225,0,0,0,0,6.94v4.9a1.225,1.225,0,0,0,1.225,1.225h8.981a1.225,1.225,0,0,0,1.225-1.225V6.94A1.225,1.225,0,0,0,10.206,5.715Zm-2.654,0H3.878V3.878a1.837,1.837,0,1,1,3.674,0Z" transform="translate(714 500)" fill="#868686"/>
            </g>
        </svg>
    </div>
</template>
