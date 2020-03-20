/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "app-post-create",
    require("./components/posts/create.vue").default
);
Vue.component("app-post-show", require("./components/posts/show.vue").default);
Vue.component(
    "app-post-cards-list",
    require("./components/posts/post_cards_list.vue").default
);
Vue.component(
    "app-comments",
    require("./components/comments/comments.vue").default
);
Vue.component(
    "app-loading",
    require("./components/partials/loading.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueNoty from "vuejs-noty";
import "vuejs-noty/dist/vuejs-noty.css";

Vue.use(VueNoty);

Vue.component("pagination", require("laravel-vue-pagination"));

const app = new Vue({
    el: "#app"
});
