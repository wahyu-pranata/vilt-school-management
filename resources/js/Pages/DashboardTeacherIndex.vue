<template>
    <Head title="Teacher List"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold text-slate-800">Teacher List</h1>
                    <Link href="/dashboard/teacher/create" class="px-4 py-2 text-white bg-sky-600 rounded hover:bg-sky-700">Add teacher</Link>
                </div>
                <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                <table class="table-fixed w-full text-sm text-left">
                    <tr class="text-xs text-gray-900 uppercase">
                        <th>No.</th>
                        <th>Teacher Name</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="(teacher, index) in teachers.data" :key="teacher.id">
                        <td>{{ index + 1 }}.</td>
                        <td>{{ teacher.teacher_name }}</td>
                        <td>{{ subjects[teacher.subject_id].subject_name }}</td>
                        <td class="flex space-x-2">
                            <Link :href="`/dashboard/student/${teacher.id}/edit`">Edit</Link>
                            <form @submit.prevent="destroy(teacher.id)">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                </table>
                <Pagination class="my-4" :links="teachers.links" />
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia"
import { Head, Link } from "@inertiajs/inertia-vue3"
import Layout from "./Layout/Layout.vue"
import Pagination from "./Components/Pagination.vue"
import Flash from "./Components/Flash.vue"

const props = defineProps({
    teachers: Object,
    subjects: Object
})

const destroy = (id) => {
    if(confirm('Are you sure want to delete this student?')) {
        Inertia.delete(`/dashboard/student/${id}`)
    }
}
</script>

<style scoped>
tr {
    @apply odd:bg-white even:bg-slate-100
}
th, td {
    @apply px-2 py-4
}
td a {
    @apply text-emerald-600 hover:underline
}
form button {
    @apply text-rose-600 hover:underline
}
</style>
