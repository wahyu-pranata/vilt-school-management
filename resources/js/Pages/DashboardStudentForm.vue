<template>
    <Head :title="student ? 'Edit Student' : 'Add New Student'"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <h1 class="text-2xl font-semibold text-slate-800">{{ student ? "Edit Student" : "Add New Student" }}</h1>
                <form action="#" method="post" class="mt-4 w-1/2" @submit.prevent="submit">
                    <InputForm id="name" type="text" placeholder="Insert student name..." label-text="Student Name" v-model="form.student_name" />
                    <div class="mb-3">
                        <label for="group">Select Group</label>
                        <select name="group_id" id="group" v-model="form.group_id">
                            <option v-for="group in classes" :value="group.id" :key="group.id">{{ `${group.group_name} - Year ${group.year_level}` }}</option>
                        </select>
                    </div>
                    <InputForm id="dob" type="date" label-text="Student Date of Birth" v-model="form.dob"/>
                    <button type="submit">{{ student ? "Edit" : "Create" }}</button>
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
    student: Object,
    classes: Object
})

let form = useForm({
    student_name: props.student ? props.student.student_name : null,
    group_id: props.student ? props.student.group_id : null,
    dob: props.student ? props.student.dob : null
})

const submit = () => {
    if(props.student) {
        form.put(`/dashboard/student/${props.student.id}`)
    } else {
        form.post(`/dashboard/student`)
    }
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
