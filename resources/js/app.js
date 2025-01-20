import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue'
//import Alpine from 'alpinejs';
import ShowMap from './components/ShowMap.vue'

//window.Alpine = Alpine;

//Alpine.start();


const app = createApp({});
app.component("show-map", ShowMap);
app.mount("#app");