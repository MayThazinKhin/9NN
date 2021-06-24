<template>
    <button type="button" @click.prevent="setData" title="Transfer Item" data-toggle="modal" data-target="#transfer" class="btn-clear ">
        <i class="fas fa-exchange-alt" style="color: rgb(103, 58, 183);"></i>
    </button>
</template>

<script>
export default {
    props: ["id","count"],
    data() {
        return {};
    },
    methods: {
        setData()
        {
            this.$store.commit("setId", JSON.parse(this.id));
            this.$store.commit("setCount", JSON.parse(this.count));
        }
    },
};
</script>

<style></style>
