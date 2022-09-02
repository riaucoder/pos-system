<script setup>
import Button from '@/Components/Button.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import Label from '@/Components/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    })
};
</script>

<template>
    <GuestLayout>
        <Head title="Confirm Password" />

        <div class="hero min-h-screen max-w-5xl">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl font-bold">Confirm Password</h1>
                    <p class="py-6">This is a secure area of the application. Please confirm your password before continuing.</p>
                </div>
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">

                    <form @submit.prevent="submit">
                        <div class="card-body">
                            <div class="form-control">
                                <Label for="password" value="Password" />
                                <Input id="password" type="password" class="input-bordered" v-model="form.password" required autocomplete="current-password" autofocus />
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>
                            <div class="form-control mt-6">
                                <Button :disabled="form.processing" type="submit" class="btn-primary">Confirm</Button>
                                <div class="divider">OR</div>

                                <Link :href="route('logout')" :disabled="form.processing" method="post" as="button" class="btn btn-error">Log Out</Link>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!--        <div class="mb-4 text-sm text-gray-600">-->
<!--            This is a secure area of the application. Please confirm your password before continuing.-->
<!--        </div>-->

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <Label for="password" value="Password" />-->
<!--                <Input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />-->
<!--                <InputError class="mt-2" :message="form.errors.password" />-->
<!--            </div>-->

<!--            <div class="flex justify-end mt-4">-->
<!--                <Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Confirm-->
<!--                </Button>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
