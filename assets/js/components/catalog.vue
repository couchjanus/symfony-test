<template>
    <div>
      <main>
      <div class="container">

            <div class="row">
              <div class="col-lg-3">
                <h5 class="mb-4 text-center text-uppercase">Categories</h5>
              </div>
              <div class="col-lg-9">
                <title-component :text="title" />
                <product-list :products="products" />
              </div>
            </div>


      </div>
    </main>
    </div>
</template>

<script>
import ProductList from '@/components/product-list';
import TitleComponent from '@/components/title';
import axios from 'axios';



export default {
    name: 'Catalog',
    components: {
        ProductList,
        TitleComponent,
    },
    props: {
    },
    data: () => ({
        products: [],
        title: "Products catalog"
    }),
    created() {
        console.log("Created event");
        this.getProducts();
    },
    methods: {
        async getProducts() {
            this.products = [];
            try {
                console.log("Try fetching");
                const response = await this.fetchProducts()
                console.log(response);
                this.products = response.data['hydra:member'];
            } catch (error) {
                console.log(error.message);
            }
        },

        fetchProducts() {
            return axios({
                method: 'get',
                url: '/api/products',
            });
        },
    },

};
</script>

<style>
</style>
