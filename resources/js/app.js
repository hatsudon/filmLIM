import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue'
//import Alpine from 'alpinejs';
import ShowMap from './components/ShowMap.vue'
import ExampleComponent from "./components/ExampleComponent.vue";

//window.Alpine = Alpine;

//Alpine.start();


const app = createApp({});
app.component("example-component", ExampleComponent);
app.component("show-map", ShowMap);
app.mount("#app");