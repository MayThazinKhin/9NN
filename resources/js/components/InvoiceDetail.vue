<template>
    <div>
        <form class="position-relative w-100 h-100 pb-3 mt-1">
<!--            <button type="button" @click="submit()" class="btn btn-primary btn-sm">Submit</button>-->
            <div class="d-flex justify-content-between mb-3">
                <nav style="margin-top: 8px">
                    <a href="#" class="a-clear text-dark fm-roboto fs17">Invoices</a>
                </nav>
                <div>

                    <div class="d-inline-block ml-3">
                        <button :disabled="is_credit_error" type="button" @click="submit()" class="btn btn-danger py-1 rounded-0" style="font-size: 16px!important;">Invoices ထုတ်ရန်</button>
                    </div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-8 pl-0">

                    <div class="row bg-white mx-0 py-3 mb-3">
                        <div class="col-5 pt-2" style="border-right: 1px solid #ddd">
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Total</p>
                                </div>
                                <div class="col">
<!--                                    <p class="label-form" style="color:#6b6e71;"> {{$items->net_total + $periods->total_value}} MMKs</p>-->
                                    <p class="label-form" style="color:#6b6e71;">MMKs {{total}} </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Discount</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs {{ discount }} </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="mb-0" style="font-size: 16px!important;font-family: Padauk!important;">ပေးချေငွေ</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs {{ paid_value }} </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Tax</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs {{ tax }} </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="mb-0" style="font-size: 16px!important;font-family: Padauk!important;">အကြွေး</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs {{ credit }} </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Net Total</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs {{ net_value }} </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="mb-0" style="font-size: 16px!important;font-family: Padauk!important;">ပြန်အမ်းငွေ</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs {{ change }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="col pt-2 pb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="label-form" style="color: #5b6167!important;">Member <span style="font-size: 16px!important;font-family: Padauk!important;">အမည်</span></label>
<!--                                    <form action=" {{route('members.search')}} " method="post">-->
<!--                                        @csrf-->
                                        <label class="search-box-container">
                                            <input v-model="query" v-on:keyup="getMembers(query)"  type="text" id="search_input" class="input-form py-1 "  autocomplete="off">
<!--                                            <i class="fal fa-search search-icon"></i>-->
                                            <ul style="list-style: none;padding-left: 16px;">
                                                <li style="cursor:pointer;padding-top: 4px" v-for="(result,i) in results.filter(property => property !== '')" :key="i" v-on:click="setMember(result)">
                                                    {{result.name}}
                                                </li>
                                            </ul>
                                        </label>
<!--                                    </form>-->
                                </div>
                                <div class="col mb-3">
                                    <label for="" class="label-form" style="color: #5b6167!important;">Discount <span style="font-size: 16px!important;font-family: Padauk!important;">ပမာဏ</span> </label>
                                    <input type="text" v-model="discount" class="input-form pt-0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="" class="label-form" style="color: #5b6167!important;"><span style="font-size: 16px!important;font-family: Padauk!important;">ပေးချေငွေ</span></label>
                                    <input v-model="paid_value" type="text" class="input-form pt-0">
                                </div>
                                <div class="col mb-3 pt-3">
                                    <input v-model="is_tax" type="checkbox" class="input-form d-inline-block mr-2" style="width: fit-content;">
                                    <label for="" class="label-form d-inline-block" style="color: #5b6167!important;">Tax <span style="font-size: 16px!important;font-family: Padauk!important;"> ကပ် မကပ်</span></label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <span v-if="is_credit_error" class="text-danger">{{credit_error_msg}}</span>

                    <div class="row mx-0">
                        <div class="col bg-white position-relative" style="min-height: 50vh;padding-bottom: 52px">
                            <table class="table table-borderless">
                                <thead>
                                <tr class="" style="border-bottom: 2px solid #dee2e6">
                                    <th class="table-header font-weight-normal">
                                        No.
                                    </th>
                                    <th class="table-header" style="font-size: 16px!important;font-family: Padauk!important;">မီနူးနာမည်</th>
                                    <th class="table-header" style="font-size: 16px!important;font-family: Padauk!important;">Price</th>
                                    <th class="table-header" style="font-size: 16px!important;font-family: Padauk!important;">ပမာဏ</th>
                                    <th class="table-header text-right" style="font-size: 16px!important;font-family: Padauk!important;">ကျသင့်ငွေ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,i) in items.items" :key="i">
                                    <th scope="row" class="padding-table-row">
                                            <span class="text-td font-weight-normal">
                                                            {{i+1}}
                                            </span>
                                    </th>
                                    <td class="padding-table-row">
                                        <div class="text-td text-capitalize">
                                            {{item.name}}
                                        </div>
                                    </td>
                                    <td class="padding-table-row">
                                        <div class="text-td">
                                            {{item.price}}
                                        </div>
                                    </td>
                                    <td class="padding-table-row">
                                        <div class="text-td">
                                            {{item.count}}
                                        </div>
                                    </td>
                                    <td class="padding-table-row">
                                        <div class="text-td text-right">
                                            {{item.total}}
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div style="position: absolute;bottom: 8px;right: 0;width: 100%">
                                <div class="d-flex justify-content-end" style="border-top: 1px solid #e1e5e8;padding-top: 22px;margin-left: 40px;margin-right: 40px;">
                                    <p style="font-size: 16px!important;font-family: Padauk!important;font-weight: 800" class="d-inline-block">အစားအသောက်အတွက် ကျသင့်ငွေ စုစုပေါင်း</p>
                                    <p style="font-family: 'Roboto', sans-serif;font-size: 15px;padding-left: 24px;padding-right: 18px;"
                                       class="d-inline-block">{{items.net_total}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 bg-white position-relative" style="min-height: 50vh;padding-bottom: 52px">
                    <table class="table table-borderless" id="myTable">
                        <thead>
                        <tr class="" style="border-bottom: 1px solid #dee2e6">
                            <th class="table-header fs15" style="color:#3b3e41;">Start Time</th>
                            <th class="table-header fs15" style="color:#3b3e41;">End Time</th>
                            <th class="table-header fs15" style="color:#3b3e41;">Min</th>
                            <th class="table-header fs15" style="color:#3b3e41;">Total</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="(period,p) in periods.items" :key="p">
                            <td class="padding-table-row" style="padding-top: 8px">
                                <div class="text-td" style="font-family:'Roboto', sans-serif">
                                    {{period.start_time}}
                                </div>
                            </td>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize" style="font-family:'Roboto', sans-serif">
                                    {{period.end_time}}
                                </div>
                            </td>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize" style="font-family:'Roboto', sans-serif">
                                    {{period.total_min}}
                                </div>
                            </td>
                            <td class="padding-table-row">
                                <div class="text-td" style="font-family:'Roboto', sans-serif">
                                    {{period.value}}
                                </div>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                    <div style="position: absolute;bottom: 8px;right: 0;width: 100%">
                        <div class="d-flex justify-content-end" style="border-top: 1px solid #e1e5e8;padding-top: 22px;margin-left: 40px;margin-right: 40px;">
                            <p style="font-size: 14px!important;font-family: 'Roboto', sans-serif;color: #666;" class="d-inline-block">Total</p>
                            <p style="font-family: 'Roboto', sans-serif;font-size: 14px;padding-left: 32px;padding-right: 12px;color: #666"
                               class="d-inline-block">{{periods.total_value}}</p>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
</template>
<script>
import Vuex, { mapState } from "vuex";
import { ajaxHelper } from "../helpers/ajax_helper.js";
Vue.use(Vuex);
export default {
    props: ["items","periods","members","id"],
    data() {
        return {
            query: '',
            results: [],
            member_id: '',
            member: '',
            discount: 0,
            is_tax: false,
            paid_value: 0,
            total: this.items.net_total + this.periods.total_value,
            tax: Math.round(((this.items.net_total + this.periods.total_value)*5)/100),
            net_value: Math.round(((this.items.net_total + this.periods.total_value)*5)/100) + this.items.net_total + this.periods.total_value,
            credit: Math.round(((this.items.net_total + this.periods.total_value)*5)/100) + this.items.net_total + this.periods.total_value,
            change: 0,
            credit_error_msg: 'Credit Value is more than Maximum Allowance!',
            is_credit_error: false

        };
    },

    methods: {

        getMembers(query)
        {
            if(query === ''){
                this.results = [];
            }else{
                query = query.toUpperCase();
                this.results = $.map(this.members, function(entry) {
                    let match = entry.name.toUpperCase().match(query);
                    return match ? entry : null;
                });

            }
        },
        setMember(member)
        {
            this.results = [];
            this.query = member.name;
            this.member_id = member.id;
            this.member = member;
            if(this.credit > this.member.allowance) this.is_credit_error = true;

        },
        submit()
        {
            let data = {
                'total' :this.total,
                'member_id': this.member_id,
                'discount': this.discount,
                'paid_value': this.paid_value,
                'tax': this.tax,
                'net_value': this.net_value,
                'credit': this.credit,
                'is_tax': this.is_tax,
                'session_id': this.id,
                'change': this.change,
                'cashier_id': 1
            }
            fetch('/invoice_update/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    if(data.is_success){
                        window.location.replace('/invoices');
                    }else{
                        window.location.reload();
                    }
                });
        }
    },

    created(){
        // console.log(this.id);
    },

    watch: {
        discount: function()
        {
            this.net_value = (this.tax+this.total)-this.discount;
        },
        paid_value: function ()
        {
            this.net_value>this.paid_value ? this.credit = this.net_value-this.paid_value : this.credit=0;
            this.net_value<this.paid_value ? this.change = this.paid_value-this.net_value : this.change=0;
            this.net_value = (this.tax+this.total)-this.discount;
            // this.net_value>this.paid_value ? this.debt = this.net_value-this.paid_value : this.debt=0;
        },
        net_value: function ()
        {
            this.net_value>this.paid_value ? this.credit = this.net_value-this.paid_value : this.credit=0;
        },
        credit: function ()
        {
            if(this.member !== '')
            {
                this.credit > this.member.allowance ? this.is_credit_error = true : this.is_credit_error = false;
            }
        }

    }
};
</script>
