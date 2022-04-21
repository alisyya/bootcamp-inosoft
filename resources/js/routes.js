import Stock from './components/StockComponent.vue';
import Checkout from './components/CheckoutComponent.vue';

export const routes = [
    {path: '/product', component: Stock, name: "Stock"},
    {path: '/', component: Stock, name: "Home"},
    {path: '/checkout', component: Checkout, name: "Checkout"}
];