import { createRouter,createWebHistory } from "vue-router";

import Dashboard from '../components/Dashboard.vue';
import Orders from '../components/Orders.vue';
import Statistics from '../components/Statistics.vue';
import Products from '../components/Products.vue';
import Customers from '../components/Customers.vue';
import Categories from '../components/Categories.vue';
import Payments from '../components/Payments.vue';
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