<template>
    <tr>
      <th scope="row">{{cartItem.nama_item}}</th>
      <td>Rp. {{cartItem.harga}}</td>
      <td>{{cartItem.quantity}}</td>
      <td><button class="btn btn-dark" @click="deleteItem()">Delete</button></td>
    </tr>
</template>

<script>
export default {
  name: "CartListItem",
  props: ['cartItem'],
  methods: {
      deleteItem(){
          this.$store.dispatch('deleteItemFromCart',{
              id: this.cartItem.id,
              quantity: this.cartItem.quantity
          })
      }
  },
};
</script>