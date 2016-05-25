// main.js

import Vue from 'vue'
import Resource from 'vue-resource'
import Router from 'vue-router'



import App from './components/App.vue'
import HomeView from './views/HomeView.vue'
import ProfileView from './views/ProfileView.vue'
import CategoryView from './views/CategoryView.vue'
import SubjectView from './views/SubjectView.vue'
import SignUpView from './views/SignUpView.vue'

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

