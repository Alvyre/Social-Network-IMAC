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
import SearchView from './views/SearchView.vue'
import SubjectCreateView from './views/SubjectCreateView.vue'

// install router
Vue.use(Router)

Vue.use(Resource)
Vue.http.options.root = "http://localhost"

// routing
var router = new Router({
	hashbang: false,
	history:true,
	mode: "html5"
})

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
	'/category/:id': {
		component: CategoryView
	},
	'/search/:text': {
		component: SearchView
	},
	'/subject/': {
		component: SubjectView
	},
	'/subject-create/': {
		component: SubjectCreateView
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

router.go()

