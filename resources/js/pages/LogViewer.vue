<template>
    <div>
        <Head title="Logs" />

        <Heading style="margin-bottom: 0.5em">Logs</Heading>

        <Card class="scrollable">
            <table>
                <thead>
                    <tr>
                        <td>Date</td>
                        <td>All</td>
                        <td>
                            <Level level="Emergency" />
                        </td>
                        <td>
                            <Level level="Alert" />
                        </td>
                        <td>
                            <Level level="Critical" />
                        </td>
                        <td>
                            <Level level="Error" />
                        </td>
                        <td>
                            <Level level="Warning" />
                        </td>
                        <td>
                            <Level level="Notice" />
                        </td>
                        <td>
                            <Level level="Info" />
                        </td>
                        <td>
                            <Level level="Debug" />
                        </td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(levels, date) in $page.props.logs">
                        <td>
                            <Link :href="'/nova-log-viewer/' + date">
                                {{ date }}
                            </Link>
                        </td>
                        <td>
                            <Link :href="'/nova-log-viewer/' + date" v-if="Object.keys(levels).length > 0">
                                {{ Object.keys(levels).length }}
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link
                                :href="'/nova-log-viewer/' + date"
                                :query="{ level: 'EMERGENCY' }"
                                v-if="Object.keys(levels.EMERGENCY ?? {}).length > 0"
                            >
                                <Level level="EMERGENCY">
                                    {{ Object.keys(levels.EMERGENCY ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link :href="'/nova-log-viewer/' + date" :query="{ level: 'ALERT' }" v-if="Object.keys(levels.ALERT ?? {}).length > 0">
                                <Level level="ALERT">
                                    {{ Object.keys(levels.ALERT ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link
                                :href="'/nova-log-viewer/' + date"
                                :query="{ level: 'CRITICAL' }"
                                v-if="Object.keys(levels.CRITICAL ?? {}).length > 0"
                            >
                                <Level level="CRITICAL">
                                    {{ Object.keys(levels.CRITICAL ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link :href="'/nova-log-viewer/' + date" :query="{ level: 'ERROR' }" v-if="Object.keys(levels.ERROR ?? {}).length > 0">
                                <Level level="ERROR">
                                    {{ Object.keys(levels.ERROR ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link
                                :href="'/nova-log-viewer/' + date"
                                :query="{ level: 'WARNING' }"
                                v-if="Object.keys(levels.WARNING ?? {}).length > 0"
                            >
                                <Level level="WARNING">
                                    {{ Object.keys(levels.WARNING ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link :href="'/nova-log-viewer/' + date" :query="{ level: 'NOTICE' }" v-if="Object.keys(levels.NOTICE ?? {}).length > 0">
                                <Level level="NOTICE">
                                    {{ Object.keys(levels.NOTICE ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link :href="'/nova-log-viewer/' + date" :query="{ level: 'INFO' }" v-if="Object.keys(levels.INFO ?? {}).length > 0">
                                <Level level="INFO">
                                    {{ Object.keys(levels.INFO ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td>
                            <Link :href="'/nova-log-viewer/' + date" :query="{ level: 'DEBUG' }" v-if="Object.keys(levels.DEBUG ?? {}).length > 0">
                                <Level level="DEBUG">
                                    {{ Object.keys(levels.DEBUG ?? {}).length }}
                                </Level>
                            </Link>
                            <span v-else>-</span>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </Card>
    </div>
</template>

<script>
import Level from '../components/Level.vue';
import Heading from '../../../vendor/laravel/nova/resources/js/components/Heading.vue';
import { Head } from '@inertiajs/vue3';
import Link from '../components/Link.vue';

export default {
    components: { Level, Heading, Head, Link },
    computed: {
        Nova() {
            return Nova;
        },
    },
    mounted() {},
};
</script>

<style scoped lang="scss">
table {
    width: 100%;

    thead {
        background: #e3e3e3;

        tr {
            td {
                padding: 5px;
            }
        }
    }

    tbody {
        tr {
            &:hover {
                background: #f3f3f3;
            }

            td {
                padding: 5px;
            }
        }
    }
}

.scrollable {
    overflow-x: auto;
}
</style>
