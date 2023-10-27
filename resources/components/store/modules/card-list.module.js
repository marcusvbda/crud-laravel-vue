const cardListModule = {
    namespaced: true,
    state: () => ({
        news: [1, 2, 3, 4, 5, 6, 7, 8],
    }),
    getters: {
        news(state) {
            return state.news;
        },
    },
    mutations: {
        //
    },
    actions: {
        //
    },
};

export default cardListModule;
