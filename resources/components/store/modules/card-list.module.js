const cardListModule = {
    namespaced: true,
    state: () => ({
        newsList: {},
    }),
    getters: {
        newsList(state) {
            return state.newsList;
        },
    },
    mutations: {
        setNewsList(state, newsList) {
            state.newsList = newsList;
        },
    },
};

export default cardListModule;
