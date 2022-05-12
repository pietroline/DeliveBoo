import vue from "vue";
import VueRouter from "vue-router";

vue.use(VueRouter);

import Home from "./pages/Home";
import SingleRestaurant from "./pages/SingleRestaurant";
import NotFound from "./pages/NotFound";

const router = new VueRouter({

    mode: "history",
    routes:[
        {
            path:"/",
            name: "home",
            component: Home
        },
        {
            path:"/restaurants/:slug",
            name: "single-restaurant",
            component: SingleRestaurant
        },
        {
            path:"/*",
            name: "not-found",
            component: NotFound
        },
    ]
});

export default router;