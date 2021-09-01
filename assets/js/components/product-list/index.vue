<template>
    <div>
      <div class="py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
              <product-card
                  v-for="product in products"
                  :key="product['@id']"
                  :item="product"
              />

          </div>
        </div>
      </div>
    </div>
</template>

<script>
import ProductCard from '@/components/product-list/product-card';

export default {
    name: 'ProductList',
    components: {
        ProductCard,
    },
    props: {
        products: {
            type: Array,
        },
    },
};
</script>

<style>
</style>
