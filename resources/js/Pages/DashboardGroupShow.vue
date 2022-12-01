<template>
    <Head title="Group Detail"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold text-slate-800">{{ `Year ${group.year_level} ${group.group_name}` }} Students List</h1>
                </div>
                <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                <table class="table-fixed w-full text-sm text-left">
                    <tr class="text-xs text-gray-900 uppercase">
                        <th>No.</th>
                        <th>Student Name</th>
                        <th>DOB</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="(student, index) in students" :key="student.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ student.student_name }}</td>
                        <td>{{ student.dob }}</td>
                        <td>
                            <form @submit.prevent="destroy(student.id)">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia"
import { Head } from "@inertiajs/inertia-vue3"
import Layout from "./Layout/Layout.vue"
import Flash from "./Components/Flash.vue"

const props = defineProps({
    group: Object,
    students: Object
})

const destroy = (id) => {
    if(confirm('Are you sure want to delete selected student?')) {
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
