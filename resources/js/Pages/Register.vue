<template>
    <Head title="Register Page"></Head>
    <Layout>
        <div class="flex" @submit.prevent="submit">
            <section class="flex-1 bg-center no-repeat bg-cover h-[calc(100vh-48px)]" :style="bgImage"></section>
            <section class="flex-1 px-4 py-6">
                <div class="text-center">
                    <h1 class="text-3xl text-slate-800 font-semibold">Register</h1>
                    <p class="text-sm text-slate-600 font-light mt-1">Create a free <span class="font-bold">VILT</span> account</p>
                </div>
                <form action="" class="mx-auto mt-2 p-4">
                    <InputForm id="email" type="email" placeholder="example: johndoe@example.com" label-text="Email" v-model="form.email"/>
                    <div class="flex space-x-3">
                        <InputForm id="first-name" type="text" placeholder="example: John" label-text="First Name" class="flex-1" v-model="form.first_name"/>
                        <InputForm id="last-name" type="text" placeholder="example: Doe" label-text="Last Name" class="flex-1" v-model="form.last_name"/>
                    </div>
                    <InputForm id="password" type="password" placeholder="tips: have at least 8 characters" label-text="Password" v-model="form.password"/>
                    <InputForm id="conf-password" type="password" placeholder="same as previous typed password" label-text="Confirm Password" v-model="form.password_confirmation"/>
                    <button class="block mx-auto px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow hover:opacity-80 hover:scale-95 hover:shadow-md focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150">Register</button>
                    <p class="text-center font-light text-sm">Already have an account? <Link href="/login" class="text-blue-600 font-medium">Login here!</Link></p>
                </form>
            </section>
        </div>

    </Layout>

</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { computed } from "vue";
import Layout from './Layout/Layout.vue'
import InputForm from './Components/InputForm.vue'

const props = defineProps(['image'])
const bgImage = computed(() => {
    return `background-image: url('${props.image}')`
})
const form = useForm({
    email: null,
    first_name: null,
    last_name: null,
    password: null,
    password_confirmation: null
})

const submit = () => {
    form.post('/register')
}

</script>

<style scoped>
</style>
