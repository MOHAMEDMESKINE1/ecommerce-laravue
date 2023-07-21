import './bootstrap';


import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap's CSS
import {createApp} from 'vue';
import 'vue-toastification/dist/index.css';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import Toast, { useToast } from 'vue-toastification';

import App from './App.vue'
import router from './router';
createApp(App)
.use(router)
.use(Toast)
.use(VueSweetalert2)
.mount("#app")