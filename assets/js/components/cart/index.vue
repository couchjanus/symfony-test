<template>
  <div class="container">
    <h2>Your Cart</h2>
    <p v-show="!products.length"><i>Please add some products to cart.</i></p>
    <div class="list-group">
      <label class="list-group-item d-flex gap-3" v-for="product in products"
             :key="product.id">
        <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked style="font-size: 1.375em;">
        <span class="pt-1 form-checked-content">
        <strong>{{ product.name }}</strong>
        <small class="d-block text-muted">
          {{ product.price | currency }} x {{ product.quantity }} = <strong>{{ (product.price*product.quantity)| currency}}</strong>
        </small>
      </span>
      </label>

    </div>
    <p>Total: {{ total | currency }}</p>
    <p><button :disabled="!products.length" @click="checkout(products)">Checkout</button></p>
    <p v-show="checkoutStatus">Checkout {{ checkoutStatus }}.</p>
  </div>
</template>

<script>
import { mapGetters, mapState } from 'vuex'

export default {
  name: "ShoppingCart",
  computed: {
    ...mapState({
      checkoutStatus: state => state.cart.checkoutStatus
    }),
    ...mapGetters('cart', {
      products: 'cartProducts',
      total: 'cartTotalPrice'
    })
  },
  methods: {
    checkout (products) {
      this.$store.dispatch('cart/checkout', products)
    }
  }
}
</script>

<style scoped>

</style>