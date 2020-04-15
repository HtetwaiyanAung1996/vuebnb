<template>
    <div id="saved" class="home-container">
        <h2>Saved Listings</h2>
        <!-- <pre> {{ listings }} </pre> -->
        <div v-if="listings.length" class="listing-summaries">
            <listing-summary
                v-for="listing in listings"
                :listing="listing"
                :key="listing.id"
                ></listing-summary>
        </div>
        <div v-else>
            <h2>No Saved Listings</h2>
        </div>
    </div>
</template>

<script>
    import ListingSummary from './ListingSummary.vue'
    export default {
        computed: {
            listings() {
                return this.$store.state.listing_summaries.filter(
                    item => this.$store.state.saved.indexOf(item.id) > -1
                    //filtering from listing summaries where (x is in the state.saved)
                )
            }
        },
        components: {
            ListingSummary
        }
    }
</script>

<style>
    #saved .listing-summaries {
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        overflow: hidden;
    }

    #saved .listing-summaries .listing-summary {
        padding-bottom: 30px;
    }

    /* 	Selects all <listing-summary> elements where the parent is a <listing-summaries> element */
    .listing-summaries > .listing-summary {
        margin-right: 10px;
    }
</style>