import ProductList from './components/Product/Item.vue';
import CartList from './components/Cart/Item.vue';
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