import axios from "axios";
import Vue from "vue";
Vue.config.productionTip = false;
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

(async () => {
    const files = import.meta.glob("../components/*.vue");
    for (const path in files) {
        if (!path.startsWith("../components/-")) {
            const componentModule = await files[path]();
            const componentName = path.match(/\/([^/]+)\.vue$/)[1];
            Vue.component(componentName, componentModule.default);
        }
    }

    const vue = new Vue({
        el: "#app",
    });

    window.vue = vue;
})();
