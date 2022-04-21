<template>
    <tr>
      <th scope="row">{{cartItem.title}}</th>
      <td>Rp. {{cartItem.price}}</td>
      <td>{{cartItem.quantity}}</td>
      <td><button class="btn btn-primary" @click="deleteItem()">Delete</button></td>
    </tr>
</template>

<script>
export default {
  name: "CartStock",
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

