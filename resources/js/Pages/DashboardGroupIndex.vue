<template>
    <Head title="Group List"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold text-slate-800">Group List</h1>
                    <Link href="/dashboard/group/create" class="px-4 py-2 text-white bg-sky-600 rounded hover:bg-sky-700">Add new group</Link>
                </div>
                <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                <table class="table-fixed w-full text-sm text-left">
                    <tr class="text-xs text-gray-900 uppercase">
                        <th>No.</th>
                        <th>Group Name</th>
                        <th>Year Level</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="(group, index) in groups.data" :key="group.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ group.group_name }}</td>
                        <td>{{ group.year_level }}</td>
                        <td class="flex space-x-2">
                            <Link :href="`/dashboard/group/${group.id}`">Show</Link>
                            <Link :href="`/dashboard/group/${group.id}/edit`">Edit</Link>
                            <form @submit.prevent="destroy(group.id)">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                </table>
                <Pagination class="my-4" :links="groups.links" />
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia"
import { Head, Link } from "@inertiajs/inertia-vue3"
import {computed} from "vue";
import Layout from "./Layout/Layout.vue"
import Pagination from "./Components/Pagination.vue"
import Flash from "./Components/Flash.vue"

const props = defineProps({
    groups: Object
})

const destroy = (id) => {
    if(confirm('Are you sure want to delete this group?')) {
        Inertia.delete(`/dashboard/group/${id}`)
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
    @apply odd:text-sky-600 even:text-emerald-600 hover:underline
}
form button {
    @apply text-rose-600 hover:underline
}
</style>
