<template>
    <div class="main">
        <router-link to="/product" class="btn btn-primary btn-sm">
               <p>Product List</p>
        </router-link>
        <router-link to="/cart" class="btn btn-primary btn-sm">
               <p> Check Out ({{cartTotal}})</p>
        </router-link>
        <!-- <button class="btn btn-primary-outline">Product List</button>
        <button class="btn btn-primary">Check Out</button> -->
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    computed:{
        ...mapGetters(["cartTotal"])
        
    }
};
</script>
<style scoped>
.main{
    display: inline-block;
    width: 50%;
}
</style>