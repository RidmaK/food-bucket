import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AddProduct from './components/AddProduct.vue'
import About from './components/About.vue'
import Contact from './components/Contact.vue'
import ProductBascket from './components/ProductBascket.vue'
import EditProduct from './components/EditProduct.vue'
import Home from './components/Home.vue'

const router = new VueRouter({
  mode:'history',
  routes :[
    {path:'',component:Home},
    {path:'/add',component:AddProduct},
    {path:'/list',component:ProductBascket},
    {path:'/about',component:About},
    {path:'/contact',component:Contact},
    {path:'/edit/:id',component:EditProduct}
  ]
});

export default router
