<template>
    <Head title="Student Detail"></Head>
    <Layout>
        
    </Layout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from './Layout/Layout.vue';

const props = defineProps({
    student: Object,
    group: Object
})
</script>

<style>

</style>