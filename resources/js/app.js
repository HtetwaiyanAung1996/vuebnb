import Vue from 'vue';
import { populateAmenitiesAndPrices } from './helpers';
// let model = window.vuebnb_listing_model;
let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model);
console.log(model);
Vue.component('my-component', {
    template: `<div>My Component</div>`
});
import ImageCarousel from '../components/ImageCarousel.vue';
import ModalWindow from '../components/ModalWindow.vue';
import HeaderImage from '../components/HeaderImage.vue';
window.app = new Vue({
    el: '#app',
    components: {
        ImageCarousel,
        ModalWindow,
        HeaderImage

    },
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
        openModal() {
            // this.modalOpen = true;
            this.$refs.imagemodal.modalOpen = true;
        }
    }
});


