<template>
    <div>
        <Head :title="'Logs ' + $page.props.date" />

        <Link href="/nova-log-viewer">All logs</Link>

        <Heading style="margin-bottom: 0.5em"> Logs {{ $page.props.date }}</Heading>

        <Card class="scrollable">
            <div class="scrollable levels">
                <Level
                    v-for="level in levels"
                    :level="level.level"
                    @click="selectedLevel = level.level.toLowerCase()"
                    :class="{ selected: selectedLevel === level.level.toLowerCase() }"
                >
                    {{ level.level }} <b v-if="level.count > 0">{{ level.count }}</b>
                </Level>
            </div>

            <div v-if="logs.length === 0">No records</div>
            <div v-else class="logs">
                <LogItem v-for="(logs, message) in logs" :message="message" :logs="logs" />
            </div>
        </Card>
    </div>
</template>

<script>
import Heading from '../../../vendor/laravel/nova/resources/js/components/Heading.vue';
import { Head } from '@inertiajs/vue3';
import Link from '../components/Link.vue';
import Level from '../components/Level.vue';
import LogItem from '../components/LogItem.vue';

export default {
    components: { Heading, Head, Link, Level, LogItem },
    computed: {
        logs() {
            return this.$page.props.logs[this.selectedLevel.toUpperCase()] ?? [];
        },
        levels() {
            const result = [];

            ['Emergency', 'Alert', 'Critical', 'Error', 'Warning', 'Notice', 'Info', 'Debug'].forEach((level) => {
                result.push({
                    level: level,
                    count: Object.keys(this.$page.props.logs[level.toUpperCase()] ?? []).length,
                });
            });

            return result;
        },
    },
    data() {
        return {
            selectedLevel: this.$page.props.level,
        };
    },
};
</script>

<style scoped lang="scss">
.scrollable {
    overflow-x: auto;
}

.levels {
    display: flex;
    flex-direction: row;

    > * {
        flex-grow: 1;
    }

    :not(.selected) {
        opacity: 0.7;
        padding-bottom: 5px;
        //border-bottom: 5px solid transparent;
    }

    .selected {
        padding-bottom: 0;
        border-bottom: 5px solid black;
    }
}

.logs {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
</style>
