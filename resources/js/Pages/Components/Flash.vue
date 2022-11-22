<template>
    <div v-if="isShowed" :class="variant"><slot></slot><span @click="isShowed = false">&times;</span></div>
</template>

<script setup>
import { ref } from "vue"
defineProps(['variant'])
let isShowed = ref(true)
</script>

<style scoped>
div {
    @apply relative w-full p-2 mt-2 font-bold text-xs border-2 border-solid rounded
}
div span {
    @apply absolute top-0 right-2 text-slate-800 text-2xl cursor-pointer
}
.info {
    @apply bg-sky-400/60 text-slate-800 border-sky-800
}
.error {
    @apply bg-rose-400/60 text-slate-800 border-rose-800
}
</style>
