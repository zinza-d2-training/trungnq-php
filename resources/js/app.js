import Vue from "vue";
import router from "./router";
import VueRouter from 'vue-router';
import ".//../css/app.css";
import { ValidationProvider } from "vee-validate/dist/vee-validate.full.esm";
import { ValidationObserver } from "vee-validate";

Vue.component("ValidationProvider", ValidationProvider);
Vue.component("ValidationObserver", ValidationObserver);

window.Vue = require('vue').default;

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router
});
