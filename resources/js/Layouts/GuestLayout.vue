<script setup>
import SocialMediaIcons from '@/Components/SocialMediaIcons.vue';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { usePage } from '@inertiajs/vue3';
import BrandLogo from '@/Components/BrandLogo.vue';
import FooterFilters from '@/Components/FooterFilters.vue';

let isHomepage = usePage().component === 'Home';
</script>

<template>
    <div
        class="flex min-h-screen w-full flex-col justify-between rounded-lg bg-white p-6 shadow-lg md:px-12"
    >
        <!-- Left-aligned Social Media Icons -->
        <social-media-icons />

        <div class="mb-12">
            <!-- Header -->
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
            <div class="m-auto md:w-3/4 lg:w-1/2">
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
