<template>
    <Head title="Register Page"></Head>
    <Layout>
        <div class="flex">
            <section class="flex-1 bg-center no-repeat bg-cover h-[calc(100vh-48px)]" :style="bgImage"></section>
            <section class="flex-1 px-4 py-6">
                <div class="text-center">
                    <h1 class="text-3xl text-slate-800 font-semibold">Register</h1>
                    <p class="text-sm text-slate-600 font-light mt-1">Create a free <span class="font-bold">VILT</span> account</p>
                </div>
                <form action="" class="mx-auto mt-2 p-4">
                    <div class="mb-3">
                        <label for="email" class="text-left">Email</label>
                        <input type="email" id="email" placeholder="example: yourname@example.com">
                    </div>
                    <div class="mb-3 flex space-x-3">
                        <div class="flex-1">
                            <label for="first-name" class="text-left">First Name</label>
                            <input type="text" id="first-name" placeholder="example: John">
                        </div>
                        <div class="flex-1">
                            <label for="last-name" class="text-left">Last Name</label>
                            <input type="text" id="last-name" placeholder="example: Doe">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="text-left">Username</label>
                        <input type="text" id="username" placeholder="example: john_doe">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-left">Password</label>
                        <input type="password" id="password" placeholder="tips: have at least 8 characters">
                    </div>
                    <div class="mb-3">
                        <label for="conf-password" class="text-left">Confirm Password</label>
                        <input type="password" id="conf-password" placeholder="same as previous password typed">
                    </div>
                    <button class="block mx-auto px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow hover:opacity-80 hover:scale-95 hover:shadow-md focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Register</button>
                    <p class="text-center font-light text-sm">Already have an account? <Link href="/login">Login here!</Link></p>
                </form>
            </section>
        </div>

    </Layout>

</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from './Layout/Layout.vue'
import {computed} from "vue";

const props = defineProps(['image'])
const bgImage = computed(() => {
    return `background-image: url('${props.image}')`
})


</script>

<style scoped>
label {
    @apply after:content-['*'] after:ml-0.5 after:text-rose-600 after:text-xs
}
input {
    @apply block w-full mt-2 px-2 py-1 font-normal font-light text-sm border border-solid border-slate-600 rounded transition focus:outline-none focus:border-sky-700
}
</style>
