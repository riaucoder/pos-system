<script setup>
import Button from '@/Components/Button.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import Label from '@/Components/Label.vue';
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="hero min-h-screen max-w-3xl">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl font-bold">Reset password!</h1>
                    <p class="py-6">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                    </p>
                </div>
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                    <form @submit.prevent="submit">
                        <div class="card-body">

                            <div class="form-control">
                                <Label for="email" value="Email" />
                                <Input autofocus  v-model="form.email" id="email" type="text" placeholder="email" class="input-bordered" />
                                <InputError class="mt-1" :message="form.errors.email" />
                            </div>
                            <div class="form-control mt-6">
                                <Button :disabled="form.processing" type="submit" class="btn-primary">Email Password Reset Link </Button>
                                <div class="divider">OR</div>
                                <Link :href="route('login')" class="btn">Back to Login</Link>
                                <Link :href="route('register')" class="btn btn-info mt-2">Register new Account</Link>
                            </div>
                            <div class="flex justify-between">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!--        <div class="mb-4 text-sm text-gray-600">-->
<!--        </div>-->

<!--        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">-->
<!--            {{ status }}-->
<!--        </div>-->

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <Label for="email" value="Email" />-->
<!--                <Input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />-->
<!--                <InputError class="mt-2" :message="form.errors.email" />-->
<!--            </div>-->

<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Email Password Reset Link-->
<!--                </Button>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
