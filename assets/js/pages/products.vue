<template>
    <div>
        <catalog-component></catalog-component>
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
