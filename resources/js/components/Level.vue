<template>
    <span
        class="level"
        :class="{
            emergency: level.toLowerCase() === 'emergency',
            alert: level.toLowerCase() === 'alert',
            critical: level.toLowerCase() === 'critical',
            error: level.toLowerCase() === 'error',
            warning: level.toLowerCase() === 'warning',
            notice: level.toLowerCase() === 'notice',
            info: level.toLowerCase() === 'info',
            debug: level.toLowerCase() === 'debug',
        }"
    >
        <slot>
            {{ level }}
        </slot>
    </span>
</template>

<script>
export default {
    props: {
        level: {
            required: true,
            type: String,
        },
    },
    data() {
        return {};
    },
};
</script>

<style scoped lang="scss">
span.level {
    color: white;
    padding: 5px 10px;

    &.emergency {
        background-color: rgb(183, 28, 28);
    }

    &.alert {
        background-color: rgb(211, 47, 47);
    }

    &.critical {
        background-color: rgb(244, 67, 54);
    }

    &.error {
        background-color: rgb(255, 87, 34);
    }

    &.warning {
        background-color: rgb(255, 145, 0);
    }

    &.notice {
        background-color: rgb(76, 175, 80);
    }

    &.info {
        background-color: rgb(25, 118, 210);
    }

    &.debug {
        background-color: rgb(144, 202, 249);
    }
}
</style>
