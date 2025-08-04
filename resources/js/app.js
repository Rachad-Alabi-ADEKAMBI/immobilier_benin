import { createApp } from 'vue';
import HomePageComponent from './components/HomePageComponent.vue';
import AdsPageComponent from './components/AdsPageComponent.vue';


// Crée une instance de l'application Vue
const app = createApp({});

// Enregistre le composant pour cette page
app.component('home-page-component', HomePageComponent);
app.component('ads-page-component', AdsPageComponent);

// Monte l'application Vue sur l'élément avec l'ID 'app-home'
app.mount('#app');