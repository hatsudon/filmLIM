import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue'
//import Alpine from 'alpinejs';
import ShowMap from './components/ShowMap.vue'
import LocationRecord from './components/LocationRecord.vue'

//window.Alpine = Alpine;

//Alpine.start();


const app = createApp({});
app.component("show-map", ShowMap);
app.component("location-record", LocationRecord);
app.mount("#app");