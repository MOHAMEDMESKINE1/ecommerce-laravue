import { createRouter,createWebHistory } from "vue-router";

import Dashboard from '../components/Dashboard.vue';
import Orders from '../components/orders/index.vue';
import Statistics from '../components/statistics/index.vue';
import Products from '../components/products/index.vue';
import Customers from '../components/customers/index.vue';
import Categories from '../components/categories/index.vue';
import Payments from '../components/payments/index.vue';
import Home from '../App.vue';


const routes = [
    {
        path:'/dashboard',
        name:'Dashboard',
        component : Dashboard
    },
    {
        path:'/',
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
        name:'products',
        component : Products
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
  
    
]

const router = createRouter({
    history:createWebHistory(),
    routes

})
export default router;