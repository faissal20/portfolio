/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import { createPinia } from 'pinia';
import { useUserStore } from './stores/user';

import 'primevue/resources/themes/aura-light-green/theme.css'

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

// components

// pages 
import 'primeicons/primeicons.css'
import AppPage from './AppPage.vue';
import Navbar from './components/Navbar.vue';
import Home from './pages/Home.vue';
import Statistics from './pages/Statistics.vue';
import Logs from './pages/Logs.vue';
import Movies from './pages/Movies.vue';
import TimeLine from './pages/TimeLine.vue';
import Things from './pages/Things.vue';
import PrimeVue from "primevue/config";



app.component('app-page', AppPage);
app.component('home-page', Home);
app.component('statistics-page', Statistics);
app.component('logs-page', Logs);
app.component('movies-page', Movies);
app.component('navbar', Navbar);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

const routes = [
    { path: '/', component: Home },
    { path: '/statistics', component: Statistics },
    { path: '/logs', component : Logs },
    { path: '/movies', component: Movies },
    { path: '/timeline', component: TimeLine },
    { path: '/things', component: Things },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
})

const pinia = createPinia()

app.use(router)
app.use(pinia)
app.use(PrimeVue, {
    unstyled: false
});

const userStore = useUserStore()

userStore.setUser(window.user);

app.mount('#app');
