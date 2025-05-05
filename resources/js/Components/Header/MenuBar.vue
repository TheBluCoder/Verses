<script>
import Hamburger from '@/Components/Header/Hamburger.vue';
import { defineAsyncComponent } from 'vue';
export default {
    name: 'MenuBar',
    components: {
        Hamburger,
        DropDownList: defineAsyncComponent(
            () => import('@/Components/Header/DropDownList.vue'),
        ),
    },

    data() {
        return {
            toggleMenu: false,
        };
    },
};
</script>

<template>
    <!--    <Teleport to="body">-->
    <div
        :class="{
            'z-40 rounded border border-gray-300 text-sm font-medium drop-shadow-lg':
                toggleMenu,
        }"
        class="absolute right-1 top-5 w-1/5 divide-y divide-gray-300 text-center"
    >
        <div
            :class="{
                'bg-inherit} m-auto transition-colors duration-300': true,
                'bg-white hover:bg-gray-100': toggleMenu,
            }"
        >
            <Hamburger @animate="toggleMenu = $event" class="" />
        </div>

        <Transition
            class=""
            enter-active-class="transition-transform duration-500"
            enter-from-class="translate-x-full"
            enter-to-class="translate-x-0 "
            leave-active-class="transition-transform duration-400"
            leave-from-class="translate-x-0"
            leave-to-class="translate-x-[500px]"
        >
            <div v-if="toggleMenu" class="">
                <DropDownList />
            </div>
        </Transition>
    </div>
    <!--    </Teleport>-->
</template>

<style scoped></style>
