<template>
    <Head title="Subject List"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold text-slate-800">Subject List</h1>
                    <Link href="/dashboard/subject/create" class="px-4 py-2 text-white bg-sky-600 rounded hover:bg-sky-700">Add new subject</Link>
                </div>
                <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                <table class="table-fixed w-full text-sm text-left">
                    <tr class="text-xs text-gray-900 uppercase">
                        <th>No.</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="(subject, index) in subjects" :key="subject.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ subject.subject_name }}</td>
                        <td class="flex space-x-2">
                            <Link :href="`/dashboard/subject/${subject.id}`">Show</Link>
                            <Link :href="`/dashboard/subject/${subject.id}/edit`">Edit</Link>
                            <form @submit.prevent="destroy(subject.id)">
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
import { Head, Link } from "@inertiajs/inertia-vue3"
import Layout from "./Layout/Layout.vue"
import Pagination from "./Components/Pagination.vue"
import Flash from "./Components/Flash.vue"

const props = defineProps({
    subjects: Object
})

const destroy = () => {

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
    @apply odd:text-sky-600 even:text-emerald-600 hover:underline
}
form button {
    @apply text-rose-600 hover:underline
}
</style>
