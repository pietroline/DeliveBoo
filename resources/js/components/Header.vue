<template>
    <header class="px-4">
        <b-navbar toggleable="lg" type="dark" class="p-0">
            <router-link class="navbar-brand p-0" :to="{name: 'home'}"> <a href="#"><img src="./../../../public/img/deliveboo-logo-orange-textwhite.png" class="img" alt=""></a></router-link>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active d-flex justify-content-center" v-for="itemMenu in navMenu" :key="itemMenu.routeName">
                        <router-link class="ms_color" :to="{name: itemMenu.routeName}">{{itemMenu.label}}</router-link>
                    </li>
                </ul>
        
                <b-navbar-nav class="ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex justify-content-center pb-2 pb-lg-0">
                            <a class="ms_color" href="/admin">Area Admin</a>
                        </li>
                    </ul>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </header>
</template>

<script>
    export default {
        name: "Header",

        data(){
            return{
                navMenu: [
                    {
                        routeName: "home",
                        label: "Home"
                    },
                ],
               

            }
        },

    }
</script>

<style lang="scss" scoped>

header{
    background-color: brown;
}

img{
    width: 90px;
}

.ms_color{
    color:#fff;
    font-size:15px;
    font-weight: bold;

}

</style>

