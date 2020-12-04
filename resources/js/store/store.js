import Vue from 'vue';
import Vuex from 'vuex';

import {add_modal} from './add-modal';
import {edit_modal} from './edit-modal';



Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        add_modal: add_modal,
        edit_modal: edit_modal,
    },
    state: {
    },

    mutations: {

    },

});

