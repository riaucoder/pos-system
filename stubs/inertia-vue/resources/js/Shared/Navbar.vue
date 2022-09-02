<template>
    <div class="navbar bg-base-200 h-20 flex justify-between md:justify-end border-b-2 border-primary">
        <div class="flex-1 lg:hidden">
            <label for="my-drawer-2" class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </label>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://placeimg.com/80/80/people" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a class="justify-between">{{ $page.props.auth.user.name}}</a></li>
                    <li><Link :href="route('logout')" as="button" method="post">Logout</Link></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>

import {Link} from "@inertiajs/inertia-vue3";
</script>

