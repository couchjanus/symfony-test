// assets/js/pages/products.js
import Vue from 'vue';
import App from '@/pages/products.vue';

// let data = { a: 1 };
//
// const app = new Vue({
//     el: '#app',
//     template: '<h1>Products catalog</h1>',
//
//     data: data
// });
//
// console.log(app.a) // => 1
// console.log(app.$data === data) // => true

//
// let data = {
//     title: 'Products catalog',
//     number: 5,
//     ok: false,
//     message: 'Hello Vue',
//     id: 2,
//     a: 1,
//     isButtonDisabled: true,
//     buttonValue: "Заборонено тицяти",
//     url: 'https://gordonua.com/ukr/bulvar/news/chi-mozhna-tikati-paltsem-v-ljudej-i-jak-pravilno-nositi-sumochku-poradi-z-etiketu-vid-frejmut-1563332.html'
// };

// const app = new Vue({
//     el: '#app',
//     template: "<div><h1>{{title}}</h1> {{ a = 11 }} {{ number + 1 }} {{ ok ? 'YES' : 'NO' }} {{ message.split('').reverse().join('') }} <div v-bind:id=\"'list-' + id\">This is ID</div> {{ a? message : ok }} <button v-bind:title=\"buttonValue\" v-bind:disabled=\"isButtonDisabled\">Запрещенная Кнопка</button> <a v-bind:href=\"url\">Дізнатись чому</a></div>",
//     data: data
// });

//

const app = new Vue({
    render: (h) => h(App),
}).$mount('#app')



