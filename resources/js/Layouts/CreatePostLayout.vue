<script setup>
import SocialMediaIcons from '@/Components/SocialMediaIcons.vue';
import Header from '@/Components/Header/Header.vue';
import Footer from '@/Components/Footer/Footer.vue';
import { usePage } from '@inertiajs/vue3';
import BrandLogo from '@/Components/Header/BrandLogo.vue';
import PostFilters from '@/Components/Footer/PostFilters.vue';
import Sidebar from '@/Components/Navigation/Sidebar.vue';
import BottomBar from '@/Components/Navigation/BottomBar.vue';
import { computed } from 'vue';
// import Menu from '@/Components/Navigation/Sidebar.vue';

let isHomepage = computed(() => usePage().component === 'Home');
</script>

<template>
    <div class="min-h-screen w-full rounded-lg bg-white p-2 md:p-3 lg:p-6 shadow-lg md:px-12">
        <!-- Left-aligned Social Media Icons -->
        <social-media-icons />

        <div class="mb-12">
            <!-- Header -->
            <Sidebar />
            <Header>
                <Link href="/">
                    <BrandLogo />
                </Link>
            </Header>

            <!-- Main Content -->
            <div class="md:m-auto md:w-3/4">
                <slot />
            </div>
        </div>

        <!-- Fixed Secondary Navigation (Bottom of Screen) -->
        <Footer class="hidden md:block">
            <PostFilters :condition="isHomepage" />
        </Footer>
        <BottomBar></BottomBar>
    </div>
</template>

<script>
export default {
    name: 'PoetrySocial',
};
</script>

<style scoped>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
@import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

.font-title {
    font-family: 'Lato', sans-serif;
}

.shadow-t {
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
}
</style>
