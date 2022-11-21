<template>
    <Head title="Login Page"></Head>
    <Layout>
        <div class="flex">
            <section class="flex-1 px-4 py-6">
                <div class="text-center">
                    <h1 class="text-3xl text-slate-800 font-semibold">Login</h1>
                    <p class="text-sm text-slate-600 font-light mt-1">Access the beautiful of <span class="font-bold">VILT</span> app</p>
                </div>
                <form action="" class="mx-auto mt-2 p-4">
                    <InputForm id="email" type="email" placeholder="example: johndoe@example.com" label-text="Email" />
                    <InputForm id="password" type="password" placeholder="tips: min. 8 character " label-text="Password"/>
                    <button>Register</button>
                    <p class="text-center font-light text-sm">Don't have an account? <Link href="/register" class="text-blue-600 font-medium">Register here!</Link></p>
                </form>
            </section>
            <section class="flex-1 bg-center no-repeat bg-cover h-[calc(100vh-48px)]" :style="bgImage"></section>
        </div>
    </Layout>

</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import { computed } from "vue";
import Layout from './Layout/Layout.vue'
import InputForm from './Components/InputForm.vue'

const props = defineProps(['image'])
const bgImage = computed(() => {
    return `background-image: url('${props.image}')`
})
</script>

<style scoped>
button {
   @apply block mx-auto mb-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow hover:opacity-80 hover:scale-95 hover:shadow-md focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
}
</style>
