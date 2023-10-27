import Vue from "vue";
import Vuex from "vuex";
Vue.config.productionTip = false;
Vue.use(Vuex);
let modules = {};

const files = import.meta.globEager("./modules/**/*.module.js");
for (const path in files) {
    const componentModule = files[path];
    const componentName = path.match(/\/([^/]+)\.module.js$/)[1];
    modules[componentName] = componentModule.default;
}

export const store = new Vuex.Store({
    modules,
});

export const VueInit = Vue;
