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
        resetUrl() {
            const url = new URL(window.location.href);
            url.searchParams.set("page", 1);
            url.searchParams.set("filter", "");
            window.location.href = url.toString();
        },
        upsertNews({ dispatch, commit }, news) {
            commit("setIsLoading", true);

            if (news?.id) {
                return axios
                    .put(`/news/${news.id}`, news)
                    .finally(() => dispatch("resetUrl"));
            }

            return axios
                .post("/news", news)
                .finally(() => dispatch("resetUrl"));
        },

        destroyNews({ dispatch, commit }, id) {
            commit("setIsLoading", true);

            return axios
                .delete(`/news/${id}`)
                .finally(() => dispatch("resetUrl"));
        },
    },
};

export default cardListModule;
