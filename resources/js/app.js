import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap's CSS


import {createApp} from 'vue';
import App from './App.vue';
import { ref } from 'vue';


import 'vue-toastification/dist/index.css';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Toast from 'vue-toastification';
import router from './router';
// import Pagination from 'laravel-vue-pagination';
import '../css/app.css';
// Create a reactive variable for theme mode
const darkMode = ref(false);
// import pagination from 'v-pagination-3'; 
// Method to toggle the theme mode
const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    document.documentElement.setAttribute('data-theme', darkMode.value ? 'dark' : 'light');
  };
  

  
const app = createApp(App)
// Add a method to toggle the theme mode
app.config.globalProperties.$toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    document.documentElement.setAttribute('data-theme', darkMode.value ? 'dark' : 'light');
  };
//  app.component('v-pagination', pagination);

app.use(router);
app.use(Toast);
app.use(VueSweetalert2);
app.provide('darkMode', darkMode); 
app.provide('toggleDarkMode', toggleDarkMode);
app.mount("#app")

