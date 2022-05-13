import vue from "vue";
import VueRouter from "vue-router";

vue.use(VueRouter);

import Home from "./pages/Home";
import SingleRestaurant from "./pages/SingleRestaurant";
import Payment from "./pages/Payment.vue";
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
            path:"/payment",
            name: "payment",
            component: Payment
        },
        {
            path:"/*",
            name: "not-found",
            component: NotFound
        },
    ]
});

export default router;