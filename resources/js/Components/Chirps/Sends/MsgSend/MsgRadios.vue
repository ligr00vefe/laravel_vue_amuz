<script setup>
    import { computed } from 'vue';
    import { Link } from '@inertiajs/vue3';
    import CheckIcon from '@/Components/Icons/CheckIcon.vue';

    const emit = defineEmits(['update:modelValue']);
    const props = defineProps({
        name: String,
        value: String,
        labelText: String,
        index: Number,
        modelValue: [String, Number] // 이렇게 modelValue를 포함시킬 수 있습니다.
    });

    // console.log('index: ', props.index);
    // console.log('value: ', props.value);

    function handleClick() {
        emit('update:modelValue', props.value);
        // console.log('modelValue: ', props.modelValue);
    }

    const isChecked = computed(() => props.modelValue === props.value || (props.index === 0 && !props.modelValue));

    const classes = computed(() =>
        isChecked.value
            ? 'w-full h-full p-2 sm:p-4 bg-white border-[2px] border-[#4F44F0] rounded-md flex items-center justify-center shadow cursor-pointer'
            : 'w-full h-full p-2 sm:p-4 bg-[#F2F5F9] border-0 rounded-md flex items-center justify-center cursor-pointer'
    );

    const color = computed(() =>
        isChecked.value
            ? '#4F44F0'
            : '#747B84'
    );
</script>

<template>
    <label :for="value" class="relative" @click="handleClick">
        <input type="radio" :id="value" :name="name" class="absolute w-0 h-0 opacity-0" :checked="isChecked" />
        <div :class="classes">
            <CheckIcon :color="color" />
            <span class="pretendard-font font-medium text-sm sm:text-lg md:text-xl" :style="{ color: color }">{{labelText}}</span>
        </div>
        
    </label>
</template>