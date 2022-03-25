<template>
    <div>
        <h3>{{post.title}}</h3>
        <p>{{post.content}}</p>
        <span v-if="post.category">Categoria: {{post.category.name}}</span>
        <div v-if="post.tags">
            Argomenti: <span v-for="(tag,index) in post.tags" :key="index">{{tag.name}}</span>
        </div>
        <router-link :to="{name:'home'}">HOME</router-link>
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data (){
        return {
            post: []
        }
    },
    created(){
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then((response)=>{ 
            this.post = response.data;
        })
        .catch((error) => {
            this.$router.push({name: "page-404"});
        })
    }
}
</script>