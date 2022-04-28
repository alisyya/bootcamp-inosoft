import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    cartItems: [],
    cartTotal: 0,
    productItems: [],
    totalPrice:0

  },
  getters: {
    cart: state => state.cartItems,
    cartTotal: state => state.cartTotal,
    product: state => state.productItems,
    price: state => state.totalPrice
  },
  mutations: {
    UPDATE_CART_ITEMS (state, payload) {
        state.cartItems = payload;
    },
    ADD_TO_CART(state,{id,name,price,quantity}){
        state.totalPrice += price;
        state.cartTotal += quantity;
        let findProduct = state.productItems.find(o => o.name === name)

        findProduct.stock -= quantity;
        let findCart = state.cartItems.find(o => o.name === name)
        if(findCart){
            findCart.quantity +=1;
        }else{
            state.cartItems.push({
                id,
                name,
                price,
                quantity
            })
        }
    },

    UPDATE_PRODUCT_ITEMS (state, payload) {
        state.productItems = payload;
    },

    DELETE_ITEM_CART(state,{id,quantity,price}){
        let totalHarga = state.totalPrice += price;
        let findProduct = state.productItems.find(o => o.id === id)
        let findCart = state.cartItems.find(o => o.id === id)
        if(quantity === 1){
            state.cartItems.splice(state.cartItems.findIndex(function(i){
                return i.id === id;
            }), 1);
            findProduct.stock += 1;
            splice(totalHarga);
        }else{
            findCart.quantity -= 1;
            findProduct.stock += 1;
            splice(totalHarga);
        }


    }


  },
  actions: {
    getCartItems ({ commit }) {
        // axios.get('api/getItem').then((response) => {
        //   commit('UPDATE_CART_ITEMS', response.data.data)
        // });
    },
    addProductToCart({commit},{id,name,price , quantity}){
        commit('ADD_TO_CART',{id,name,price, quantity});
    },

    getProductItems ({ commit }) {
        // axios.get(`api/item`).then((response) => {
        //   commit('UPDATE_PRODUCT_ITEMS', response.data.data)
        // });
    },
    deleteItemFromCart({commit},{id,quantity,price}){
        commit('DELETE_ITEM_CART',{id,quantity});
    }
  }

})
