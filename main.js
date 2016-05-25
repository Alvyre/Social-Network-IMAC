// main.js

import Vue from 'vue'
import Bootstrap from 'bootstrap'
import Resource from 'vue-resource'
import Router from 'vue-router'



import App from './components/App.vue'
import HomeView from './components/HomeView.vue'
import ProfileView from './components/ProfileView.vue'
import CategoryView from './components/CategoryView.vue'
import SubjectView from './components/SubjectView.vue'
import SignUpView from './components/SignUpView.vue'

// install router
Vue.use(Router)


Vue.use(Resource)
Vue.http.options.root = "localhost"

// routing
var router = new Router()

router.map({
	'/home/':{
		component: HomeView
	},
	//'/user/:id': {
	'/user/': {
		component: ProfileView
	},
	'/signup/': {
		component: SignUpView
	},
	'/category/': {
		component: CategoryView
	},
	'/subject/': {
		component: SubjectView
	}
})

router.beforeEach(function () {
	window.scrollTo(0, 0)
})

// Redirection au démarrage
router.redirect({
	'*': '/home'
})

router.start(App, 'app')



Vue.use(Resource)
Vue.http.options.root = "localhost"

