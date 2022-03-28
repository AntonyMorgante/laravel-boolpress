<template>
    <div class="container">
        <ul>
            <li v-for="post in posts" :key="post.slug">
                <h2>{{post.title}}</h2>
                <router-link :to="{name:'single-post', params:{slug: post.slug}}">vai all'articolo</router-link>
                <p>{{post.content}}</p>
                <span v-if="post.category">Categoria: {{post.category.name}}</span>
                <div v-if="post.tags">
                    Argomenti: <span v-for="(tag,index) in post.tags" :key="index">{{tag.name}}</span>
                </div>
                <div v-if="post.image">
                    <img :src="`/storage/${post.image}`" alt="">
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Home",
    data (){
        return {
            posts: []
        }
    },
    created(){
        axios
        .get("/api/posts")
        .then((response)=>{    
            this.posts = response.data;
        })
    }
}
</script>

<style lang="scss" scoped>
.container{
    max-width: 1170px;
    margin: 0 auto;
}

ul{
    list-style-type: none;

    li{
        margin-bottom:30px;
        padding:20px;
        background-color: lightgray;
        border-radius: 20px;

        h2{
            margin:0 0 10px;
        }
    }
}

img{
    max-width:98%;
}
</style>