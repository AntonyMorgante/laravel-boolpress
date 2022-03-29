<template>
    <div>
        <Header />
        <Main />
        <Footer />
    </div>
</template>

<script>
import Header from "./components/Header.vue";
import Main from "./components/Main.vue";
import Footer from "./components/Footer.vue";


export default{
    name: "App",
    components: {
        Header,
        Main,
        Footer
    }
}

</script>

<style lang="scss">
body{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

.container{
    max-width: 1170px;
    margin: 0 auto;
}


.post{
    padding:20px;
    background-color: lightgray;
    margin-bottom:30px;
    border-radius: 20px;

    .post-title{
        font-size:30px;
        text-decoration: none;
        color: black;
    }

    img{
    max-width:98%;
    }
}
</style>