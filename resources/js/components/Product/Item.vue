<template>
  <div class="main">
    <table class="table table-hover">
      <tbody>
        <ProductStock
          v-for="productItem in productItems"
          :key="productItem.id"
          :productItem="productItem"
        />
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import ProductStock from "./Stock.vue";
export default {
  name: "ProductList",
  components: {
    ProductStock,
  },
  components: {
    ProductStock,
  },
  computed: {
    ...mapGetters(["productItems"]),
  },
};
</script>
<style scoped>
.main {
  max-width: 80%;
}
</style>

