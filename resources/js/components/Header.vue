<template>
    <header>
        <nav>
            <li><router-link :to="{name:'home'}">HOME</router-link></li>
            <li><router-link :to="{name:'about'}">CHI SIAMO</router-link></li>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style lang="scss" scoped>
nav{
    list-style-type: none;
    margin-left: 30px;

    li{
        display: inline-block;
        padding: 15px;

        a{
            text-decoration: none;
            color: black;
            font-size: 20px;
        }
    }
}
</style>