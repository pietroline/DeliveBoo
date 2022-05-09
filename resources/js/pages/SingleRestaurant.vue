<template>
     <div class="container">
        <div class="row row-cols-2">

            <div class="col">

               <div v-if="restaurant">

                    <h1>{{restaurant.name}}</h1>
                    <div> <strong>Phone:</strong> {{restaurant.phone}}</div>
                    <div> <strong>Email:</strong>  {{restaurant.email}}</div>
                    <div> <strong>Indirizzo:</strong> {{restaurant.address}}</div>
                
                    <div v-if="restaurant.typologies">
                         <strong>Tipologia:</strong>  
                         
                        <span v-for="(typology, count) in restaurant.typologies" :key="'typology_' + typology.id">
                            {{typology.name}}
                            <span v-if="count < restaurant.typologies.length-1">, </span>
                        </span>
                        
                    </div>
                    <p><strong>Descrizione:</strong>  {{restaurant.description}}</p>
    
                   
                    <router-link class="btn btn-primary my-3" :to="{name: 'restaurants'}">Torna ai ristoranti</router-link>

                </div>

            </div>

        </div>

    </div>
</template>

<script>

    import Restaurant from "./../components/partials/Restaurant.vue";

    export default {
        name: "SingleRestaurant",

         components:{
            Restaurant
        },

        data(){
            return{
                restaurant: null,
            }
        },

        mounted(){
            const $slug = this.$route.params.slug;

            axios.get(`/api/restaurants/${$slug}`)
            .then(response => {
                if(response.data.success == true){
                    this.restaurant = response.data.showRestaurant;
                }else{
                    this.$route.push({name: "not-found"});
                }
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
             
        },


    }
</script>

<style>

</style>