<template>
    <loading-card :class="cardStyle" :loading="loading">
        <div class="flex">
            <h2 v-if="card.title" class="font-bold mb-2">{{ card.title }}</h2>

            <SelectControl
                v-if="card.ranges.length > 0"
                :value="selectedRangeKey"
                @update:modelValue="handleRangeSelected"
                :options="card.ranges"
                size="xxs"
                class="ml-auto w-[6rem] shrink-0"
                :aria-label="__('Select Ranges')"
            />
        </div>
        <div v-if="card.height === 'fixed'" :class="fixedStyle">
            <div :class="fixedInnerStyle">
                <div v-html="card.content"></div>
            </div>
        </div>

        <div v-if="card.height === 'dynamic'" v-html="card.content"></div>
    </loading-card>
</template>

<script>
import { MetricBehavior } from 'laravel-nova';

export default {
    mixins: [MetricBehavior],

    data() {
        return {
            loading: false,
        };
    },

    props: {
        card: {
            type: Object,
            required: true,
        },
    },

    created() {
        if (this.hasRanges) {
            this.selectedRangeKey = this.card.selectedRangeKey || this.card.ranges[0].value;
        }

        this.fetch();
    },

    methods: {
        handleRangeSelected(key) {
            this.selectedRangeKey = key;
            this.fetch();
        },

        handleFetchCallback() {
            return response => {
                this.card.content = response.data.value;
                this.loading = false;
            };
        },
    },

    computed: {
        hasRanges() {
            return this.card.ranges.length > 0;
        },
        cardStyle() {
            return this.card.center ? 'flex flex-col items-center justify-center py-4' : 'px-6 py-4';
        },
        fixedStyle() {
            return this.card.title ? 'min-h-[90px]' : 'min-h-[128px]';
        },
        fixedInnerStyle() {
            return this.card.title
                ? 'overflow-hidden overflow-y-auto fixed-html-card max-h-[90px]'
                : 'overflow-hidden overflow-y-auto fixed-html-card max-h-[128px]';
        },
        metricPayload() {
            return {
                params: {
                    range: this.selectedRangeKey,
                },
            };
        },
    },
};
</script>
