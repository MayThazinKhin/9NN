<template>
    <div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="transfer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
            <div class="modal-content" style="border-radius: 4px;" id="app">
                <form id="add_form" action=""  method="post">
                    <div class="modal-header border-bottom-0 mt-3">
                        <div class="text-left pl-4 pt-1">
                            <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">
                                Transfer Item</p>
                        </div>
                    </div>

                    <div class="modal-body mx-4 pt-2 pb-0">
                        <div class="mb-4">
                            <label class="label-form mb-1" style="font-size: 15px!important;">Amount</label>
                            <input v-model="input_amount" type="text" class="input-form" placeholder="Amount" style="font-size: 14px!important;">

                        </div>

                        <div class="mb-4">
                            <label class="label-form mb-1" style="font-size: 15px!important;color: #1b1e21">To</label>
                            <select v-model="target" class="selectpicker d-block" data-width="100%" title="Choice..."
                                    data-style="select-form w-100">
                                <option value="1">Shop</option>
                                <option value="2">Kitchen</option>
                                <option value="3">Bar</option>
                            </select>
                        </div>

                    </div>
                    <span style="margin-left: 150px;" v-if="is_amount_exceeds" class="text-danger">Invalid Amount</span>
                    <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                        <button class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">Cancel</button>
                        <button type="button" @click.prevent="create" class="btn btn-danger pl-3" style="font-size: 16px!important;"> Confirm </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Vuex, { mapState } from "vuex";
import { ajaxHelper } from "../helpers/ajax_helper.js";
Vue.use(Vuex);
export default {
    props: [],
    data() {
        return {
            input_amount: '',
            target: '',
            is_amount_exceeds: false
        };
    },

    methods: {



        create() {
            let self = this;
            ajaxHelper.ajaxHeaders();
            let form ={
                count: this.input_amount,
                type_id: this.target,
                id: this.id
            }
            $.post('/inventory_transfer', JSON.stringify(form))
                .done(function(data) {
                    if (data.success) {
                        location.reload();
                    }
                })
                .fail(function(xhr, status, error) {
                    self.errors = JSON.parse(xhr.responseText).errors;
                });
        },




    },
    created() {

    },

    computed: {
        ...mapState({
            id: state => state.inventory_transfer.id,
            count: state => state.inventory_transfer.count
        }),

    },

    watch: {
        id: function (){
            this.input_amount="";
            this.target="";
            this.$forceUpdate();
            this.$nextTick(function(){ $('.selectpicker').selectpicker('refresh'); });
        },
        count: function() {
            if(this.count < parseInt(this.input_amount) ) this.is_amount_exceeds = true;
            else this.is_amount_exceeds = false;
        },
        input_amount: function() {
            if(this.count < parseInt(this.input_amount)) this.is_amount_exceeds = true;
            else this.is_amount_exceeds = false;

        },

    },

};
</script>
