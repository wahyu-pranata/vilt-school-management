<template>
    <nav class="w-100 bg-slate-800 px-8 py-3 flex justify-between align-middle">
        <div>
            <h1 class="text-white text-2xl font-light"><span class="font-bold uppercase">VILT</span> Manager</h1>
        </div>
        <div>
            <p class="" v-if="!$page.props.auth.user"><Link href="/login" class="inline-block px-4 py-1 text-white border border-solid border-white rounded-md opacity-80 hover:opacity-100 hover:bg-white hover:text-slate-800 transition-all">Login</Link></p>
            <div class="flex space-x-2" v-else>
                <Link href="/dashboard" class="px-4 py-1 text-white opacity-80 hover:opacity-100 transition-all">Dashboard</Link>
                <form @submit.prevent="Inertia.post('/logout')">
                    <button type="submit" class="px-4 py-1 text-white border border-solid border-white rounded-md opacity-80 hover:opacity-100 hover:bg-white hover:text-slate-800 transition-all">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3"
import { Inertia } from "@inertiajs/inertia"
</script>
