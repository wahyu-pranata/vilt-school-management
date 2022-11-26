<template>
    <Head title="Student List"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
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
                        <td>{{ student.group_id }}</td>
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

const props = defineProps({
    students: Object
})

</script>

<style scoped>
tr {
    @apply odd:bg-white even:bg-slate-100
}
th, td {
    @apply px-2 py-4
}
a {
    @apply first:text-emerald-600 last:text-rose-600 hover:underline
}
</style>
