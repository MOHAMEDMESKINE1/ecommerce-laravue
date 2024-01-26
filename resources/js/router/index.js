import { createRouter,createWebHistory } from "vue-router";

import Dashboard from '../components/Dashboard.vue';
import Orders from '../components/orders/index.vue';
import Orders_Details from '../components/orders/Details.vue';
import Statistics from '../components/statistics/index.vue';
import Products from '../components/products/index.vue';
import Edit from '../components/products/Edit.vue';
import EditCateory from '../components/categories/Edit.vue';
import Customers from '../components/customers/index.vue';
import Categories from '../components/categories/index.vue';
import Payments from '../components/payments/index.vue';
import PaymentsDetails from '../components/payments/Details.vue';
import Contacts from '../components/contacts/index.vue';
import Home from '../App.vue';
import IndexHome from '../Home.vue';
import Cart from '../Cart.vue';
import Shop from '../Shop.vue';
import Checkout from '../Checkout.vue';
import Contact from '../Contact.vue';
import Letters from '../components/letters/Index.vue';
import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'
import Products_Details from '../Details.vue';



const routes = [
    {
        path:'/dashboard',
        name:'Dashboard',
        component : Dashboard,
        meta: { requiresAuth: true },
       
    },
    {
        path:'/login',
        name:'login',
        component : Login,
        
      
    },
    {
        path:'/register',
        name:'register',
        component : Register
    },
    // front end
    {
        path:'/home',
        name:'home',
        component : Home,
       
    },
    {
        path:'/',
        name:'index_home',
        component : IndexHome
    },
    {
        path:'/details_product/:id',
        name:'products.details',
        component : Products_Details,
        props:true,
        
    },
    {
        path:'/cart',
        name:'cart',
        component : Cart
    },
    {
        path:'/shop',
        name:'shop',
        component : Shop
    },
    {
        path:'/checkout',
        name:'checkout',
        component : Checkout
    },
    {
        path:'/contact',
        name:'contact',
        component : Contact
    },

    // backend
    
   
    {
        path:'/orders',
        name:'orders',
        component : Orders,
        meta: { requiresAuth: true },
    },
    {
        path:'/products',
        name:'products.index',
        component : Products,
        meta: { requiresAuth: true },

    },
    {
        path:'/products/edit/:id',
        name:'products.edit',
        component : Edit,
        props : true,
        meta: { requiresAuth: true },

    },
    {
        path:'/statistics',
        name:'statistics',
        component : Statistics,
        meta: { requiresAuth: true },

    },
    {
        path:'/customers',
        name:'customers',
        component : Customers,
        meta: { requiresAuth: true },
    },
    {
        path:'/categories',
        name:'categories',
        component : Categories,
        meta: { requiresAuth: true },
    },
    {
        path:'/categories/edit/:id',
        name:'categories.edit',
        component : EditCateory,
        props : true,
        meta: { requiresAuth: true },
    },
    {
        path:'/payments',
        name:'payments',
        component : Payments,
        meta: { requiresAuth: true },
    },
    {
        path:'/payment_details',
        name:'payment_details',
        component : PaymentsDetails,
        meta: { requiresAuth: true },
    },
    {
        path:'/orders_details/:id',
        name:'order.details',
        component : Orders_Details,
        props:true,
        meta: { requiresAuth: true },
    },
    {
        path:'/contacts',
        name:'contacts',
        component : Contacts,
        meta: { requiresAuth: true },
    },
  
    {
        path:'/letters',
        name:'letters',
        component : Letters,
        meta: { requiresAuth: true },
    },
  
    
]

const router = createRouter({
    history:createWebHistory(),
    routes

})
router.beforeEach((to, from, next) => {
    const isAuthenticated = localStorage.getItem('access_token');
  
    if (to.matched.some((record) => record.meta.requiresAuth) && !isAuthenticated) {
      next('/login'); // Redirect to login if authentication is required and user is not authenticated
    } else {
      next();
    }
  });
export default router;