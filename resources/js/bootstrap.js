import axios from "axios";
import { VueInit, store } from "@/components/store";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

VueInit.prototype.$store = store;
VueInit.prototype.$http = axios;
const vue = new VueInit({
    el: "#app",
    store,
});

window.vue = vue;
