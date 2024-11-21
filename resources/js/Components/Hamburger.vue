<script>
export default {
    data() {
        return {
            animate: false,
        };
    },
    emits: ['animate'],
};
</script>

<template>
    <div class="">
        <button
            class="w-full py-3"
            @click="
                () => {
                    animate = !animate;
                    $emit('animate', animate);
                }
            "
        >
            <span
                :class="{
                    'm-auto mb-1 block h-[2px] w-6 bg-gray-900 duration-300': true,
                    'w-[18px] translate-y-[6px] rotate-45 bg-purple-500 transition-transform':
                        animate,
                }"
                v-show="true"
            ></span>

            <span
                :class="{
                    'm-auto mb-1 block h-[2px] w-6 bg-gray-900 duration-300': true,
                    'transition-display hidden': animate,
                }"
                v-show="true"
            ></span>

            <span
                :class="{
                    'm-auto block h-[2px] w-6 bg-gray-900 duration-300': true,
                    'w-[18px] -rotate-45 bg-purple-500 transition-transform':
                        animate,
                }"
                v-show="true"
            ></span>
        </button>
    </div>
</template>
