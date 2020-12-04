export const edit_modal = {
    state: {
        edit_type: '',
        edit_is_model: false,
        edit_url: '',
        edit_data: {}
    },

    mutations: {
        setEditType(state,data){
            state.add_type = data;
        },

        setEditUrl(state,data){
            state.add_url = data;
        },

        setEditIsModel(state,data){
            state.is_model = data;
        },

        setEditData(state,data){
            state.edit_data = data;
        }

    }
};
