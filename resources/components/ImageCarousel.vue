<template>
  <div class="image-carousel">
    <img :src="image" >
    <div class="controls">
      <carousel-control dir="left" @change-image="changeImage"></carousel-control>
      <carousel-control dir="right" @change-image="changeImage"></carousel-control>
    </div>
  </div>
</template>
<script>
  import CarouselControl from '../components/CarouselControl.vue'
  export default {  
    props: ["images"],
    components: {
      CarouselControl
    },
    data() {
      return {
        index: 0
      };
    },
    computed: {
      image: function() {
        return this.images[this.index];
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
    },
    
  };
</script>
<style >
  .image-carousel {
    height: 100%;
    margin-top: -12vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .image-carousel img {
    width: 100%;
  }
  .image-carousel .controls {
    position: absolute;
    width: 100%;
    display: flex;
    justify-content: space-between;
  }
</style>