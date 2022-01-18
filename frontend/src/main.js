import Vue from 'vue'
import App from './App.vue'
import Router from './routes'
import VueResource from 'vue-resource'


import Navbar from '../src/components/Navbar.vue'

Vue.use(VueResource);
Vue.component('app-nav',Navbar);


new Vue({
  el: '#app',
  render: h => h(App),
  router:Router
})
