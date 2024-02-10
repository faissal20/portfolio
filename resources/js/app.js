/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router';
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

// components
import ExampleComponent from './components/ExampleComponent.vue';


// pages 
import AppPage from './AppPage.vue';
import Home from './pages/Home.vue';
import Statistics from './pages/Statistics.vue';



app.component('example-component', ExampleComponent);
app.component('app-page', AppPage);
app.component('home-page', Home);
app.component('statistics-page', Statistics);

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
]

const router = createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
})


app.use(router)


app.mount('#app');
