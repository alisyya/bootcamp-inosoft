<template>
        <div class="main">
              <tbody>
                  <ProductListItem v-for="productItem in product" :key="productItem.id" :productItem="productItem"/>
              </tbody>
        </div>
</template>

<script>
import { mapGetters } from 'vuex';
import ProductListItem from './Product_Item.vue'

export default {
  name: "ProductList",
  components:{
      ProductListItem
  },
  components: {
    ProductListItem
  },
  computed: {
    ...mapGetters([
      'product'
    ])
  },
  
 
};
</script>
<style scoped>
.main{
    max-width: 80%;
}
</style>