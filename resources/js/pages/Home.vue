<template>
    <div>
        <ul>
            <li v-for="post in posts" :key="post.slug">
                <h3>{{post.title}}</h3>
                <router-link :to="{name:'single-post', params:{slug: post.slug}}">vai all'articolo</router-link>
                <p>{{post.content}}</p>
                <span v-if="post.category">Categoria: {{post.category.name}}</span>
                <div v-if="post.tags">
                    Argomenti: <span v-for="(tag,index) in post.tags" :key="index">{{tag.name}}</span>
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