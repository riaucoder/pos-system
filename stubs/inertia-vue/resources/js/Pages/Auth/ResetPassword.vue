<script setup>
import Button from '@/Components/Button.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import Label from '@/Components/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Reset Password" />


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
                                <Input id="email" type="email" class="input-bordered" v-model="form.email" required autofocus autocomplete="username" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="form-control">
                                <Label for="password" value="Password" />
                                <Input id="password" type="password" class="input-bordered" v-model="form.password" required autocomplete="new-password" />
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <div class="form-control">
                                <Label for="password_confirmation" value="Confirm Password" />
                                <Input id="password_confirmation" type="password" class="input-bordered" v-model="form.password_confirmation" required autocomplete="new-password" />
                                <InputError class="mt-2" :message="form.errors.password_confirmation" />
                            </div>

                            <div class="form-control mt-6">
                                <Button :disabled="form.processing" type="submit" class="btn-primary">Reset Password</Button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <Label for="email" value="Email" />-->
<!--                <Input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />-->
<!--                <InputError class="mt-2" :message="form.errors.email" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <Label for="password" value="Password" />-->
<!--                <Input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />-->
<!--                <InputError class="mt-2" :message="form.errors.password" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <Label for="password_confirmation" value="Confirm Password" />-->
<!--                <Input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />-->
<!--                <InputError class="mt-2" :message="form.errors.password_confirmation" />-->
<!--            </div>-->

<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Reset Password-->
<!--                </Button>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
