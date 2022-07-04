<template>
    <card :class="cardStyle">
        <div v-html="card.content"></div>
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
        cardStyle () {
            return this.card.center ? 'flex flex-col items-center justify-center' : 'px-6 py-4'
        }
    },
}
</script>
