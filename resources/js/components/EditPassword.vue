<template>
    <div class="modal fade" id="edit-password" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content" style="border-radius: 4px;" id="app">
                <form id="add_form" action="#"  method="post">
                    <div class="modal-header border-bottom-0 mt-3">
                        <div class="text-left pl-4 pt-1">
                            <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">
                                {{ title }}</p>
                        </div>
                    </div>

                    <div v-for="(input,i) in inputs" :key="i" class="modal-body mx-4 pt-2 pb-0">

                        <div class="mb-4" v-if="input.type == 'text'">
                            <label class="label-form mb-1" style="font-size: 16px!important;">{{ input.label }}</label>
                            <input  v-model="form[input.name]" type="text" class="input-form" :placeholder="input.label" style="font-size: 14px!important;">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                        <div class="mb-4" v-if="input.type == 'email'">
                            <label class="label-form mb-1" style="font-size: 16px!important;">{{ input.label }}</label>
                            <input  v-model="form[input.name]" type="email" class="input-form" :placeholder="input.label" style="font-size: 14px!important;">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                        <div class="mb-4" v-if="input.type == 'password'">
                            <label class="label-form mb-1" style="font-size: 16px!important;">{{ input.label }}</label>
                            <input  v-model="form[input.name]" type="password" class="input-form" :placeholder="input.label" style="font-size: 14px!important;">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                        <div class="mb-4" v-if="input.type == 'textarea'">
                            <label class="label-form mb-1" style="font-size: 16px!important;">{{ input.label }}</label>
                            <textarea v-model="form[input.name]" :placeholder="input.label" class="input-form" cols="30" rows="3" style="font-size: 14px!important;"></textarea>
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>


                        <div class="mb-4" v-if="input.type == 'select'">
                            <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">{{ input.label }}</label>
                            <select v-model="form[input.name]" :title="input.label" class="selectpicker d-block" data-width="100%" title="Choice..."
                                    data-style="select-form w-100">
                                <option v-if="input.data"
                                        v-for="(item, j) in input.data"
                                        :key="j"
                                        :value="item.id"
                                >{{ item.name }}</option
                                >
                            </select>
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                    </div>
                    <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                        <button class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">Cancel</button>
                        <button @click.prevent="update" class="btn btn-info pl-3" style="font-size: 16px!important;"> Confirm </button>
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
    props: ["title", "inputs", "url"],
    data() {
        return {
            form: {},
            errors: {},
            route: ""
        };
    },

    methods: {
        update() {
            let self = this;
            ajaxHelper.ajaxHeaders();
            $.ajax({
                url: this.route,
                type: "post",
                contentType: "application/json",
                data: JSON.stringify(this.form),
                success: function(data) {
                    console.log(data);
                    if (data.success) {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    self.errors = JSON.parse(xhr.responseText).errors;
                }
            });
        }
    },

    created() {
        for(let i=0; i<this.inputs.length; i++){
            this.form[this.inputs[i].name] = "";
        }
    },

    computed: {
        ...mapState({
            edit_data: state => state.edit_modal.edit_data
        })
    },
    watch: {
        edit_data: function() {
            for(let i=0; i<this.inputs.length; i++){
                this.form[this.inputs[i].name] = this.edit_data[this.inputs[i].name];
                if(this.inputs[i].type == 'select') $(".selectpicker").selectpicker("refresh");
                //TODO refresh selectpicker
            }
            this.route = this.url + "/" + this.edit_data.id;
            this.errors = {};
        }
    }
};
</script>

<style></style>
