<template>
    <card :class="cardStyle">
        <h2 v-if="card.title" class="font-bold mb-2" v-html="card.title" />

        <div v-if="card.height === 'fixed'" :class="fixedStyle">
            <div :class="fixedInnerStyle">
                <div v-html="card.content"></div>
            </div>
        </div>

        <div v-if="card.height === 'dynamic'" v-html="card.content"></div>
    </card>
</template>

<script>
export default {
    props: {
        card: {
            type: Object,
            required: true,
        },
    },

    computed: {
        cardStyle() {
            const baseClassName = 'nova-html-card';
            const className = this.card.center ? 'flex flex-col items-center justify-center py-4' : 'px-6 py-4';
            return `${baseClassName} ${className}`;
        },
        fixedStyle() {
            return this.card.title ? 'min-h-[90px]' : 'min-h-[128px]';
        },
        fixedInnerStyle() {
            return this.card.title
                ? 'overflow-hidden overflow-y-auto fixed-html-card max-h-[90px]'
                : 'overflow-hidden overflow-y-auto fixed-html-card max-h-[128px]';
        },
    },
};
</script>
