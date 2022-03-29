import Vue from "vue";
import VueRouter from "vue-router";
    
Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Categories from './pages/Categories.vue';
import SingleCategory from './pages/SingleCategory.vue';
import SinglePost from './pages/SinglePost.vue';
import PageNotFound from './pages/PageNotFound.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: About
        },
        {
            path: "/categorie",
            name: "categories",
            component: Categories
        },
        {
            path: "/categories/:slug",
            name: "single-category",
            component: SingleCategory
        },
        
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost
        },
        {
            path: "#",
            name: "page-404",
            component: PageNotFound
        },
    ]
});

export default router
