<template>
    <a :href="url" @click.prevent="visit">
        <slot></slot>
    </a>
</template>
<script>
export default {
    props: {
        href: {
            required: true,
        },
        query: {
            type: Object,
            default: {},
        },
    },
    computed: {
        url() {
            return Object.keys(this.query).length > 0 ? this.href + '?' + new URLSearchParams(this.query).toString() : this.href;
        },
    },
    methods: {
        visit() {
            Nova.visit(this.href, { data: this.query });
        },
    },
};
</script>
<style scoped lang="scss"></style>
