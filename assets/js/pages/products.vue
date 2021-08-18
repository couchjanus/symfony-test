<template>
    <div>
        <div>
            <div>
              Product
              <catalog-component></catalog-component>
            </div>
        </div>
    </div>
</template>

<script>
import CatalogComponent from '@/components/catalog';

export default {
    name: 'Products',
    components: {
        CatalogComponent,
    },
    props: {
    },
};
</script>
