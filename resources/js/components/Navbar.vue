<template>
  <div class="main">
    <router-link
      to="/product"
      class="d-flex justify-content-center btn btn-warning"
    >
      <strong>Product List</strong>
    </router-link>
    <router-link
      to="/cart"
      class="d-flex justify-content-center btn btn-secondary"
    >
      <strong> Check Out ({{ cartTotal }})</strong>
    </router-link>
    <!-- <button class="btn btn-primary-outline">Product List</button>
        <button class="btn btn-primary">Check Out</button> -->
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["cartTotal"]),
  },
};
</script>
<style scoped>
.main {
  display: inline-block;
  width: 50%;
}
</style>

