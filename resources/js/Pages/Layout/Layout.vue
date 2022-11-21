<template>
    <main>
        <nav class="w-100 bg-slate-800 py-3">
            <ul class="flex justify-center space-x-4">
                <li><Link href="/" class="text-white opacity-80 hover:opacity-100">Home</Link></li>
                <li><Link href="/about" class="text-white opacity-80 hover:opacity-100">About</Link></li>
                <li><Link href="/login" class="text-white opacity-80 hover:opacity-100">Login</Link></li>
            </ul>
        </nav>
        <main>
            <slot/>
        </main>
    </main>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'
</script>
