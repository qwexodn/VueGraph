

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './views/Home';

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/',
            component:Home
        },
    ]
})


export default router;