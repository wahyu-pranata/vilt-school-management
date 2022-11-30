<template>
    <Head title="Add New Subject"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <h1 class="text-2xl font-semibold text-slate-800">{{ subject ? 'Edit Subject' : 'Add new Subject' }}</h1>
                <form action="#" method="post" class="mt-4 w-1/2" @submit.prevent="submit">
                    <InputForm id="subject_name" type="text" placeholder="Insert subject name..." label-text="Subject Name" v-model="form.subject_name" />
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3"
import Layout from "./Layout/Layout.vue"
import InputForm from "./Components/InputForm.vue"

const props = defineProps({
    subject: Object
})
let form = useForm({
    subject_name: props.subject ? props.subject.subject_name : null
})
const submit = () => {
    form.post('/dashboard/student')
}
</script>

<style scoped>
label {
    @apply after:content-['*'] after:ml-0.5 after:text-rose-600 after:text-xs
}
select {
    @apply block w-full mt-2 px-3 py-2 font-normal font-light text-sm bg-white border border-solid border-slate-600 rounded transition focus:outline-none focus:border-sky-700 focus:ring focus:ring-blue-500
}
button {
    @apply block mb-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow hover:opacity-80 hover:shadow-md focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
}
</style>
