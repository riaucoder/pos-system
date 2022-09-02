<script setup>
import { computed } from 'vue';
import Button from '@/Components/Button.vue';
import GuestLayout from '@/Layouts/Guest.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="hero min-h-screen max-w-5xl">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl font-bold">Verify Email</h1>
                    <p class="py-6">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </p>
                </div>
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">

                    <form @submit.prevent="submit">
                        <div class="card-body">
                            <div class="alert alert-success shadow-lg" v-if="verificationLinkSent">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>A new verification link has been sent to the email address you provided during registration.</span>
                                </div>
                            </div>
                            <div class="form-control mt-6">
                                <Button :disabled="form.processing" type="submit" class="btn-primary">Resend Verification Email</Button>
                                <div class="divider">OR</div>

                                <Link :href="route('logout')" :disabled="form.processing" method="post" as="button" class="btn btn-error">Log Out</Link>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!--        <div class="mb-4 text-sm text-gray-600">-->
<!--            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.-->
<!--        </div>-->

<!--        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent" >-->
<!--            A new verification link has been sent to the email address you provided during registration.-->
<!--        </div>-->

<!--        <form @submit.prevent="submit">-->
<!--            <div class="mt-4 flex items-center justify-between">-->
<!--                <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--                    Resend Verification Email-->
<!--                </Button>-->

<!--                <Link :href="route('logout')" method="post" as="button" class="underline text-sm text-gray-600 hover:text-gray-900">Log Out</Link>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
