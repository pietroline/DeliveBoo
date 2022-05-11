<template>
    <header class="container-fluid">
            <nav class="navbar navbar-expand navbar-light bg-light">

                <router-link class="navbar-brand" :to="{name: 'home'}">DeliveBoo</router-link>
            
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active" v-for="itemMenu in navMenu" :key="itemMenu.routeName">
                        <router-link class="nav-link" :to="{name: itemMenu.routeName}">{{itemMenu.label}}</router-link>
                    </li>

                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Area Admin</a>
                    </li>
                </ul>

            </nav>
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
                    {
                        routeName: "restaurants",
                        label: "Ristoranti"
                    },
                    {
                        routeName: "cart",
                        label: "Carrello"
                    }
                ],
               

            }
        },

    }
</script>

<style>


</style>