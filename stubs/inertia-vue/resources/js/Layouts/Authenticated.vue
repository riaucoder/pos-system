<script setup>
import { ref } from 'vue';
import Navbar from "@/Shared/Navbar.vue";
import Sidebar from "@/Shared/Sidebar.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="drawer drawer-mobile">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <Navbar />
            <!-- Page content here -->
            <div class="w-full">
                <slot/>
            </div>

        </div>
        <Sidebar/>
    </div>
</template>
