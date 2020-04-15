import Vue from 'vue'
import Vuex from 'vuex'
import router from './router'
import axios from 'axios'
Vue.use(Vuex)

//required headers for Ajax calls

axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': window.csrf_token
}


//If we want to export a single value or to have a fallback value for your module, you could use a default export:
export default new Vuex.Store({
    state: {
        saved: [ ],
        listing_summaries: [],
        listings: [],
        auth: false
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
            if (state.auth) {
                let index = state.saved.findIndex (saved => saved === id);
                if (index === -1) {
                    state.saved.push(id);
                } else {
                    state.saved.splice(index, 1);
                }
            } else {
                // kick to login page
                router.push('/login');
            }
        },
        // data is from document head or data from api call
        addData (state, payload) {
            // for authentication
            if (payload.data.auth) {
                state.auth = payload.data.auth;
            }
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
    }, 
    actions: {
        toggleSaved ({commit, state}, id) {
            // console.log(id);
            if (state.auth) {
                axios
                .post('/api/user/toggle_saved', {a: id})
                .then (response => {
                    // console.log(response.data);
                    commit('toggleSaved', id);
                })
            } else {
                router.push('/login');
            }
        }
    }
})