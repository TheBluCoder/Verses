<script setup>
import Checkbox from '@/Components/forms/Checkbox.vue';
import GuestLayout from '@/Layouts/DefaultLayout.vue';
import InputError from '@/Components/forms/InputError.vue';
import InputLabel from '@/Components/forms/InputLabel.vue';
import TextInput from '@/Components/forms/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Password from '@/Components/forms/Password.vue';

defineOptions({ layout: GuestLayout });

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div>
        <Head title="Login" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <div class="bg-gray-50 font-[sans-serif] drop-shadow-lg">
            <div
                class="flex min-h-screen flex-col items-center justify-center px-4 py-6"
            >
                <div class="w-full max-w-md lg:max-w-xl">
                    <div class="rounded-2xl bg-white p-8 shadow">
                        <h2
                            class="text-center text-2xl font-bold text-gray-800"
                        >
                            Sign in
                        </h2>
                        <form
                            class="mt-8 space-y-4"
                            @submit.prevent="submit"
                            id="loginForm"
                        >
                            <div>
                                <InputLabel for="email"
                                    >Email</InputLabel
                                >
                                <TextInput
                                    autofocus
                                    v-model="form.email"
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Enter email"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="#bbb"
                                        stroke="#bbb"
                                        class="absolute right-4 h-4 w-4"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            cx="10"
                                            cy="7"
                                            r="6"
                                            data-original="#000000"
                                        ></circle>
                                        <path
                                            d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                            data-original="#000000"
                                        ></path>
                                    </svg>
                                </TextInput>
                                <InputError
                                    :message="form.errors.email"
                                ></InputError>
                            </div>

                            <div>
                                <InputLabel for="password">Password</InputLabel>
                                <Password v-model="form.password"></Password>

                                <InputError
                                    :message="form.errors.password"
                                ></InputError>
                            </div>

                            <div>
                                <input-error
                                    v-if="form.errors.credentials"
                                    :message="form.errors.credentials"
                                ></input-error>
                            </div>

                            <div
                                class="flex flex-wrap items-center justify-between gap-4"
                            >
                                <label class="flex items-center">
                                    <Checkbox
                                        name="remember"
                                        v-model:checked="form.remember"
                                    />
                                    <span class="ms-2 text-sm text-gray-600"
                                        >Remember me</span
                                    >
                                </label>

                                <div class="text-sm">
                                    <a
                                        href="javascript:void(0);"
                                        class="font-semibold text-blue-600 hover:underline"
                                    >
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>

                            <div class="!mt-8">
                                <button
                                    form="loginForm"
                                    type="submit"
                                    class="w-full rounded-lg bg-blue-600 px-4 py-3 text-sm tracking-wide text-white hover:bg-blue-700 focus:outline-none"
                                >
                                    Sign in
                                </button>
                            </div>
                            <p class="!mt-8 text-center text-sm text-gray-800">
                                Don't have an account?
                                <Link
                                    href="create-account"
                                    class="ml-1 whitespace-nowrap font-semibold text-blue-600 hover:underline"
                                    >Register here</Link
                                >
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
