<template>
    <div class="mb-3">
        <label :for="id" class="text-left">{{ labelText }}</label>
        <input :type="type" :id="id" :placeholder="placeholder" @input="$emit('update:modelValue', $event.target.value)">
    </div>
</template>

<script setup>
const props = defineProps(['id', 'type', 'placeholder', 'labelText', 'modelValue'])
defineEmits(['update:modelValue'])
</script>

<style scoped>
label {
    @apply after:content-['*'] after:ml-0.5 after:text-rose-600 after:text-xs
}
input {
    @apply block w-full mt-2 px-3 py-2 font-normal font-light text-sm border border-solid border-slate-600 rounded transition focus:outline-none focus:border-sky-700 focus:ring focus:ring-blue-500 placeholder:italic
}
</style>
