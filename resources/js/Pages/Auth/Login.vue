<script setup>
    import Checkbox from '@/Components/Checkbox.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextLoginInput from '@/Components/TextLoginInput.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';

    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import TextField from '@mui/material/TextField'; 

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        user_id: '',
        password: '',
        remember: false,
    });

    const submit = () => {
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col sm:justify-center items-center pt-20 sm:pt-36 pb-12 sm:pb-20 bg-gray-100 dark:bg-gray-900">
            <div>
                <Link href="/">
                    <ApplicationLogo class="fill-current text-gray-500" nav-logo="false"/>
                </Link>
            </div>

            <div
                class="w-full sm:max-w-lg mt-8 sm:mt-14 px-5 sm:px-8 dark:bg-gray-800 overflow-hidden"
            >
                <Head title="Log in" />

                <div v-if="status" class="mb-4 pretendard-font font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <TextLoginInput
                            id="user_id"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.user_id"
                            required
                            autofocus
                            autocomplete="user_id"
                            iconType="user"
                            placeholder="아이디를 입력해주세요"
                        />

                        <InputError class="mt-2" :message="form.errors.user_id" />
                    </div>

                    <div class="mt-4">
                        <TextLoginInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="password"
                            iconType="lock"
                            placeholder="비밀번호(영문, 숫자, 특수문자 포함 8~30자)"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4 sm:mt-7 mb-4 sm:mb-8 flex justify-between">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember" labelText="아이디 저장" />
                        </label>
                        <label class="flex items-center">
                            <Link
                                href="#"
                                class="pretendard-font text-sm sm:text-base text-[#1C1C1C] dark:text-gray-400 hover:text-gray-5-00 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            >
                                아이디 찾기
                            </Link>
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="
                                    pretendard-font text-sm sm:text-base text-[#1C1C1C]
                                    dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-100 
                                    rounded-md focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-transparent dark:focus:ring-offset-gray-800
                                    ml-4 pl-4 relative before:content-[''] before:absolute before:left-0 before:w-[1px] before:h-4 before:top-1/2 before:transform before:-translate-y-1/2 before:bg-[#A2A2A2]
                                    "
                            >
                                비밀번호 찾기
                            </Link>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">               
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            로그인
                        </PrimaryButton>
                    </div>

                    <div class="flex items-center justify-center mt-5 sm:mt-8">
                        <span
                            class="pretendard-font font-medium text-sm sm:text-base text-[#1C1C1C]"
                        >계정이 없으신가요?</span>
                        <Link 
                            :href="route('register')"
                            class="pretendard-font font-medium text-sm sm:text-base text-[#5146F0] underline ml-1"
                        >회원가입하기</Link>
                    </div>
                </form>
            </div>
        </div>        
    </AuthenticatedLayout>
</template>
