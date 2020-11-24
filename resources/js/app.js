require('./bootstrap');


import {store} from './store/store';

import 'nprogress/nprogress.css';

window.Vue = require('vue');

Vue.component('add-modal', require('./components/AddModal.vue').default);
Vue.component('edit-modal', require('./components/EditModal.vue').default);
Vue.component('edit-button', require('./components/EditButton.vue').default);



const app = new Vue({
    el: '#app',
    store,
});

