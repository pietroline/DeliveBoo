<template>
  <div class="container mt-3">


<!-- inizio filtro ristoranti -->

    <div class="row ms_fs3 mt-5">Filtro ristoranti per tipologie</div>

    <form class="row mb-5" @submit.prevent="getRestaurantsFiltered()" >

        <div class="col" v-for="typology in allTypologies" :key="typology.id">

            <div class="form-check">
                <input  type="checkbox" class="form-check-input" v-model="typologySelected" :value="typology.id" :id="'typology_' + typology.id">
                <label class="form-check-label" :for="'typology_' + typology.id">{{typology.name}}</label>
            </div>

        </div>
            
            <div class="col d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Cerca</button>
            </div>
        
    </form>

<!-- fine filtro ristoranti -->


<!-- inizio risultati ricerca -->

        <section v-if="restaurants.length > 0">



             <div class="row">
                <h1>Elenco ristoranti</h1>
            </div>

            <div class="row row-cols-4">
                <div class="col card-group" v-for="restaurant in restaurants" :key="'restaurant'+restaurant.id">

                    <Restaurant 
                        :name="restaurant.name"
                        :slug="restaurant.slug"
                    />

                </div>
            </div>



        </section>
        <section v-else>

            <h1>Non ci sono ristoranti da visualizzare</h1>

        </section>
       

<!-- fine risultati ricerca -->

    </div>
</template>

<script>

    import Restaurant from "./../components/partials/Restaurant.vue";

    export default {
        name: "Restaurants",

        components:{
            Restaurant
        },

        data() {
            return {
                allTypologies: null,
                typologySelected: [],
                restaurants: [],
            };
        },

        mounted(){
            this.getAllTypologies();  
            this.getAllRestaurants();      
        },

        methods:{

            getAllTypologies(){
                // prelevo tutte le tipologie
                axios.get('api/typologies')
                    .then(response =>{
                        this.allTypologies = response.data.results;
                    })
            },

            getAllRestaurants(){
                axios.get('/api/restaurants')
                    .then(response => {
                        // handle success
                        this.restaurants = response.data.results;
                    })
                    .catch(error => {
                        // handle error
                        console.log(error);
                    })

            },

            getRestaurantsFiltered(){
                this.restaurants = [];

                // solo se typologySelected contiene almeno una tipologia faccio richiesta dei ristoranti filtrati, 
                // altrimenti torno tutti i ristoranti
                if(this.typologySelected.length > 0){
                    axios.get('api/restaurant/' + this.typologySelected)
                        .then(response =>{
                            this.restaurants = response.data.results;
                        })
                }else{
                    this.getAllRestaurants();
                }
                
            }
        }
    }
</script>

<style>

</style>