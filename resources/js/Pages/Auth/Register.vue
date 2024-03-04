<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import TextInput from '@/Components/TextInput.vue';
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';

    const form = useForm({
        user_id: '',
        name: '',
        email: '',
        phone: '',
        password: '',
        password_confirmation: '',
        terms: false,
    });

    const submit = () => {
        // 로그인 폼 데이터 출력
        // console.log('Form Data: ' + JSON.stringify(form.data(), null, 2));

        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };

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
        form.phone = tmp; // Update the form.phone directly with formatted value
    };
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col sm:justify-center items-center pt-20 sm:pt-36 pb-12 sm:pb-20 bg-gray-100 dark:bg-gray-900">
            <div>
                <Link href="/">
                    <ApplicationLogo class="fill-current text-gray-500" nav-logo="false" />
                </Link>
            </div>

            <div
                class="w-full sm:max-w-lg mt-10 sm:mt-14 px-5 sm:px-8 dark:bg-gray-800 overflow-hidden"
            >
                <Head title="Register" />

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="이름" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 sm:mt-3 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            placeholder="이름을 입력해 주세요."
                        />

                        <InputError class="mt-1 sm:mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4 sm:mt-12">
                        <InputLabel for="user_id" value="아이디" />

                        <TextInput
                            id="user_id"
                            type="text"
                            class="mt-1 sm:mt-3 block w-full"
                            v-model="form.user_id"
                            placeholder="8자 이상, 영문 혹은 영문과 숫자조합"
                        />

                        <InputError class="mt-1 sm:mt-2" :message="form.errors.user_id" />
                    </div>

                    <div class="mt-4 sm:mt-12">
                        <InputLabel for="email" value="이메일" />

                        <TextInput
                            id="email"
                            type="text"
                            class="mt-1 sm:mt-3 block w-full"
                            v-model="form.email"
                            placeholder="이메일을 입력해주세요."
                        />

                        <InputError class="mt-1 sm:mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4 sm:mt-12">
                        <InputLabel for="phone" value="전화번호" />

                        <TextInput
                            id="phone"
                            type="text"
                            class="mt-1 sm:mt-3 block w-full"
                            v-model="form.phone"
                            placeholder="숫자만 입력해주세요."
                            maxlength="13"
                            @input="event => formatCellPhone(event.target.value)"
                        />

                        <InputError class="mt-1 sm:mt-2" :message="form.errors.phone" />
                    </div>

                    <div class="mt-4 sm:mt-12">
                        <InputLabel for="password" value="비밀번호" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 sm:mt-3 block w-full"
                            v-model="form.password"
                            required
                            placeholder="비밀번호를 입력해 주세요."
                        />

                        <InputError class="mt-1 sm:mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4 sm:mt-12">
                        <InputLabel for="password_confirmation" value="비밀번호 확인" />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 sm:mt-3 block w-full"
                            v-model="form.password_confirmation"
                            required
                            placeholder="비밀번호를 입력해 주세요."
                        />

                        <InputError class="mt-1 sm:mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <div class="my-4 sm:my-12 border-[#DEDEDE] border-y-[1px] py-4 sm:py-10 flex items-center">

                        <Checkbox
                            id="terms"
                            v-model="form.terms"
                            required
                            labelText="모든 약관에 동의합니다."
                        />             

                        <InputError class="mt-1 sm:mt-2" :message="form.errors.terms" />
                    </div>

                    <div class="flex items-center justify-end mt-2 sm:mt-4">              
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            가입하기
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>        
    </AuthenticatedLayout>
</template>
