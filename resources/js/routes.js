import ProductList from './components/Product/Stock';
import CartList from './components/Cart/Stock.vue';
export const routes = [
    {
        path: '/product',
        component: ProductList
    },
    {
        path: '/cart',
        component: CartList
    },
    {
        path: '/',
        redirect: '/product'
    },
];