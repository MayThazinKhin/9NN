<template>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content" style="border-radius: 4px;" id="app">
                <form action="#"  method="post">
                    <div class="modal-header border-bottom-0 mt-3">
                        <div class="text-left pl-4 pt-1">
                            <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">
                                {{ title }}</p>
                        </div>
                    </div>

                    <div v-for="(input,i) in inputs" :key="i" class="modal-body mx-4 pt-2 pb-0">

                        <div class="mb-4" v-if="input.type == 'text'">
                            <label class="label-form mb-1" style="font-size: 15px!important;">{{ input.label }}</label>
                            <input :id="input.name"
                                   v-model="form[input.name]" type="text" class="input-form" :placeholder="input.label" style="font-size: 14px!important;" autocomplete="off">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>
                        <div class="mb-4" v-if="input.type == 'number'">
                            <label class="label-form mb-1" style="font-size: 15px!important;">{{ input.label }}</label>
                            <input :id="input.name"
                                   v-model="form[input.name]" type="number" class="input-form" :placeholder="input.label" style="font-size: 14px!important;" autocomplete="off">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                        <div class="mb-4" v-if="input.type == 'hidden'">
                            <input :id="input.name" hidden
                                   v-model="form[input.name]" type="text" class="input-form" :placeholder="input.label" style="font-size: 14px!important;" autocomplete="off">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                        <div class="mb-4" v-if="input.type == 'email'">
                            <label class="label-form mb-1" style="font-size: 15px!important;">{{ input.label }}</label>
                            <input  v-model="form[input.name]" type="email" class="input-form" :placeholder="input.label" style="font-size: 14px!important;">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                        <div class="mb-4" v-if="input.type == 'password'">
                            <label class="label-form mb-1" style="font-size: 15px!important;">{{ input.label }}</label>
                            <input  v-model="form[input.name]" type="password" class="input-form" :placeholder="input.label" style="font-size: 14px!important;">
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>

                        <div class="mb-4" v-if="input.type == 'textarea'">
                            <label class="label-form mb-1" style="font-size: 15px!important;">{{ input.label }}</label>
                            <textarea v-model="form[input.name]" :placeholder="input.label" class="input-form animated-txtarea" rows="5" style="font-size: 14px!important;"></textarea>
                            <span v-if="errors[input.name]" class="text-danger">{{
                                    errors[input.name][0]
                                }}</span>
                        </div>


                        <div class="mb-4" v-if="input.type == 'select'">
                            <label class="label-form mb-1" style="font-size: 15px!important;color: #1b1e21">{{ input.label }}</label>
                            <select :id="input.label" v-model="form[input.name]" :title="input.label" class="selectpicker d-block" data-width="100%" title="Choice..."
                                    data-style="select-form w-100"
                                    @change="input.label == 'Role' ? disableFeeFor9N() : fetchChildData(input)"

                            >
                                <option v-if="input.data"
                                        v-for="(item, j) in input.data"
                                        :key="j"
                                        :value="item.id"

                                >{{ item.name }}</option
                                >
                            </select>
                            <span v-if="errors[input.name]" class="text-danger">
                                {{
                                    errors[input.name][0]
                                }}
                            </span>
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
    props: ["title", "inputs", "url"],
    data() {
        return {
            form: {},
            errors: {},
            isFeeDisable: false
        };
    },

    methods: {

        fetchChildData(input)
        {
            if(input.parent_of)
            {
                let item= input.name;
                let outputs =   input.parent_of+'s';
                let input_field = input.input_field_for_child_data;
                let selected = input.data.find(i => i.id ==  this.form[input.name]);

                let data = {};
                data[item] = selected[input_field];
                let child = this.inputs.find(i => i.name == input.parent_of);

                let self = this;
                ajaxHelper.ajaxHeaders();
                $.post(input.child_data_url, JSON.stringify(data))
                    .done(function(data) {
                        if (data.success)
                        {
                            Vue.set(child,'data', data[outputs]);
                            self.$forceUpdate();
                            self.$nextTick(function(){ $('.selectpicker').selectpicker('refresh'); });
                        }
                    })
            }
        },

        create() {
            let self = this;
            ajaxHelper.ajaxHeaders();
            $.post(this.url, JSON.stringify(this.form))
                .done(function(data) {
                    if (data.success) {
                        location.reload();
                    }
                })
                .fail(function(xhr, status, error) {
                    self.errors = JSON.parse(xhr.responseText).errors;
                });
        },



        disableFeeFor9N(){
            let role = this.inputs.find(i => i.name ==  'role_id');
            $('#fee').attr('disabled',false);

            if(this.form[role.name] !== 3)
            {
                $('#fee').attr('disabled',true);
            }
        }
    },
    created() {
        for(let i=0; i<this.inputs.length; i++)
        {
            if(this.inputs[i].value) this.form[this.inputs[i].name] = this.inputs[i].value;
            else this.form[this.inputs[i].name] = "";
        }
    },

};
</script>

<style></style>
