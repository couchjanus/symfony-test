<template>
    <div>
        <div>
            <div>
                <h3>
                  {{ item.name }}
                </h3>
            </div>

            <div>
                <p>
                    <strong>${{ item.price }}</strong>
                </p>

                <button>
                    View Product
                </button>
            </div>
        </div>

        <div>
            <small>brought to you by {{ item.brand }}</small>
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
