<template>
    <div class="listing-summary">
        <router-link :to="{ name: 'listing', params: { listing: listing.id } }">
            <!--listing save component which prop is :id -->
            <listing-save 
                :id = "listing.id"
            ></listing-save>

            <div class="wrapper">
                <div class="thumbnail" :style="backgroundImageStyle"></div>
                <div class="info title">
                    <span>{{ listing.price_per_night}}</span>
                    <span>{{ listing.titile }}</span>
                </div>
                <div class="info address">{{ listing.address }}</div>
            </div>

        </router-link>
    </div>
</template>
<script>
    import ListingSave from './ListingSave.vue';
    export default {
        props: [ 'listing'],
        computed: {
            backgroundImageStyle(){
                return {
                    'background-image' : `url("${this.listing.thumb}")`
                }
            }
        },
        components: {
            ListingSave
        }
    }
</script>
<style >
    .listing-summary {
        flex: 0 0 auto;
        position: relative
        /* The element is positioned relative to its normal position, so "left:20px" adds 20 pixels to the element's LEFT position */
    }
    .listing-summary a {
        text-decoration: none;
    }
    .listing-summary .wrapper {
        max-width: 350px;
        display: block;
    }
    .listing-summary .thumbnail {
        width: 350px;
        height: 250px;
        background-size: cover;
        background-position: center;
    }
    .listing-summary .info {
        color: #484848;
        word-wrap: break-word;
        letter-spacing: 0.2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .listing-summary .info.title {
        padding-top: 5px;
        font-weight: 700;
        font-size: 16px;
        line-height: 24px;
    }
    .listing-summary .info.address {
        font-size: 14px;
        line-height: 18px;
    }
    @media (max-width: 400px) {
        .listing-summary .listing-save {
            left: 15px;
            right: auto;
        }
    }

</style>