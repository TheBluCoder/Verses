<script setup>
import GuestLayout from '@/Layouts/DefaultLayout.vue';
import Poems from '@/Components/Post/Poems.vue';
import HeaderButton from '@/Components/Header/HeaderButton.vue';
import { inject } from 'vue';

let props = defineProps({ poems: { type: Object } });
const guest = inject('guest');

defineOptions({ layout: GuestLayout });
</script>

<template>
    <Head title="Home"></Head>
    <div>
        <!-- Navigation -->
        <nav class="mb-6 hidden text-center md:block">
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
    </div>
    <div>
        <Teleport defer to="#header_btn_section " v-if="!guest">
            <HeaderButton
                as="button"
                href="/posts/create"
                class="cursor-pointer rounded-xl border bg-orange-600 px-2 py-1 font-semibold text-white"
                >Create</HeaderButton
            >
        </Teleport>
    </div>
    <poems :poems="props.poems"></poems>
</template>
