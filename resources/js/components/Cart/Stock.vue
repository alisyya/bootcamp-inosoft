<template>
  <tr>
    <th scope="row">{{ cartItem.title }}</th>
    <td>Rp. {{ cartItem.price }}</td>
    <td>{{ cartItem.quantity }}</td>
    <td><button class="btn btn-dark" @click="deleteItem()">Delete</button></td>
  </tr>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "ProductListItem",
  props: ["productItem"],
  methods: {
    addToCart() {
      this.$store.dispatch("addProductToCart", {
        id: this.productItem.id,
        title: this.productItem.title,
        price: this.productItem.price,
        quantity: 1,
      });
    },
  },
};
</script>