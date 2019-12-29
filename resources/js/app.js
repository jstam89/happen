require('./bootstrap');

window.Vue = require('vue');

// Event bus for easy sharing data between components
Vue.prototype.$eventBus = new Vue();

// Register components here
Vue.component('vue-add-to-cart', require('./components/order/AddToCart').default);
Vue.component('vue-cart', require('./components/order/Cart').default);
Vue.component('vue-cart-item', require('./components/order/CartItem').default);

const app = new Vue({
    el: '#vue', // IMPORTANT! normally #app
});
