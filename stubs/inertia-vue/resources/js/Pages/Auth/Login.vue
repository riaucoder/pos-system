<script setup>
import Button from '@/Components/Button.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import Label from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="hero min-h-screen max-w-3xl">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl font-bold">Login now!</h1>
                    <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                </div>
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                    <form @submit.prevent="submit">
                        <div class="card-body">

                            <div class="form-control">
                                <Label for="email" value="Email" />
                                <Input v-model="form.email" autofocus id="email" type="text" placeholder="email" class="input-bordered" />
                                <InputError class="mt-1" :message="form.errors.email" />
                            </div>
                            <div class="form-control">
                                <Label for="password" value="password" />
                                <Input v-model="form.password" type="password" id="password" placeholder="password" class="input-bordered"/>
                                <InputError class="mt-1" :message="form.errors.password" />
                                <div class="block mt-2">
                                    <Link v-if="canResetPassword" :href="route('password.request')"  class="label-text-alt link link-hover">Forgot password?</Link>
                                </div>
                            </div>
                            <div class="form-control mt-6">
                                <Button :disabled="form.processing" type="submit" class="btn-primary">Login</Button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!--        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">-->
<!--            {{ status }}-->
<!--        </div>-->

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <Label for="email" value="Email" />-->
<!--                <Input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />-->
<!--                <InputError class="mt-2" :message="form.errors.email" />-->
<!--            </div>-->

<!--            <div class="mt-4">-->
<!--                <Label for="password" value="Password" />-->
<!--                <Input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />-->
<!--                <InputError class="mt-2" :message="form.errors.password" />-->
<!--            </div>-->

<!--            <div class="block mt-4">-->
<!--                <label class="flex items-center">-->
<!--                    <Checkbox name="remember" v-model:checked="form.remember" />-->
<!--                    <span class="ml-2 text-sm text-gray-600">Remember me</span>-->
<!--                </label>-->
<!--            </div>-->

<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">-->
<!--                    Forgot your password?-->
<!--                </Link>-->

<!--                <Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Log in-->
<!--                </Button>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
