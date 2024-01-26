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

axios.defaults.headers['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`;

const app = createApp(App)
const pinia = createPinia();

// mak axios global
app.config.globalProperties.$axios = axios;
app.use(router);
app.use(Toast);
app.use(pinia)
app.use(VueSweetalert2);
app.mount("#app")
