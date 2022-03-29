<template>
    <div class="container">
        <ul>
            <li v-for="category in categories" :key="category.slug">
                <div class="cat-name">{{category.name}}</div>
                <router-link :to="{name:'single-category', params:{slug:category.slug}}">Visualizza i {{category.posts.length}} post appartenenti a questa categoria</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Categories",
    data (){
        return {
            categories: []
        }
    },
    created(){
        axios
        .get("/api/categories")
        .then((response)=>{    
            this.categories = response.data;
        })
    }
}
</script>

<style lang="scss" scoped>
ul{
    list-style-type: none;

    li{
        margin-bottom:20px;

        a{
            text-decoration: none;
            color:rgb(75,75,75);
            font-style: italic;
        }
    }
}

.cat-name{
    font-size: 20px;
    margin-bottom:10px;
}
</style>