// main.js
import Vue from 'vue'
import Resource from 'vue-resource'
// require a *.vue component
import App from './components/App.vue'

Vue.use(Resource)
Vue.http.options.root = "localhost"
// mount a root Vue instance
new Vue({
  el: 'body',
  components: {
    // include the required component
    // in the options
    app: App
  }
})