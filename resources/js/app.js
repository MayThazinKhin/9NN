require('./bootstrap');
import {store} from './store/store';
import 'nprogress/nprogress.css';

window.Vue = require('vue');

Vue.component('add-modal', require('./components/AddModal.vue').default,{name: 'add-modal'});
Vue.component('add-new-staff', require('./components/AddNewStaff.vue').default,{name: 'add-new-staff'});
Vue.component('edit-modal', require('./components/EditModal.vue').default);
Vue.component('edit-staff', require('./components/EditStaff.vue').default);
Vue.component('edit-button', require('./components/EditButton.vue').default);
Vue.component('edit-staff-button', require('./components/EditStaffButton.vue').default);
Vue.component('edit-password', require('./components/EditPassword.vue').default);
Vue.component('invoice-detail', require('./components/InvoiceDetail.vue').default);
Vue.component('shop-invoice-detail', require('./components/ShopInvoiceDetail.vue').default);
Vue.component('edit-password-button', require('./components/EditPasswordButton.vue').default);
Vue.component('set-inventory-transfer-amount', require('./components/SetInventoryTranferAmount.vue').default);
Vue.component('inventory-transfer', require('./components/InventoryTransfer.vue').default);
Vue.component('item-subtract', require('./components/ItemSubtract.vue').default);
Vue.component('auto-complete', require('./components/AutoComplete.vue').default,{name: 'auto-complete'});
const app = new Vue({
    el: '#app',
    store,
});

