import axios from "axios";

const cardListModule = {
    namespaced: true,
    state: () => ({
        newsList: {},
        crudVisible: false,
        isLoading: false,
        detailNews: {},
    }),
    getters: {
        newsList(state) {
            return state.newsList;
        },
        crudVisible(state) {
            return state.crudVisible;
        },
        isLoading(state) {
            return state.isLoading;
        },
        detailNews(state) {
            return state.detailNews;
        },
    },
    mutations: {
        setNewsList(state, newsList) {
            state.newsList = newsList;
        },
        setCrudVisible(state, crudVisible) {
            state.crudVisible = crudVisible;
        },
        setIsLoading(state, isLoading) {
            state.isLoading = isLoading;
        },
        setDetailNews(state, detailNews) {
            state.detailNews = detailNews;
        },
    },
    actions: {
        async createNews({ commit }, news) {
            commit("setIsLoading", true);

            return axios
                .post("/news", news)
                .catch((error) => {
                    reject(error);
                })
                .finally(() => {
                    const url = new URL(window.location.href);
                    url.searchParams.set("page", 1);
                    url.searchParams.set("filter", "");
                    window.location.href = url.toString();
                });
        },
    },
};

export default cardListModule;
