import VueRouter from 'vue-router';
import Vue from 'vue';
import Home from '@/components';
import store from '@/store'

import ProductDetails from '@/components/catalog/products/detail';
import NotFound from '@/components/common/404';
import Dashboard from '@/components/customer/dashboard'

Vue.use(VueRouter);

function lazyLoad(item){
    return () => import(`@/components/${item}.vue`)
}

const routes = [
        {
            path: '/', 
            name: "home",
            component: Home
        },
        {
            path: '/catalog', 
            name: "catalog",
            component: lazyLoad('catalog/index')
        },
        {
            path: '/cart',
            name: "shopping_cart",
            component: lazyLoad('cart/index')
        },
        {
            path: '/details/:slug', 
            name: "details",
            component: ProductDetails
        },
        {
            path: '/login',
            name: 'login',
            component: lazyLoad('auth/login')
        },
        {
            path: '/register',
            name: 'register',
            component: lazyLoad('auth/register')
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            beforeEnter: (to, from, next) => {
                if(!store.getters['auth/isAuthenticated']){
                    return next({
                    name: 'login'
                    })
                }
                next()
            }
        },
        {path: '*', component: NotFound},
    ];

const router = new VueRouter({
    // mode: 'history',
    // base: process.env.BASE_URL,
    routes
})

export default router

