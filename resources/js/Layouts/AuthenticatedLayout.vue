<script setup>
    import { ref, onMounted, onUnmounted } from 'vue';
    import { usePage } from '@inertiajs/vue3'
    import { Link } from '@inertiajs/vue3';

    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import ApplicationLogo2 from '@/Components/ApplicationLogo2.vue';
    import Dropdown from '@/Components/Dropdown.vue';
    import DropdownLink from '@/Components/DropdownLink.vue';
    import NavLink from '@/Components/NavLink.vue';
    import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

    const showingNavigationDropdown = ref(false);

    const headerClasses = ref(['bg-white', 'dark:bg-gray-800']); 

    const currentPath = window.location.pathname;
    // console.log('currentPath: ', currentPath);

    const path = usePage().props;
    console.log('path: ', path);

    if (currentPath === '/welcome') {
        // 메인 페이지
        headerClasses.value = ['bg-black', 'dark:bg-gray-100'];
    }else {
        headerClasses.value = ['bg-white', 'dark:bg-gray-800'];
    }

    // isActiveRoute 함수는 주어진 라우트 이름이 현재 라우트와 일치하는지 확인하고,
    // 현재 경로가 '/welcome'이 아닐 때도 참을 반환.
    const isActiveRoute = (routeName) => {
    // 여기서 route().current() 대신 실제 프로젝트에 맞는 경로 확인 로직을 사용.
    // 예: route.name === routeName
    return route.name === routeName && currentPath !== '/welcome';
    };
</script>

<template>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav :class="['w-full', ...headerClasses, 'border-b-[1px]', 'border-[#F4F6F9]/[30%]', 'dark:border-gray-700']">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center sm:mr-40">
                            <Link :href="route('welcome')">
                                <ApplicationLogo2 v-if="route().current('welcome')"
                                    class="block w-auto fill-current text-gray-800 dark:text-gray-200"
                                    nav-logo="true"
                                />
                                <ApplicationLogo v-else
                                    class="block w-auto fill-current text-gray-800 dark:text-gray-200"
                                    nav-logo="true"
                                />
                            </Link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:-my-px sm:flex">                                
                            <NavLink :href="route('chirps.index')" :active="route().current('chirps.index') && currentPath !== '/welcome'">
                                메시지
                            </NavLink>
                            <NavLink :href="route('credits.buy.index')" :active="route().current().includes('credits') && currentPath !== '/welcome'">
                                크레딧
                            </NavLink>
                        </div>
                    </div>

                    <div
                        v-if="$page.props.auth && $page.props.auth.user && $page.props.auth.user.name"
                        class="hidden sm:flex sm:items-center sm:ml-6"
                    >
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <svg
                                                class="ml-2 -mr-0.5 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <!-- <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink> -->
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        로그아웃
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                        >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex': !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex': showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
                :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                class="sm:hidden"
            >
                <div class="pt-2 pb-3 space-y-1">
                    <ResponsiveNavLink :href="route('chirps.index')" :active="route().current('chirps.index')">
                        메시지
                    </ResponsiveNavLink>     
                    <ResponsiveNavLink :href="route('credits.buy.index')" :active="route().current().includes('credits')">
                        크레딧
                    </ResponsiveNavLink>                                                                  
                </div>

                <!-- Responsive Settings Options -->
                <div 
                    v-if="$page.props.auth && $page.props.auth.user && $page.props.auth.user.name"
                    class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600"
                >
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink> -->
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                            로그아웃
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header :class="[ ...headerClasses ]" v-if="$slots.header">
            <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <slot />
        </main>          
    </div>
</template>
