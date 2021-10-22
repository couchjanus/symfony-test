// import store from './index';
import http from "@/services/httpService";
// import axios from "axios";
// import Vue from "vue";

export default {
    namespaced: true,
    state: {
        categories: [],
        activeCategory: null,
        products: [],
        activeProduct: null,
        brabds: [],
        activeBrand: null,
        error: null,
    },
    getters:{
        categories: state => state.categories,
        activeCategory: state => state.activeCategory,
        brands: state => state.brands,
        activeBrand: state => state.activeBrand,
        products: state => state.products,
        activeProduct: state => state.activeProduct,
        hasError: (state) => state.error !== null,
        error: (state) => state.error,
        hasProducts:(state) => state.products.length > 0,
        hasCategories:(state) => state.categories.length > 0,
        hasBrands:(state) => state.brands.length > 0,
    },
    mutations:{
        SET_CATEGORIES(state, categories) {
            state.categories = categories;
        },
        SET_ACTIVE_CATEGORY(state, activeCategory) {
            state.activeCategory = activeCategory;
        },
        SET_BRANDS(state, brands) {
            state.brands = brands;
        },
        SET_ACTIVE_BRAND(state, activeBrand) {
            state.activeBrand = activeBrand;
        },
        SET_PRODUCTS(state, products) {
            state.products = products;
        },
        SET_ACTIVE_PRODUCT(state, activeProduct) {
            state.activeProduct = activeProduct;
        },
        decrementProductStockQuantity (state, { id }) {
            const product = state.products.find(product => product.id === id)
            product.stockQuantity--
        }
    },
    actions:{
        FETCH_CATEGORIES({commit}) {
            return http.get('/categories').then(response => {
                commit('SET_CATEGORIES', response.body);
            });
        },
        SET_ACTIVE_CATEGORY({commit}, category) {
            commit('SET_ACTIVE_CATEGORY', category);
        },
        FETCH_BRANDS({commit}) {
            return http.get('/brands').then(response => {
                commit('SET_BRANDS', response.body);
            });
        },
        SET_ACTIVE_BRAND({commit}, brand) {
            commit('SET_ACTIVE_BRAND', brand);
        },
        // FETCH_PRODUCTS({commit}, categoryId) {
            // return http.get({'public/categories/{id}/products'id: categoryId}).then(response => {
            //     commit('SET_PRODUCTS', response.body);
            // });
        // },
        async FETCH_PRODUCTS({commit}) {
            return await http.get('/products').then(response => {
                // console.log('response: ', response);
                commit('SET_PRODUCTS', response.data);
            });
        },
        SET_ACTIVE_PRODUCT({commit}, product) {
            commit('SET_ACTIVE_PRODUCT', product);
        },
        FETCH_PRODUCT({commit}, id) {
            return http.get('/products/{id}').then(response => {
                commit('SET_ACTIVE_PRODUCT', response.body);
            });
        },
    }
}
