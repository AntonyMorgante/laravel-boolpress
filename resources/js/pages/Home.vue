<template>
    <div class="container">
        <ul>
            <li v-for="post in posts" :key="post.slug">
                <div class="post">
                    <router-link :to="{name:'single-post', params:{slug: post.slug}}" class="post-title">{{post.title}}</router-link>
                    <p>{{post.content}}</p>
                    <span v-if="post.category">Categoria: {{post.category.name}}</span>
                    <div v-if="post.tags">
                        Argomenti: <span v-for="(tag,index) in post.tags" :key="index">{{tag.name}}</span>
                    </div>
                    <div v-if="post.image">
                        <img :src="`/storage/${post.image}`" alt="">
                    </div>
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
ul{
    list-style-type: none;
}
</style>