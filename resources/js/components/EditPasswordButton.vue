<template>
    <button type="button"
            class="btn-clear "
            title="Password Reset"
            data-toggle="modal"
            data-target="#edit-password"
            @click.prevent="setEditItem">
        <a class="a-clear">
            <i class="fas fa-lock-open" style="color:#673ab7;"></i>
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
    },
};
</script>

<style></style>
