<template>
        <i :class="classes" v-on:click ="clicked" ></i>
</template>

<script>
export default {
    props: ["dir"],
    computed: {
        classes() {
            return "carousel-control fa fa-2x fa-chevron-" + this.dir;
        }
    },
    methods: {
        clicked: function() {
            this.$emit("change-image", this.dir === "left" ? -1 : 1);
            // this.$emit("change-image", "fuck u bitch")
        }
    }
}
</script>

<style>
    .carousel-control {
        padding: 1rem;
        color: rgb(38, 0, 255);
        opacity: 0.85
    }
    @media (min-width: 744px) {
        .carousel-control {
            font-size: 3rem;
        }
    }
</style>