import Vue from 'vue';
import VueRouter from 'vue-router';
import HomePage from '../components/HomePage.vue';
import ListingPage from '../components/ListingPage.vue';
import SavePage from '../components/SavePage.vue';
import LoginPage from '../components/LoginPage.vue'
import store from './store';
import axios from 'axios';

Vue.use(VueRouter);
let router =  new VueRouter({
	mode: 'history',
	routes: [
				{ path: '/', component: HomePage, name: 'home'},
				{ path: '/listing/:listing', component: ListingPage, name: 'listing'},
				{ path: '/saved', component: SavePage, name: 'saved'},
				{ path: '/Login', component: LoginPage, name: 'login'}
	],
	//scroll Behavior is used to return the next page starts in Top
	scrollBehavior (to, from, savedPosition) {
			return { x: 0, y: 0 }	
	}
});

router.beforeEach( (to, from, next) => {
	let serverData = JSON.parse(window.vuebnb_server_data);
	if (
		to.name === 'listing' 
			? store.getters.getListing(to.params.listing)
			: store.state.listing_summaries.length > 0
		||
		to.name === 'login'
	) {
		next();
	}
	else if (!serverData.path || to.path != serverData.path) {
		axios.get(`/api${to.path}`).then(({data}) => {
			store.commit('addData', {route: to.name, data: data});
			next();
		});
	} else {
		store.commit('addData', {route: to.name, data: serverData});
		next();
	}

});

export default router;


