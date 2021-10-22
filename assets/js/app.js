// main application js/app.js
import Vue from 'vue';
import router from '@/router';
import store from '@/store/index';

import { library } from '@fortawesome/fontawesome-svg-core'
var fas = require('@fortawesome/fontawesome-free-solid')['default']
library.add(fas)
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
Vue.component('font-awesome-icon', FontAwesomeIcon);

import App from '@/App.vue';

import axios from '@/services/axios'
window.axios = axios
require('@/store/subscriber')


import { currency } from '@/filters/currency'

Vue.filter('currency', currency)


store.dispatch('auth/attempt', localStorage.getItem('token')).then(()=>{
new Vue({
    router,
    store,
    render: h => h(App),
}).$mount('#app');
})


