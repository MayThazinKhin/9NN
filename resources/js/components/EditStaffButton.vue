<template>
    <button type="button"
            class="btn-clear "
            title="Edit"
            data-toggle="modal"
            data-target="#edit_staff"
            @click.prevent="setEditItem">
        <a class="a-clear">
            <i class="far fa-file-edit fw300" style="color:#673ab7;"></i>
        </a>
    </button>
</template>

<script>
export default {
    props: ["entity"],
    data() {
        return {};
    },
    methods: {
        setEditItem()
        {
            this.$store.commit("setStaffData", JSON.parse(this.entity));
        }
    },
};
</script>

<style></style>
