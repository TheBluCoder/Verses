<script setup>
import SocialMediaIcons from '@/Components/SocialMediaIcons.vue';
import Header from '@/Components/Header/Header.vue';
import Footer from '@/Components/Footer/Footer.vue';
import { usePage } from '@inertiajs/vue3';
import BrandLogo from '@/Components/Header/BrandLogo.vue';
import FooterFilters from '@/Components/Footer/FooterFilters.vue';
import Sidebar from "@/Components/SideBar/Sidebar.vue";
// import Menu from '@/Components/SideBar/Sidebar.vue';

let isHomepage = usePage().component === 'Home';
</script>

<template>
    <div class="min-h-screen w-full rounded-lg bg-white p-6 shadow-lg md:px-12">
        <!-- Left-aligned Social Media Icons -->
        <social-media-icons />

        <div class="mb-12">
            <!-- Header -->
            <Sidebar/>
            <Header
                ><Link href="/"> <BrandLogo /></Link
            ></Header>

            <!-- Navigation -->
            <nav v-if="isHomepage" class="mb-6 hidden text-center md:block">
                <ul
                    class="flex justify-center gap-10 font-medium uppercase text-neutral-500"
                >
                    <li>
                        <a href="#" class="hover:text-neutral-950">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-neutral-950">Discover</a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <div class="md:m-auto md:w-3/4 lg:w-1/2 ml-14">
                <slot />
            </div>
        </div>

        <!-- Fixed Secondary Navigation (Bottom of Screen) -->
        <Footer>
            <FooterFilters :condition="isHomepage" />
        </Footer>
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
