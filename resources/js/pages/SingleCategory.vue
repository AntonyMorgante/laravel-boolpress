<template>
    <div class="container">
        <div v-if="category.posts.length>0">
            <div v-for="post in category.posts" :key="post.slug">
                    <div class="post">
                        <router-link :to="{name:'single-post', params:{slug: post.slug}}" class="post-title">{{post.title}}</router-link>
                        <p>{{post.content}}</p>
                        <div v-if="post.tags">
                            Argomenti: <span v-for="(tag,index) in post.tags" :key="index">{{tag.name}}</span>
                        </div>
                        <div v-if="post.image">
                            <img :src="`/storage/${post.image}`" alt="">
                        </div>
                    </div>
            </div>
        </div>
        <div v-else>
            Al momento non c'è alcun posto appartenente alla categoria {{category.name}}
        </div>
    </div>
</template>

<script>
export default {
    name:"SingleCategory",
    data(){
        return{
            category:[],
        }
    },
    created(){
        axios
        .get(`/api/categories/${this.$route.params.slug}`)
        .then( (response) => {
            this.category = response.data;
        })
    }
}
</script>

<style lang="scss" scoped>
.post{
    padding:20px;

    .post-title{
        font-size:30px;
        text-decoration: none;
        color: black;
    }
}
</style>