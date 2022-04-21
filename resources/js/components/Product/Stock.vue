<template>
    <tr>
      <th scope="row">{{productItem.title }}</th>
      <td >{{productItem.description }}</td>
      <td>{{productItem.stock }}</td>
      <td>Rp. {{productItem.price }}</td>
      <td><button class="btn btn-primary" @click="addToCart()">Add to Cart</button></td>
    </tr>
</template>

<script>
import {mapActions} from 'vuex'
export default {
  name: "ProductListItem",
  props: ["productItem"],
  methods: {
      addToCart(){
          this.$store.dispatch('addProductToCart',{
              id: this.productItem.id,
              title: this.productItem.title,
              price: this.productItem.price,
              quantity: 1
          })
      }
  },
};
</script>

