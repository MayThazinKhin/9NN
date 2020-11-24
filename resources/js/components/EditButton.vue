<template>
    <button type="button" class="btn-clear " @click.prevent="setEditItem" title="Edit"  id="edit-button" data-toggle="modal" data-target="#edit">
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
            this.$store.commit("setEditData", JSON.parse(this.entity));
        }
    }
};
</script>

<style></style>
