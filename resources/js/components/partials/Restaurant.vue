<template>

    <div class="card my-3">

        <img :src="image" class="card-img-top" :alt="image + 'name' "> 
        
        <div class="card-body d-flex flex-column">
                <h4 class="card-title text-center"><strong>{{name}}</strong></h4>

                <strong v-if="typologies.length > 1">
                    Tipologie: 
                    <span class="font-weight-normal" v-for="(typology, count) in typologies" :key="'typology_' + typology.id">
                        {{typology.name}}<span v-if="count < typologies.length -1">, </span>

                    </span>
                </strong>
                <strong v-else>
                    Tipologia: 
                    <span class="font-weight-normal" v-for="(typology, count) in typologies" :key="'typology_' + typology.id">
                        {{typology.name}}<span v-if="count < typologies.length -1">, </span>
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
            "typologies": Array,
            "description": String,
            "image": String
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