import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)



//If we want to export a single value or to have a fallback value for your module, you could use a default export:
export default new Vuex.Store({
    state: {
        saved: [
        ]
    },
    // saved => saved === id is th shortern of 
    // function (saved) {
    //     return saved === id;
    // }
    //findIndex is used to get the first index that meets the condition
    mutations: {
        toggleSaved (state, id) {
            let index = state.saved.findIndex (saved => saved === id);
            if (index === -1) {
                state.saved.push(id);
            } else {
                state.saved.splice(index, 1);
            }
        }
    }
})