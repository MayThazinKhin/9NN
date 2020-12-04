export const add_modal = {
    state: {
        add_type: '',
        add_is_model: false,
        add_url: '',
    },

    mutations: {
        setAddType(state,data){
            state.add_type = data;
        },

        setAddUrl(state,data){
            state.add_url = data;
        },

        setAddIsModel(state,data){
            state.add_is_model = data;
        }
    }
};
