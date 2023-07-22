import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap's CSS


import {createApp} from 'vue';
import App from './App.vue';

import 'vue-toastification/dist/index.css';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Toast, { useToast } from 'vue-toastification';

import router from './router';



const app = createApp(App)
app.use(router)
app.use(Toast)
app.use(VueSweetalert2)
app.mount("#app")