<template>
    <Head title="Student List"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold text-slate-800">Student List</h1>
                    <Link href="/dashboard/student/create" class="px-4 py-2 text-white bg-sky-600 rounded hover:bg-sky-700">Add student</Link>
                </div>
                <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                <table class="table-fixed w-full text-sm text-left">
                    <tr class="text-xs text-gray-900 uppercase">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>D.O.B</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="student in props.students.data" :key="student.id">
                        <td>{{ student.id }}.</td>
                        <td>{{ student.student_name }}</td>
                        <td>{{ classes[student.group_id - 1].group_name  }}</td>
                        <td>{{ student.dob }}</td>
                        <td class="flex space-x-2">
                            <Link :href="`/dashboard/student/${student.id}/edit`">Edit</Link>
                            <Link href="#">Delete</Link>
                        </td>
                    </tr>
                </table>
                <Pagination class="my-4" :links="props.students.links" />
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3"
import {computed} from "vue";
import Layout from "./Layout/Layout.vue"
import Pagination from "./Components/Pagination.vue"
import Flash from "./Components/Flash.vue"

const props = defineProps({
    students: Object,
    classes: Object
})

</script>

<style scoped>
tr {
    @apply odd:bg-white even:bg-slate-100
}
th, td {
    @apply px-2 py-4
}
td a {
    @apply first:text-emerald-600 last:text-rose-600 hover:underline
}
</style>
