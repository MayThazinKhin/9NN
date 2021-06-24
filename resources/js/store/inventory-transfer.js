export const inventory_transfer = {
    state: {
        count: '',
        id: '',
    },

    mutations: {
        setCount(state,data){
            state.count = data;
        },
        setId(state,data){
            state.id = data;
        },


    }
};
