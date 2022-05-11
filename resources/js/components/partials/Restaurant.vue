<template>

    <div class="card my-3">

        <!-- <img src="..." class="card-img-top" alt="..."> -->
        
        <div class="card-body">
            <h5 class="card-title">{{name}}</h5>
        
            <div class="d-flex justify-content-center my-4">
                <router-link class="btn btn-primary ms_btn" :to="{name: 'single-restaurant', params: {slug: slug}}">Vai al Ristorante</router-link>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Restaurant",

        props:{
            "name": String,
            "slug": String
        }
    }
</script>

<style>

</style>