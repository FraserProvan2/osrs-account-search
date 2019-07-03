require('./bootstrap');

window.Vue = require('vue');

Vue.component('account-look-up', require('./components/AccountLookUp.vue').default);
Vue.component('stats-list', require('./components/StatsList.vue').default);

const app = new Vue({
    el: '#app',
});
