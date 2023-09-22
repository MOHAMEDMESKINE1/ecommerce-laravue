import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap's CSS


import {createApp} from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue';
import { ref } from 'vue';

import 'vue-toastification/dist/index.css';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Toast from 'vue-toastification';
import router from './router';
import '../css/app.css';
import axios from 'axios';

axios.defaults.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

const app = createApp(App)
const pinia = createPinia();
// Create a reactive variable for theme mode
const darkMode = ref(false);
// import pagination from 'v-pagination-3'; 
// Method to toggle the theme mode
const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    document.documentElement.setAttribute('data-theme', darkMode.value ? 'dark' : 'light');
  };
// Add a method to toggle the theme mode
app.config.globalProperties.$toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    document.documentElement.setAttribute('data-theme', darkMode.value ? 'dark' : 'light');
  };
// mak axios global
app.config.globalProperties.$axios = axios;
app.use(router);
app.use(Toast);
app.use(pinia)
app.use(VueSweetalert2);
app.provide('darkMode', darkMode); 
app.provide('toggleDarkMode', toggleDarkMode);
app.mount("#app")
