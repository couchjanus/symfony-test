<template>
    <div>
        <h1>
            {{ text }}
        </h1>
    </div>
</template>

<script>
export default {
    name: 'Title',
    props: {
        text: {
            type: String,
        },
    },
};
</script>


