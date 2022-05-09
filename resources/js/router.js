import vue from "vue";
import VueRouter from "vue-router";

vue.use(VueRouter);

import Home from "./pages/Home";
import Restaurants from "./pages/Restaurants";
import Restaurant from "./components/partials/Restaurant";
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
            path:"/restaurants",
            name: "restaurants",
            component: Restaurants
        },
        {
            path:"/restaurants/:slug",
            name: "restaurant",
            component: Restaurant
        },
        {
            path:"/*",
            name: "not-found",
            component: NotFound
        },
    ]
});

export default router;