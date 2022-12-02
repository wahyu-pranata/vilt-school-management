<template>
    <Head title="Data List"></Head>
    <Layout>
        <div class="mt-4">
            <div class="overflow-x-auto relative px-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold text-slate-800">Data List</h1>
                    <Link :href="`/dashboard/${name}/create`" class="px-4 py-2 text-white bg-sky-600 rounded hover:bg-sky-700">Add new data</Link>
                </div>
                <Flash variant="info" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</Flash>
                <table class="table-fixed w-full text-sm text-left">
                    <tr class="text-xs text-gray-900 uppercase">
                        <th v-for="col in columns">{{ col }}</th>
                    </tr>
                    <tr v-for="(data, index) in filteredData" :key="index">
                        <td v-for="d in data">{{ d[1] }}</td>
                        <td class="flex space-x-2">
                            <Link v-for="action in actions" :key="action" :class="actionColor" :href="actionTo(action, data[0][1])">{{ action.toUpperCase() }}</Link>
                            <form @submit.prevent="destroy(data.id)">
                                <button type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                </table>
                <Pagination class="my-4" :links="links" />
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import Layout from "./Layout/Layout.vue";
import Pagination from "./Components/Pagination.vue";
import Flash from "./Components/Flash.vue";

const props = defineProps({
    name: String,
    data: Object,
    classes: Object,
    subjects: Object,
    columns: Array,
    actions: Array,
});
const links = props.data.links;

const destroy = (id) => {
    if(confirm(`Are you sure want to delete this ${props.name}?`)) {
        Inertia.delete(`/dashboard/${props.name}/${id}`);
    }
}

const filteredData = computed(() => {
    let arr = []
    if (props.classes) {
        let classes = Object.values(Object.values(props.classes))
    }
    Object.values(props.data.data).forEach(e => {
        arr.push(Object.entries(e).filter(d => !d.includes('updated_at') && !d.includes('deleted_at') && !d.includes('created_at') && !d.includes('is_graduated') && !d.includes('graduated_at')));
    });
    if(arr[0][1][0] == "group_id") {
        arr.forEach(data => data[1][1] = `${classes[data[1][1] -1].group_name} - Year ${classes[data[1][1] -1].year_level}`);
    }
    return arr;
});

const actionColor = computed(() => {
    props.actions.forEach(action => {
        switch(action) {
            case "show":
                return "text-sky-600";
            case "edit":
                return "text-emerald-600";
            default:
                return "text-rose-600";
        }
    });
});

const actionTo = (action, id) => {
    return action == "edit" ? `/dashboard/${props.name}/${id}/edit` : `/dashboard/${props.name}/${id}`
};

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
