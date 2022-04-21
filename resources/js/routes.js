import ProductList from './components/Product/Product_List.vue';
import CartList from './components/Cart/Cart_List.vue';
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