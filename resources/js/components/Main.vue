<template>
    <router-view :key="$route.path"></router-view>
</template>

<script>
export default {
    name: "Main"
}
</script>

<style scoped>
ul{
    list-style-type: none;
}
</style>