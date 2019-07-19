
import "babel-polyfill";
import "whatwg-fetch";

import './bootstrap';
import Vue from "vue";
import VueRouter from './router';

import main from './Main';

const app = new Vue({
    el: '#app',
    router:VueRouter,
    render:h => h(main)
});
