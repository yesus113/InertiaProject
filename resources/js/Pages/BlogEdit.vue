<template>
    <form @submit.prevent="submit">
        <label>Title</label>
        <input type="text" v-model="form.title" />
        <div v-if="form.errors.title">{{ form.errors.title }}</div>

        <label>Description</label>
        <input type="text" v-model="form.description" />
        <div v-if="form.errors.description">{{ form.errors.description }}</div>

        <label>Content</label>
        <input type="text" v-model="form.content" />
        <div v-if="form.errors.content">{{ form.errors.content }}</div>

        <button type="submit" :disabled="form.processing">Update</button>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    blog: Object
})


const form = useForm({
    title: props.blog.title,
    description: props.blog.description,
    content: props.blog.content,
})

function submit() {
    form.put(route('blog.update', props.blog.id))
}
</script>
