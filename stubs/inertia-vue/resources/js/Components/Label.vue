<script setup>
defineProps(['value']);
</script>

<template>
    <label class="label">
        <span class="label-text" v-if="value">{{ value }}</span>
        <span class="label-text" v-else><slot /></span>
    </label>
</template>
