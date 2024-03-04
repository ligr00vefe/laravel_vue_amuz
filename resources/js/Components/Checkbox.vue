<script setup>
    import { computed } from 'vue';
    import { watch, ref } from 'vue';  
    
    const emit = defineEmits(['update:modelValue']);

    const props = defineProps({
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
        labelText: String,
    });

    // const proxyChecked = computed({
    //     get() {
    //         return props.checked;
    //     },

    //     set(val) {
    //         emit('update:checked', val);
    //     },
    // });

    // props.checked의 변화를 감지하여 proxyChecked를 업데이트합니다.
    const proxyChecked = ref(props.checked);

    watch(() => props.checked, (newVal) => {
        proxyChecked.value = newVal;
    });

    // 체크 상태를 토글하는 함수    
    const toggleCheckbox = () => {
        const newValue = !proxyChecked.value;
        proxyChecked.value = newValue;
        emit('update:modelValue', newValue);
        // console.log('newValue: ', newValue);
    };
</script>

<template>
    <div @click="toggleCheckbox" class="cursor-pointer relative inline-flex items-center">
         <!-- 체크 되지 않았을 때의 SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 sm:w-6 h-5 sm:h-6" viewBox="0 0 32 32">
            <g id="그룹_49963" data-name="그룹 49963" transform="translate(-602 -599)">
                <g id="사각형_28313" data-name="사각형 28313" transform="translate(602 599)" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
                <rect width="32" height="32" stroke="none"/>
                <rect x="0.5" y="0.5" width="31" height="31" fill="none"/>
                </g>
                <g id="사각형_28312" data-name="사각형 28312" transform="translate(604 601)" fill="#fff" stroke="#cecece" stroke-width="1">
                <rect width="28" height="28" rx="8" stroke="none"/>
                <rect x="0.5" y="0.5" width="27" height="27" rx="7.5" fill="none"/>
                </g>
            </g>
        </svg>

        <!-- 체크 되었을 때의 SVG -->
        <svg id="svg-checked" class="absolute top-0 left-0 transition-opacity duration-300 w-5 sm:w-6 h-5 sm:h-6" data-name="구성 요소 1 – 3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" :class="{ 'opacity-0': !proxyChecked, 'opacity-100': proxyChecked }">
            <g id="사각형_28313" data-name="사각형 28313" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
                <rect width="32" height="32" stroke="none"/>
                <rect x="0.5" y="0.5" width="31" height="31" fill="none"/>
            </g>
            <g id="사각형_28312" data-name="사각형 28312" transform="translate(2 2)" fill="#fff" stroke="#cecece" stroke-width="1">
                <rect width="28" height="28" rx="8" stroke="none"/>
                <rect x="0.5" y="0.5" width="27" height="27" rx="7.5" fill="none"/>
            </g>
            <path id="Icon_feather-check" data-name="Icon feather-check" d="M15.627,9,9.009,15.619,6,12.61" transform="translate(5.01 3.865)" fill="none" stroke="#5146f0" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
        </svg>

        <label class="pretendard-font font-medium text-sm sm:text-lg text-[#1C1C1C] ml-2 cursor-pointer">
            {{ labelText }}
        </label>
    </div>
</template>
