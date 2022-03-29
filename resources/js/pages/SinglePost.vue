<template>
    <div class="container">
        <div class="post">
            <div class="post-title">{{post.title}}</div>
            <div v-if="post.image">
                <img :src="`/storage/${post.image}`" alt="">
            </div>
            <p>{{post.content}}</p>
            <span v-if="post.category">Categoria: {{post.category.name}}</span>
            <div v-if="post.tags">
                Argomenti: <span v-for="(tag,index) in post.tags" :key="index">{{tag.name}}</span>
            </div>
        </div>   
        <div class="add-comment">
            <p>Aggiungi un commento...</p>
            <form @submit.prevent="addComment()">
                <input type="text" id="name" v-model="formData.name" placeholder="inserisci il nome con cui il tuo commento sarà visualizzato">
                <textarea name="content" id="content" cols="30" rows="10" v-model="formData.content" placeholder="Inserisci il testo del tuo commento"></textarea>
                <div v-if="formErrors.content">
                    <ul>
                        <li v-for="(error,index) in formErrors.content" :key="index">
                            {{error}}
                        </li>
                    </ul>
                </div>
                <button type="submit">Aggiungi</button>
            </form>
            <div v-show="commentSent">
                Il tuo commento è in attesa di approvazione!
            </div>
        </div>     
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data (){
        return {
            post: [],
            formData: {
                name:"",
                content: "",
                post_id: null
            },
            commentSent: false,
            formErrors: {}
        }
    },
    created(){
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then((response)=>{ 
            this.post = response.data;
            this.formData.post_id = this.post.id;
        })
        .catch((error) => {
            this.$router.push({name: "page-404"});
        })
    },
    methods: {
        addComment(){
            axios
            .post(`/api/comments/`, this.formData)
            .then((response)=>{
                this.formData.name = "";
                this.formData.content = "";
                this.commentSent = true;
            })
            .catch((error)=>{
                this.formErrors = error.response.data.errors;
            })
        }
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