<template>
    <Form :action="route('blog.store')" method="post">
        <label>Title</label>
        <input type="text" name="title" />
        <div v-if="$page.props.errors.title">{{ $page.props.errors.title }}</div>

        <label>description</label>
        <input type="text" name="description" />
        <div v-if="$page.props.errors.description">{{ $page.props.errors.description }}</div>

        <label>Content</label>
        <input type="text" name="content">
        <div v-if="$page.props.errors.content">{{ $page.props.errors.content }}</div>

        <button type="submit">Create</button>
    </Form>
</template>

<script setup>
import { Form } from '@inertiajs/vue3';
</script>

<style scoped></style>
