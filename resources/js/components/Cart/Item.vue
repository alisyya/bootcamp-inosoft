<template>
        <div class="main">
        <h1 class="display-4">Keranjang Belanja</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <Stock v-for="cartItem in cartItems" :key="cartItem.id" :cartItem="cartItem"></Stock>
                    <tr>
                       <td> <h3>Total :</h3></td>
                       <td></td>
                       <td><h3>Rp. {{TotalPrice}}</h3></td> 
                       <td></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary" onClick="alert('Checkout Berhasil')">Checkout</button>
        </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Stock from './Stock.vue'
export default {
  name: "CartList",
  components:{
      Stock
  },
  computed: {
    ...mapGetters(["cartItems","TotalPrice"]),
  }
};
</script>
<style scoped>
.main{
    max-width: 80%;
}
</style>

    