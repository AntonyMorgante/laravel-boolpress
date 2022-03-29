<template>
    <header>
        <nav>
            <li><router-link :to="{name:'home'}">Home</router-link></li>
            <li><router-link :to="{name:'about'}">Chi siamo</router-link></li>         
            <li><router-link :to="{name:'categories'}">Categorie</router-link></li>
            <li class="right"><a href="/admin/">Area riservata</a></li>
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
    margin: 0 30px;

    li{
        display: inline-block;
        padding: 15px;

        a{
            text-decoration: none;
            text-transform: uppercase;
            color: black;
            font-size: 20px;
        }
    }

    .right{
        float:right;
    }

}
</style>