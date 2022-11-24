<template>
    <Head title="Login Page"></Head>
    <Layout>
        <div class="flex relative">
            <section class="flex-1 px-4 py-6">
                <div class="text-center">
                    <h1 class="text-3xl text-slate-800 font-semibold">Login</h1>
                    <p class="text-sm text-slate-600 font-light mt-1">Access the beautiful of <span class="font-bold">VILT</span> app</p>
                    <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                </div>
                <form action="" class="mx-auto mt-2 p-4" @submit.prevent="submit">
                    <InputForm id="email" type="email" placeholder="example: johndoe@example.com" label-text="Email" v-model="form.email" />
                    <p class="text-xs font-bold text-rose-700 mb-3" v-if="errors.email">{{ errors.email }}</p>
                    <InputForm id="password" type="password" placeholder="tips: min. 8 character " label-text="Password" v-model="form.password"/>
                    <p class="text-xs font-bold text-rose-700 mb-3" v-if="errors.password">{{ errors.password }}</p>
                    <button type="submit">Login</button>
                    <p class="text-center font-light text-sm">Don't have an account? <Link href="/register" class="text-blue-600 font-medium">Register here!</Link></p>
                </form>
            </section>
            <section class="flex-1 bg-center no-repeat bg-cover h-[calc(100vh-48px)]" :style="bgImage"></section>
        </div>
    </Layout>

</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { computed } from "vue";
import Layout from './Layout/Layout.vue'
import InputForm from './Components/InputForm.vue'
import Flash from './Components/Flash.vue'

const props = defineProps({
    image: String,
    errors: Object
})
const bgImage = computed(() => {
    return `background-image: url('${props.image}')`
})
const form = useForm({
    email: null,
    password: null
})
function submit() {
    form.post('/login');
}
</script>

<style scoped>
button {
   @apply block mx-auto mb-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow hover:opacity-80 hover:scale-95 hover:shadow-md focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
}
</style>
