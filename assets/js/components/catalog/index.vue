<template>
  <div>
    <title-component :page_title="page_title"></title-component>
    <product-list></product-list>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import TitleComponent from '@/components/layouts/page_title';
import ProductList from '@/components/catalog/products';

export default {
  name: "CatalogComponent",
  components: {
    TitleComponent,
    ProductList
  },
  data: () => (
      {
        page_title: 'Products Catalog',
      }
  ),
  // computed: mapGetters({
  // }),
  // created() {
  // },
  // methods:{
  // }
}
</script>

<style scoped>

</style>