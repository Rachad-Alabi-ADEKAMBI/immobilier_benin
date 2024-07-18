/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import Welcome from './components/Welcome.vue';
import Faq from './components/Faq.vue';
import Ads from './components/front/Ads.vue';
import MyAds from './components/back/user/MyAds.vue';
import Needs from './components/back/user/Needs.vue';
import NewAd from './components/back/user/NewAd.vue';

import Users from './components/back/admin/Users.vue';
import Needs_admin from './components/back/admin/Needs_admin.vue';
import AllAds from './components/back/admin/AllAds.vue';


app.component('welcome', Welcome);
app.component('faq', Faq);
app.component('ads', Ads);
app.component('myads', MyAds);
app.component('needs', Needs);
app.component('newad', NewAd);

app.component('AllAds', AllAds);
app.component('needs_admin', Needs_admin);
app.component('users', Users);

app.mount('#app');
