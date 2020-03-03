import Vue from 'vue';
import { populateAmenitiesAndPrices } from './helpers';
// let model = window.vuebnb_listing_model;
let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model);
console.log(model);
Vue.component('my-component', {
    template: `<div>My Component</div>`
});
Vue.component('image-carousel', {
    template: `<div class="image-carousel" > 
                <img :src="image">
                    <div class="controls">
                        <carousel-control dir="left" @change-image="changeImage"></carousel-control>
                        <carousel-control dir="right"@change-image="changeImage"></carousel-control>
                    </div>
                </div>`,
    props: ['images'],
    data() {
        return {
            index: 0
        }
    },
    computed: {
        image() {
            return this.images[this.index];
        }
    },
    components: {
        'carousel-control': {
        template: `<i :class="classes" v-on:click ="clicked" ></i>`,
        props: [ 'dir'],
        computed: {
            classes() {
                return 'carousel-control fa fa-2x fa-chevron-' + this.dir;
            }
        },
        methods: {
            clicked: function() {
                this.$emit('change-image',this.dir === 'left' ? -1 : 1)
            }
        }
        }
    },
    methods: {
        changeImage(val) {
            let newVal = this.index + parseInt(val);
            // console.log(this.images.length)
            if (newVal < 0) {
                this.index = this.images.length -1;
            }else if (newVal === this.images.length){
                this.index = 0;
            }else{
                this.index = newVal;
            }
        }
    }
});
var app = new Vue({
    el: '#app',
    data: Object.assign(model, {
        title: model.title, //from data.js
        address: model.address, //from data.js
        about: model.about, //from data.js
        myval: true,    //for v-if directive
        headerImageStyle: {
            'background-image': `url(${model.images[0]})`  //for image binding
        },
        amenities: model.amenities, //from data.js
        prices: model.prices, //from data.js
        contracted: true,    //for more button
        modalOpen: false, //to open modal
        message: 'Hello World',
        images: [
            '/images/1/Image_1.jpg',
            '/images/1/Image_2.jpg',
            '/images/1/Image_3.jpg',
            '/images/1/Image_4.jpg'
            ]
    }),
    methods: {
        escapeKeyListener: function(evt) {
            if (evt.keyCode === 27 && this.modalOpen) {
                this.modalOpen = false;
            }
        }
    },
    created: function() {
        document.addEventListener('keyup' , this.escapeKeyListener);
    },
    destroyed: function() { 
        document.removeEventListener('keyup', this.escapeKeyListener);
    },
    watch: {  //Testing watch  
        modalOpen: function() {
            var className = 'modal-open';
            if (this.modalOpen) {
                document.body.classList.add(className);  // adding class to body
            } else {
                document.body.classList.remove(className); //removing class to body
            }
        }
    }
});


