/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from "vue-router";
Vue.use(VueRouter);
// コンポーネントの定義
const Index = { template: "<div>index</div>" };
const Detail = { template: "<div>foo</div>" };
// パスに対応するコンポーネントを定義する
const routes = [
    {path: '/user/myprof/', component: Detail},
    {path: '/user/index/', component: Index},
];
// Vue Routerのインスタンス生成。引数にルーティングを指定
const router = new VueRouter({
    mode: "history",
    routes //routes: routesの省略
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('my-component', require('./components/MyComponent.vue').default);
Vue.component('profiel-component', require('./components/ProfielComponent.vue').default);
Vue.component('detail-component', require('./components/DetailComponent.vue').default);
Vue.component('top-component', require('./components/TopComponent.vue').default);
Vue.component('memoform', require('./components/MemoForm.vue').default);
Vue.component('app', require('./App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
