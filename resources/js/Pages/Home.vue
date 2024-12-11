<script setup>
import GuestLayout from '@/Layouts/DefaultLayout.vue';
import Poems from '@/Components/Post/Poems.vue';
import HeaderButton from '@/Components/Header/HeaderButton.vue';
import { PlusCircleIcon } from '@heroicons/vue/24/outline/index.js';
import { inject } from 'vue';
import SearchBar from '@/Components/SearchBar.vue';

let props = defineProps({ poems: { type: Array } });
const guest = inject('guest');

defineOptions({ layout: GuestLayout });
</script>

<template>
    <!--    Set the title of the page-->
    <Head title="Home"></Head>

    <!--    Create button for making new poems-->
    <div>
        <Teleport defer to="#header_btn_section " v-if="!guest">
            <div class="align-items-center flex gap-x-2">
                <div>
                    <SearchBar />
                </div>
                <HeaderButton
                    as="button"
                    href="/posts/create"
                    class="cursor-pointer rounded-xl border bg-orange-600 py-1 font-semibold text-white"
                    ><div>Create</div>
                    <PlusCircleIcon class="w-6"
                /></HeaderButton>
            </div>
        </Teleport>
    </div>

    <!--    displays the poems fetched from the DB-->
    <poems :poems="props.poems"></poems>
</template>
