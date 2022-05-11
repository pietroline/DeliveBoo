window.Vue = require("vue");

window.axios = require("axios");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import App from "./views/App";
import router from './router';

import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application

const app = new Vue({
    el: "#root",
    render: h => h(App), 
    router
});