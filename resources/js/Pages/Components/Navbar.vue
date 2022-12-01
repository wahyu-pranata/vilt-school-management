<template>
    <header class="w-100">
        <nav class="bg-slate-800 px-8 py-3 flex justify-between align-middle">
            <div>
                <h1 class="text-white text-2xl font-light"><Link href="/"><span class="font-bold uppercase">VILT</span> Manager</Link></h1>
            </div>
            <div>
                <p v-if="!$page.props.auth.user"><Link href="/login" class="inline-block px-4 py-1 text-white border border-solid border-white rounded-md opacity-80 hover:opacity-100 hover:bg-white hover:text-slate-800 transition-all">Login</Link></p>
                <div class="flex space-x-2" v-else>
                    <Link href="/dashboard" class="px-4 py-1 text-white/80 hover:text-white transition-all" v-if="$page.props.auth.user.is_admin === 1">Dashboard</Link>
                    <form @submit.prevent="Inertia.post('/logout')">
                        <button type="submit" class="px-4 py-1 text-white border border-solid border-white rounded-md opacity-80 hover:opacity-100 hover:bg-white hover:text-slate-800 transition-all">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <nav class="bg-slate-700 text-white px-8 py-1" v-if="$page.props.url.includes('dashboard')">
            <ul class="flex space-x-4">
                <li><Link href="/dashboard/student" class="text-white/80 hover:text-white font-light">Student</Link></li>
                <li><Link href="/dashboard/group" class="text-white/80 hover:text-white font-light">Group</Link></li>
                <li><Link href="/dashboard/subject" class="text-white/80 hover:text-white font-light">Subject</Link></li>
                <li><Link href="/dashboard/teacher" class="text-white/80 hover:text-white font-light">Teacher</Link></li>
                <li><Link href="#" class="text-white/80 hover:text-white font-light">Grade</Link></li>
            </ul>
        </nav>
    </header>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3"
import { Inertia } from "@inertiajs/inertia"

</script>
