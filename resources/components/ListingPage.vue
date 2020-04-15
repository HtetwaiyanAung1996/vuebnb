<template>
    <div>
        <header-image
            v-if="listing.images[0]"
            :image-url="listing.images[0]"
            @header-clicked="openModal"
            :id = "id"
        ></header-image>
        <!-- <pre>{{ listing }}</pre> -->
        <div class="listing-container">
            
            <div class="heading">
                <h1>{{listing.title}}</h1>
                <p>{{listing.address}}</p>
            </div>
            <hr>
            <div class="about">
                <h3>About This Listing</h3>
                <expandable-text>{{ listing.about }}</expandable-text>
            </div>
            <div class="list">
                <feature-list title ="Anemitites">
                    <div class="list-item" v-for="amenity in listing.amenities">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>{{ amenity.title }}</span>
                    </div>
                </feature-list>
                <feature-list title="Prices">
                    <div class="list-item" v-for="price in listing.prices">
                        {{price.title}}: <strong>{{price.value}}</strong>
                    </div>
                </feature-list>
            </div>
        </div>
        <modal-window ref="imagemodal">
            <image-carousel :images="listing.images"></image-carousel>
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
    export default {
        data() {
            return {
                contracted: true,    
                modalOpen: false, 
                id: 1   
            }
        },
        components: {
            ImageCarousel,
            ModalWindow,
            HeaderImage,
            FeatureList,
            ExpandableText
        },
        created() {
            console.log(this.$store.state.listings)
        },
        computed: {
            listing() {
                return populateAmenitiesAndPrices(
                    this.$store.getters.getListing(this.$route.params.listing)
                );
            }
        },
        methods: {
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