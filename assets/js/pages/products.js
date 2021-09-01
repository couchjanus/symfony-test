// assets/js/pages/products.js
import Vue from 'vue';
import VueRouter from 'vue-router';

import App from '@/pages/products.vue';

const router = new VueRouter({
    routes: [
    {
      path: '/',
      component: App,
      children: [
        {
          // при совпадении пути с шаблоном /user/:id/posts
          // в <router-view> компонента User будет показан UserPosts
          // path: 'posts',
          // component: UserPosts
        }
      ]
    }
  ]
  //routes // сокращённая запись для `routes: routes`
});


const app = new Vue({
    router,
    render: (h) => h(App),
}).$mount('#app')
