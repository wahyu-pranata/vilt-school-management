<template>
    <Head title="Subject Detail"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold text-slate-800">{{ subject.subject_name }} Courses List</h1>
                </div>
                <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                <table class="table-fixed w-full text-sm text-left">
                    <tr class="text-xs text-gray-900 uppercase">
                        <th>No.</th>
                        <th>Course Name</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="(course, index) in courses" :key="course.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ course.course_name }}</td>
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
import Layout from "./Layout/Layout.vue"
import { Head, Link } from "@inertiajs/inertia-vue3"
defineProps({
    subject: Object,
    courses: Object
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
    @apply text-emerald-600 hover:underline
}
form button {
    @apply text-rose-600 hover:underline
}

</style>
