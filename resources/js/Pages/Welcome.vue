<template>
    <div
        class="flex min-h-screen w-screen flex-col justify-between rounded-lg bg-white p-6 shadow-lg"
    >
        <!-- Left-aligned Social Media Icons -->
        <div
            class="fixed left-0 top-1/2 flex -translate-y-1/2 flex-col gap-4 rounded-r-lg bg-white p-2 shadow-md"
        >
            <i
                class="fa-brands fa-twitter text-2xl text-neutral-500 hover:text-purple-700"
            ></i>
            <i
                class="fa-brands fa-instagram text-2xl text-neutral-500 hover:text-purple-700"
            ></i>
            <i
                class="fa-brands fa-pinterest text-2xl text-neutral-500 hover:text-purple-700"
            ></i>
        </div>

        <div>
            <!-- Header -->
            <header class="mb-6 flex items-center justify-between">
                <h1 class="font-title text-3xl text-neutral-950">
                    Poetry Social
                </h1>
                <div class="flex items-center gap-4">
                    <button
                        class="rounded-md bg-purple-700 px-6 py-2 font-bold text-white"
                    >
                        Get started
                    </button>
                    <button
                        class="rounded-md border border-purple-700 px-6 py-2 font-medium text-purple-700"
                    >
                        Login
                    </button>
                </div>
            </header>

            <!-- Navigation -->
            <nav class="mb-6 text-center">
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
            <div class="m-auto w-1/2 border-b">
                <section class="mb-6 text-center">
                    <h2 class="text-2xl font-semibold text-neutral-950">
                        Demagogue (for my late mother on her birthday)
                    </h2>
                    <p
                        class="mt-4 text-lg font-light leading-relaxed text-neutral-700"
                    >
                        It's a hard day <br />
                        Mama would have been 81 today <br />
                        I hoped against hope for a different result in this
                        election
                        <br />
                        I thought about how she would be glad <br />
                        A woman at last the leader of our land...
                    </p>
                    <a
                        href="#"
                        class="mt-4 inline-block font-medium text-purple-700"
                        >Read more</a
                    >
                </section>
            </div>
        </div>

        <!-- Footer -->
        <!--        <footer class="mt-8 text-center text-sm text-neutral-500">-->
        <!--            <p>&copy; 2023 Poetry Social</p>-->
        <!--        </footer>-->

        <!-- Fixed Secondary Navigation (Bottom of Screen) -->
        <footer class="fixed bottom-0 left-0 right-0">
            <div
                class="py flex justify-center gap-8 bg-white text-base font-medium uppercase"
            >
                <span class="cursor-pointer border-b-2 text-purple-700"
                    >Recent</span
                >
                <span
                    class="cursor-pointer text-neutral-400 hover:text-neutral-950"
                    >Top Poems</span
                >
            </div>

            <p class="m-2 text-center text-xs text-gray-500">&copy; 2023 Poetry Social</p>
        </footer>
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
