<script setup>
defineProps({ poem: { type: Object, required: true } });
</script>

<template>
    <div class="mb-14 border-b pb-2">
        <section>
            <h2
                class="text-2xl font-semibold text-neutral-950"
                v-text="poem?.title"
            ></h2>
            <p class="mt-4 text-lg font-light leading-relaxed text-neutral-700">
                <!--                It's a hard day <br />-->
                <!--                Mama would have been 81 today <br />-->
                <!--                I hoped against hope for a different result in this election-->
                <!--                <br />-->
                <!--                I thought about how she would be glad <br />-->
                <!--                A woman at last the leader of our land...-->
                {{ poem.content }}
            </p>

            <div>
                <a
                    href="#"
                    class="mt-4 inline-block font-medium text-purple-700"
                    >Read more</a
                >
            </div>

            <div class="flex text-center gap-4">
                <div class="my-2 rounded-full">
                    <img
                        :src="poem.author.profilePic"
                        alt="Random Image"
                        class="rounded-full"
                    />
                </div>
                <p class="self-center capitalize">{{ poem.author.username }}</p>
            </div>
        </section>
    </div>
</template>

<style scoped></style>
