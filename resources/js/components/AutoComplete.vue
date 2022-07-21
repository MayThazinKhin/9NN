<template>
    <div>
        <form action=""  id ="search" method="post" class="d-inline-block mb-0">
            <label class="search-box-container">
                <input v-model="search_name" type="text" class="search-box py-1 " id=""
                       value="item_id"
                       placeholder=" Search..." autocomplete="off" @keyup="search"
                >
                <i class="fal fa-search search-icon"></i>
                <option v-model="item_id"
                        v-for="(item, i ) in items"
                        :key="i"
                        :value="item.id"
                >
                    {{item.name}}
                </option>
            </label>


        </form>
    </div>

</template>

<script>
import Vuex, { mapState } from "vuex";
import { ajaxHelper } from "../helpers/ajax_helper.js"
Vue.use(Vuex);
export default {
    data(){
        return {
            search_name : '',
            item_id: '',
            items : self.items
        }
    },
    methods:{
        search(){
            let self = this
            ajaxHelper.ajaxHeaders();
            let form = {
                name : this.search_name
            }
            $.post('/search_inventory_item', JSON.stringify(form))
                .done(function(data) {
                    if (data.success) {
                        self.items =  data.items
                    }
                })
        }
    }
}
</script>

<style scoped>
</style>
