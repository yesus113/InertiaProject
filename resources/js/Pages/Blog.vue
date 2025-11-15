<template>
    <h1 class="md:underline decoration-pink-500">Post List</h1>

    <Link :href="route('blog.create')">Create</Link>
    <table class=" table-fixed border-collapse border border-gray-400">
        <thead class="">
            <th class="bd-gray">Title</th>
            <th class="bd-gray">Content</th>
            <th class="bd-gray">user</th>
            <th class="bd-gray">Acctions</th>
        </thead>
        <tbody>
            <tr v-for="blog in blogs" :key="blog.id">
                <td class="bd-gray">{{ blog.title }}</td>
                <td class="bd-gray">{{ blog.content }}</td>
                <td class="bd-gray">{{ blog.user_id }}</td>

                <Link :href="route('blog.edit', blog.id)">Edit</Link>

                     <button @click="destroy(blog.id)">Delete</button>
            </tr>
        </tbody>

    </table>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'
const props = defineProps({
    blogs: Array
})

const form = useForm({})

const destroy = (id) => {
    if (confirm('¿Seguro que quieres eliminar este registro?')) {
        form.delete(route('blog.destroy', id))
    }
}
</script>

<style scoped>
</style>
