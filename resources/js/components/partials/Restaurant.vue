<template>

    <div class="card my-3">

        <img src="https://picsum.photos/150/100" class="card-img-top" alt=""> 
        
        <div class="card-body ms_card">
            <h5 class="card-title">{{name}}</h5>
        
            <div class="d-flex justify-content-center my-4">
                <router-link class="btn ms_btn" :to="{name: 'single-restaurant', params: {slug: slug}}">Vai al Ristorante</router-link>
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

<style lang="scss" scoped>
    @import "../../../sass/variables.scss";

    .ms_card {
        border: 1px solid $darkOrange;
        border-radius: 5px;
    }
    
    .ms_btn{
        background-color: $darkOrange;
        border: 1px solid $lightOrange;
        color: white;
        font-weight: bold;
        
        
    }
</style>