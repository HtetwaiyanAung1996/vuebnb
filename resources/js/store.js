import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)



//If we want to export a single value or to have a fallback value for your module, you could use a default export:
export default new Vuex.Store({
    state: {
        saved: [ ],
        listing_summaries: [],
        listings: []
    },
    // getters: {
    //     savedSummaries(state) {
    //         return state.listing_summaries.filter(
    //             item => state.saved.indexOf(item.id) > -1
    //         );
    //     }
    // },
    // saved => saved === id is th shortern of 
    // function (saved) {
    //     return saved === id;
    // }
    //findIndex is used to get the first index that meets the condition
    mutations: {
        //toggle saved is for the saved data from listing save conmponent
        toggleSaved (state, id) {
            let index = state.saved.findIndex (saved => saved === id);
            if (index === -1) {
                state.saved.push(id);
            } else {
                state.saved.splice(index, 1);
            }
        },
        // data is from document head or data from api call
        addData (state, payload) {

            if (payload.route === 'listing') {
                state.listings.push(payload.data);
            } else {
                // console.log(payload);
                state.listing_summaries = payload.data.listings
                
            }
            // console.log(payload.route);
            
        }
    },
    getters: {
        getListing(state) {
            // id is the argument pass from everywhere
            return id => state.listings.find(listing => id == listing.id);
        }
    }
})