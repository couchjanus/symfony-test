<template>
    <div>
      <div class="col">
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>

          <div class="card-body">
            <h3 class="card-text">{{ item.name }}</h3>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">Detail</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
              </div>
              <small class="text-muted">${{ item.price }}</small>
            </div>
          </div>
        </div>
      </div>

    </div>
</template>



<script>
export default {
    name: 'ProductCard',
    props: {
        item: {
            type: Object,
        },
    },
};
</script>

<style>

</style>
