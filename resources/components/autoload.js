import Vue from "vue";

const files = import.meta.globEager("./**/*.vue");
for (const path in files) {
    const componentModule = files[path];
    const componentName = path.match(/\/([^/]+)\.vue$/)[1];
    Vue.component(componentName, componentModule.default);
}
