<template>
    <div class="imageCarousel">
        <img :src="image" />
        <div class="controls">
            <carousel-control dir="left" @change-image="changeImage"></carousel-control>
            <carousel-control dir="right" @change-image="changeImage"></carousel-control>
        </div>
    </div>
</template>
<script>
export default {
    props: ["images"],
    data() {
        return {
            index: 0
        };
    },
    computed: {
        image() {
            return this.images[this.index];
        }
    },
    components: {
        "carousel-control": {
            template: `<i :class="classes" v-on:click ="clicked" ></i>`,
            props: ["dir"],
            computed: {
                classes() {
                    return "carousel-control fa fa-2x fa-chevron-" + this.dir;
                }
            },
            methods: {
                clicked: function() {
                    this.$emit("change-image", this.dir === "left" ? -1 : 1);
                }
            }
        }
    },
    methods: {
        changeImage(val) {
            let newVal = this.index + parseInt(val);
                // console.log(this.images.length)
            if (newVal < 0) {
                this.index = this.images.length - 1;
            } else if (newVal === this.images.length) {
                this.index = 0;
            } else {
                this.index = newVal;
            }
        }
    }
};
</script>
<style >
</style>