import Vue from "vue";

const files = require.context("./", true, /(\/)(?!.*\/)(?!-.*$).*\.vue$/i);
files.keys().each((key) => {
    console.log(key);
    Vue.component(key.split("/").pop().split(".")[0], files(key).default);
});
