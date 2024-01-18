/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from './router/index';
import AppComponent from './components/App.vue';
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import store from './stores/index'

import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const app = createApp({
  components: {
    AppComponent,
  }
});

const pinia = createPinia()
app.use(pinia)
pinia.use(piniaPluginPersistedstate)

app.use(Toast);
app.use(store)
app.use(router)
app.use(VueAxios, axios)

app.mount('#app')
