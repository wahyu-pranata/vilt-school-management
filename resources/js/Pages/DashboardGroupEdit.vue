<template>
    <Head title="Add New Group"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <h1 class="text-2xl font-semibold text-slate-800">Add Group</h1>
                <form action="#" method="post" class="mt-4 w-1/2" @submit.prevent="submit">
                    <InputForm id="group_name" type="text" placeholder="Insert Class name..." label-text="Class Name" v-model="form.group_name" />
                    <div class="mb-3">
                        <label for="yearLevel">Year Level</label>
                        <select name="year_level" id="yearLevel" v-model="form.year_level">
                            <option v-for="i in 3" :key="i" :value="i">{{ i }}</option>
                        </select>
                    </div>
                    <button type="submit">Edit</button>
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
    group: Object
})

let form = useForm({
    group_name: props.group.group_name,
    year_level: props.group.year_level
})
const submit = () => {
    form.put(`/dashboard/class/${props.group.id}`)
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
