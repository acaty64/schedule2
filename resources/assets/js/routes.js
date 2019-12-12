// fuente: Sistema de rutas con VUE-ROUTER y Laravel | Rimorsoft Online 
// link: https://www.youtube.com/watch?v=8M4HF1U_DH0
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
	routes: [
		{
			path: '/list',
			name: 'list',
			component: require('./components/schedule/index.vue'),
		},
		{
			path: '/edit',
			name: 'edit',
			component: require('./components/schedule/edit.vue'),
			props: true
		},
	],
});
	// mode: 'history'
