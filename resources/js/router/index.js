import { createRouter,createWebHistory } from "vue-router";

import Dashboard from '../components/Dashboard.vue';
import Orders from '../components/orders/index.vue';
import Orders_Details from '../components/orders/Details.vue';
import Statistics from '../components/statistics/index.vue';
import Products from '../components/products/index.vue';
import Edit from '../components/products/Edit.vue';

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


import Products_Details from '../Details.vue';

const routes = [
    {
        path:'/dashboard',
        name:'Dashboard',
        component : Dashboard
    },
    // front end

    {
        path:'/',
        name:'index_home',
        component : IndexHome
    },
    {
        path:'/details_product',
        name:'details_product',
        component : Products_Details
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
        path:'/home',
        name:'home',
        component : Home
    },
   
    {
        path:'/orders',
        name:'orders',
        component : Orders
    },
    {
        path:'/products',
        name:'products.index',
        component : Products
    },
    {
        path:'/products/edit/:id',
        name:'products.edit',
        component : Edit,
        props : true
    },
    {
        path:'/statistics',
        name:'statistics',
        component : Statistics
    },
    {
        path:'/customers',
        name:'customers',
        component : Customers
    },
    {
        path:'/categories',
        name:'categories',
        component : Categories
    },
    {
        path:'/payments',
        name:'payments',
        component : Payments
    },
    {
        path:'/payment_details',
        name:'payment_details',
        component : PaymentsDetails
    },
    {
        path:'/orders_details',
        name:'orders_details',
        component : Orders_Details
    },
    {
        path:'/contacts',
        name:'contacts',
        component : Contacts
    },
  
    
]

const router = createRouter({
    history:createWebHistory(),
    routes

})

export default router;