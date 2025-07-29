<template>
    <div class="item">
        <div class="header" @click="details = !details">
            <div class="arrow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" :class="{rotated: details}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            <div class="number">
                {{ logs.length }}
            </div>
            <div class="message">
                {{ message }}
            </div>
        </div>

        <div class="logs scrollable" v-if="details">
            <div v-for="log in logs" class="logs-item">
                <p>{{ log.message }}</p>
                <p v-for="line in log.stacktrace">{{ line }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            required: true,
            type: String,
        },
        logs: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            details: false,
        };
    },
};
</script>

<style scoped lang="scss">
.item {
    display: flex;
    flex-direction: column;

    &:hover {
        .header {
            background: #f3f3f3;
        }
    }

    .header {
        display: flex;
        flex-direction: row;
        gap: 5px;
        padding: 5px 0;
        cursor: pointer;

        .arrow {
            > * {
                height: 1.5em;
                transition: transform 0.2s ease;

                &.rotated {
                    transform: rotate(-180deg);
                }
            }
        }

        .number {
            background: #000;
            color: #fff;
            height: 1.5em;
            border-radius: 50px;
            line-height: 1.5em;
            text-align: center;
            padding: 0 0.5em;
        }

        .message {
        }
    }

    .logs {
        display: flex;
        flex-direction: column;
        gap: 2em;

        &-item {
            display: flex;
            flex-direction: column;
            padding: 0 5px;

            p {
                white-space: nowrap;
            }
        }
    }
}

.scrollable {
    overflow-x: auto;
}
</style>
