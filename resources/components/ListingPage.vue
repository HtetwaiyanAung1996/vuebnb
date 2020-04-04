<template>
    <div>
        <header-image
            :image-url="images[0]"
            @header-clicked="openModal"
        ></header-image>

        <div class="container">
        
            <p v-if="myval"> Hello Vue </p>
            <p v-else> GoodBye Vue</p>
            <div class="heading">
                <h1>{{title}}</h1>
                <p>{{address}}</p>
            </div>
            <hr>
            <div class="about">
                <h3>About This Listing</h3>
                <expandable-text>{{ about }}</expandable-text>
            </div>
            <div class="list">
                <feature-list title ="Anemitites">
                    <div class="list-item" v-for="amenity in amenities">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>{{ amenity.title }}</span>
                    </div>
                </feature-list>
                <feature-list title="Prices">
                    <div class="list-item" v-for="price in prices">
                        {{price.title}}: <strong>{{price.value}}</strong>
                    </div>
                </feature-list>
            </div>
        </div>
    
        <modal-window ref="imagemodal">
            <image-carousel :images="images"></image-carousel>
        </modal-window>
    </div>
</template>
<script>
    import { populateAmenitiesAndPrices } from '../js/helpers';
    let model = JSON.parse(window.vuebnb_server_data);
    model = populateAmenitiesAndPrices(model);
    import ImageCarousel from '../components/ImageCarousel.vue';
    import ModalWindow from '../components/ModalWindow.vue';
    import HeaderImage from '../components/HeaderImage.vue';
    import FeatureList from '../components/FeatureList.vue';
    import ExpandableText from '../components/ExpandableText.vue';  
    import routeMixin from '../js/route-mixin';
    export default {
        mixins: [routeMixin],
        data() {
                    return {
                                title: null, 
                                address: null, 
                                about: null, 
                                myval: true,    
                                headerImageStyle: {
                                    'background-image': `url(${model.images[0]})`  //for image binding
                                },
                                amenities: [], 
                                prices: model.prices, 
                                contracted: true,    
                                modalOpen: false, 
                                    message: 'Hello World',
                                images: []
                            }
        },
        components: {
            ImageCarousel,
            ModalWindow,
            HeaderImage,
            FeatureList,
            ExpandableText
        },
        methods: {
            assignData({ listing }) {
                Object.assign(this.$data, populateAmenitiesAndPrices(listing));
            },
            openModal() {
                this.$refs.imagemodal.modalOpen = true;
            }
        }
    }
</script>
<style >
    .about {
        margin: 2em 0;
    }
    .about h3 {
        font-size: 22px;
    }
</style>