<template>
    <main>
        <header class="flex w-100 justify-center space-x-4 bg-sky-600 py-3">
            <Link href="/" class="text-white opacity-80 hover:opacity-100">Home</Link>
            <Link href="/about" class="text-white opacity-80 hover:opacity-100">About</Link>
            <Link href="/login" class="text-white opacity-80 hover:opacity-100">Login</Link>
        </header>
        <main class="px-4 py-2">
            <slot/>
        </main>
    </main>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'
</script>
