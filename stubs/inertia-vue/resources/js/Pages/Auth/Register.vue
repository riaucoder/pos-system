<script setup>
import Button from '@/Components/Button.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import Label from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="hero min-h-screen max-w-4xl">
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
                                <Label for="name" value="Name" />
                                <Input id="name" type="text" class="input-bordered" v-model="form.name" required autofocus autocomplete="name" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="form-control">
                                <Label for="email" value="Email" />
                                <Input id="email" type="email" class="input-bordered" v-model="form.email" required autocomplete="username" />
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
                                <Button :disabled="form.processing" type="submit" class="btn-primary">Register new Account</Button>
                                <div class="divider">OR</div>
                                <Link :href="route('login')" class="btn">Back to Login</Link>
                            </div>
                            <div class="flex justify-between">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <Label for="name" value="Name" />-->
<!--                <Input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />-->
<!--                <InputError class="mt-2" :message="form.errors.name" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <Label for="email" value="Email" />-->
<!--                <Input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />-->
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
<!--                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">-->
<!--                    Already registered?-->
<!--                </Link>-->

<!--                <Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Register-->
<!--                </Button>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
