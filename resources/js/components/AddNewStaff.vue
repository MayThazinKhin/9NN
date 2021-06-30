<template>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content" style="border-radius: 4px;" id="app">
                <form action="#"  method="post">
                    <div class="modal-header border-bottom-0 mt-3">
                        <div class="text-left pl-4 pt-1">
                            <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">
                                Add New Staff</p>
                        </div>
                    </div>

                    <div class="modal-body mx-4 pt-2 pb-0">

                        <div class="mb-4">
                            <label class="label-form mb-1" style="font-size: 15px!important;">Name</label>
                            <input
                                   v-model="name" type="text" class="input-form" placeholder="Name" style="font-size: 14px!important;" autocomplete="off">
                            <span class="text-danger" v-if="errors.name"> {{errors.name[0]}} </span>
                        </div>

                        <div class="mb-4">
                            <label class="label-form mb-1" style="font-size: 15px!important;">Password</label>
                            <input
                                v-model="password" type="password" class="input-form" placeholder="Password" style="font-size: 14px!important;" autocomplete="off">
                            <span class="text-danger" v-if="errors.password"> {{errors.password[0]}} </span>

                        </div>

                        <div class="mb-4">
                            <label class="label-form mb-1" style="font-size: 15px!important;color: #1b1e21">Role</label>
                            <select v-model="role_id" class="selectpicker d-block" data-width="100%" title="Role..."
                                    data-style="select-form w-100"


                            >
                                <option v-model="role_id"
                                        v-for="(role, i) in roles"
                                        :key="i"
                                        :value="role.id"

                                >{{ role.name }}</option
                                >

                            </select>
                            <span class="text-danger" v-if="errors.role_id"> {{errors.role_id[0]}} </span>

                        </div>
                        <div class="mb-4" v-if="is_marker">
                            <label class="label-form mb-1" style="font-size: 15px!important;">Fee</label>
                            <input
                                v-model="fee" type="number" class="input-form" placeholder="Fee" style="font-size: 14px!important;" autocomplete="off">
                        </div>
                        <div class="mb-4" v-if="is_marker">
                            <label class="label-form mb-1" style="font-size: 15px!important;">Fee Paid</label>
                            <input
                                   v-model="fee_paid" type="number" class="input-form" placeholder="Fee" style="font-size: 14px!important;" autocomplete="off">
                        </div>
                        <div class="mb-4" >
                            <label class="label-form mb-1" style="font-size: 15px!important;">Monthly Fee</label>
                            <input
                                   v-model="monthly_fee" type="number" class="input-form" placeholder="Fee" style="font-size: 14px!important;" autocomplete="off">
                        </div>

                    </div>
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
    props: ["roles"],
    data() {
        return {
            name: '',
            password: '',
            fee: 0,
            fee_paid: 0,
            monthly_fee: 0,
            role_id: '',
            is_marker: false,
            errors: []
        };
    },

    methods: {
        create() {
            let self = this;
            ajaxHelper.ajaxHeaders();
            let form = {
                name: this.name,
                password: this.password,
                monthly_fee: this.monthly_fee,
                role_id: this.role_id
            }
            if(this.is_marker)
            {
                form.fee_paid = this.fee_paid;
                form.fee = this.fee;
            }
            $.post('/staffs', JSON.stringify(form))
                .done(function(data) {
                    if (data.success) {
                        location.reload();
                    }
                })
                .fail(function(xhr, status, error) {
                    self.errors = JSON.parse(xhr.responseText).errors;
                    console.log(self.errors);
                });
        },

    },
    watch: {
        role_id: function() {
            this.is_marker = (this.role_id == 3) ? true : false;

        }
    },

};
</script>

<style></style>
