<script setup>
import InputError from '@/Components/forms/InputError.vue';
import InputLabel from '@/Components/forms/InputLabel.vue';
import TextInput from '@/Components/forms/TextInput.vue';
import Password from '@/Components/forms/Password.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineOptions({ layout: GuestLayout });

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    favoritePoem: '',
});

const handleSubmit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'confirmPassword'),
    });
};
</script>

<template>
    <div
        class="flex min-h-screen items-center justify-center bg-gradient-to-b from-gray-50 to-indigo-50 px-4 py-12 sm:px-6 lg:px-8"
    >
        <div class="w-full max-w-md">
            <Head title="Register" />

            <div class="mb-8 text-center">
                <h2 class="mb-2 font-serif text-4xl text-gray-900">
                    Join Verses
                </h2>
                <p class="italic text-gray-600">
                    "Where every word takes flight"
                </p>
            </div>

            <div
                class="rounded-lg border border-gray-100 bg-white p-8 shadow-lg"
            >
                <form @submit.prevent="handleSubmit" class="space-y-6">
                    <!-- Pen Name -->
                    <div>
                        <InputLabel for="penName">Pen Name</InputLabel>
                        <TextInput
                            autofocus
                            v-model="form.username"
                            id="penName"
                            name="penName"
                            placeholder="Enter your pen name"
                        />
                        <InputError :message="form.errors.username" />
                    </div>

                    <!-- Email -->
                    <div>
                        <InputLabel for="email">Email</InputLabel>
                        <TextInput
                            v-model="form.email"
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter email"
                        />
                        <InputError :message="form.errors.email" />
                    </div>

                    <!-- Password -->
                    <div>
                        <InputLabel for="password">Password</InputLabel>
                        <Password
                            :disabled="true"
                            v-model="form.password"
                            id="password"
                            name="password"
                            placeholder="Enter password"
                        />
                        <InputError :message="form.errors.password" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <InputLabel for="confirmPassword"
                            >Confirm Password</InputLabel
                        >
                        <Password
                            v-model="form.password_confirmation"
                            id="confirmPassword"
                            name="password_confirmation"
                            placeholder="Re-enter password"
                        />
                        <InputError
                            :message="form.errors.password_confirmation"
                        />
                    </div>

                    <!-- Favorite Poem -->
                    <div>
                        <InputLabel for="favoritePoem"
                            >Favorite Poem (Optional)</InputLabel
                        >
                        <textarea
                            v-model="form.favoritePoem"
                            id="favoritePoem"
                            rows="3"
                            class="mt-1 block w-full resize-none rounded-lg border border-gray-200 px-4 py-2 font-light text-gray-700 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            placeholder="Share a verse that moves you..."
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full transform rounded-lg border border-transparent bg-purple-600 px-4 py-3 font-serif text-sm tracking-wide text-white shadow-sm transition-all duration-300 hover:scale-[1.02] hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Begin Your Poetic Journey
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
