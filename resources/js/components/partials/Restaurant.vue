<template>

    <div class="card my-3">

        <img src="https://picsum.photos/150/100" class="card-img-top" alt=""> 
        
        <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{name}}</h5>

                <strong v-if="tipologies.length > 1">
                    Tipologie: 
                    <span class="font-weight-normal" v-for="(tipology, count) in tipologies" :key="'typology_' + tipology.id">
                        {{tipology.name}}<span v-if="count < tipologies.length -1">, </span>
                    </span>
                </strong>
                <strong v-else>
                    Tipologia: 
                    <span class="font-weight-normal" v-for="(tipology, count) in tipologies" :key="'typology_' + tipology.id">
                        {{tipology.name}}<span v-if="count < tipologies.length -1">, </span>
                    </span>
                </strong>
    
                <p class="my-3 ">{{description}}</p>
                            
            <div class="mt-auto mx-auto">
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
            "slug": String,
            "tipologies": Array,
            "description": String
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/variables.scss";
  
    .ms_btn{
        background-color: $darkOrange;
        border: 2px solid brown;
        color: white;
        font-weight: bold;
        
        &:hover{
            border: 2px solid $darkOrange;
            background-color: brown;
        }
    }

</style>