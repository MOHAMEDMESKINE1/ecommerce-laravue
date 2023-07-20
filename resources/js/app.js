import './bootstrap';


import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap's CSS
import {createApp} from 'vue';
import Toast, { useToast } from 'vue-toastification';
import 'vue-toastification/dist/index.css';

import App from './App.vue'
import router from './router';
createApp(App)
.use(router)
.use(Toast)
.mount("#app")