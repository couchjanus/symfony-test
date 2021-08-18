<template>
    <div>
        <div class="row">
            <div>
              Here title
                <title-component :text="title" />
            </div>
            <product-list
                :products="products"
            />
        </div>
    </div>
</template>

<script>
import ProductList from '@/components/product-list';
import TitleComponent from '@/components/title';

export default {
    name: 'Catalog',
    components: {
        ProductList,
        TitleComponent,
    },
    props: {
    },
    data: () => ({
        products: [
          {
            id: 1,
            name: 'Product 1',
            brand: 'Brand 1',
            price: 11
          },
          {
            id: 2,
            name: 'Product 2',
            brand: 'Brand 2',
            price: 22
          }
        ],
        title: "Products catalog"
    }),
};
</script>

<style>
</style>
