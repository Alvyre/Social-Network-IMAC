// main.js
import Vue from 'vue'
import Router from 'vue-router'
// require a *.vue component
import App from './components/App.vue'
import HomeView from './components/HomeView.vue'
import ProfileView from './components/ProfileView.vue'
import CategoryView from './components/CategoryView.vue'
import SubjectView from './components/SubjectView.vue'
import SignUpView from './components/SignUpView.vue'
// install router
Vue.use(Router)

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


// mount a root Vue instance
/*new Vue({
el: 'body',
components: {
// include the required component
// in the options
app: App
}
})*/