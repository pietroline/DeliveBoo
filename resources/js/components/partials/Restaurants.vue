<template>
  <div class="container mt-3">


<!-- inizio filtro ristoranti -->

    <div class="row ms_fs3 mt-5 mb-3 ms_title1">Filtro ristoranti per tipologie</div>

    <form class="row mb-5" @submit.prevent="getRestaurantsFiltered(1)" >

        <div class="col-5" v-for="typology in allTypologies" :key="typology.id">

            <div class="form-check d-flex align-items-center">
                <input  type="checkbox" class="form-check-input ms_checkbox mt-0" v-model="typologySelected" :value="typology.id" :id="'typology_' + typology.id">
                <label class="form-check-label ml-2" :for="'typology_' + typology.id">{{typology.name}}</label>
            </div>

        </div>
            
            <div class="col d-flex justify-content-center">
                <button type="submit" class="btn ms_btn1">Cerca</button>
            </div>
        
    </form>

<!-- fine filtro ristoranti -->


<!-- inizio risultati ricerca -->

        <section v-if="restaurants">



             <div class="row">
                <h1 class="ms_title1">Elenco ristoranti</h1>
            </div>

            <div class="row row-cols-3 ms_list">
                <div class="col card-group" v-for="restaurant in restaurants" :key="'restaurant_'+restaurant.id">

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


        <!-- inizio page navigator -->

         <div class="row justify-content-center my-5">

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">

                        <!-- precedente -->
                        <li class="page-item" :class="(currentPage == 1) ? 'disabled' : '' ">
                            <span class="page-link ms_cursor_pointer" @click="getRestaurantsFiltered(currentPage -1)">Precedente</span>
                        </li>

                        <!-- visualizzo numero di pagina -->
                        <li class="page-item" @click="mJS_selectedPage(page)" :class="(page == currentPage) ? 'active' : ''" v-for="page in lastPage" :key="page">
                            <span class="page-link ms_cursor_pointer">{{page}}</span>
                        </li>

                        <!-- successivo -->
                        <li class="page-item" :class="(currentPage == lastPage) ? 'disabled' : '' ">
                            <span class="page-link ms_cursor_pointer" @click="getRestaurantsFiltered(currentPage +1)">Successivo</span>
                        </li>
                    </ul>
                </nav>

            </div>

        <!-- fine page navigator -->
       

<!-- fine risultati ricerca -->

    </div>
</template>

<script>

    import Restaurant from "./../partials/Restaurant.vue";

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
                currentPage: 1,
                lastPage: null
            };
        },

        mounted(){
            this.getAllTypologies();  
            this.getAllRestaurants(1);      
        },

        methods:{

            getAllTypologies(){
                // prelevo tutte le tipologie
                axios.get('api/typologies')
                    .then(response =>{
                        this.allTypologies = response.data.results;
                    })
            },

            getAllRestaurants(RequestPage){
                axios.get('/api/restaurants',{
                    "params": {
                        "page": RequestPage
                    }
                })
                    .then(response => {
                        // handle success
                        this.currentPage = response.data.results.current_page;
                        this.restaurants = response.data.results.data;
                        this.lastPage = response.data.results.last_page;
                    })
                    .catch(error => { 
                        // handle error
                        console.log(error);
                    })

            },

            getRestaurantsFiltered(RequestPage){
                this.restaurants = [];

                // solo se typologySelected contiene almeno una tipologia faccio richiesta dei ristoranti filtrati, 
                // altrimenti torno tutti i ristoranti
                if(this.typologySelected.length > 0){
                    axios.get('api/restaurant/' + this.typologySelected, {
                        "params": {
                            "page": RequestPage
                        }
                    })
                        .then(response =>{
                             // handle success
                            this.currentPage = response.data.results.current_page;
                            this.restaurants = response.data.results.data;
                            this.lastPage = response.data.results.last_page;
                        })
                         .catch(error => {
                            // handle error
                            console.log(error);
                        })
                }else{
                    this.getAllRestaurants(RequestPage);
                }
                
            },

            mJS_selectedPage(selectedPage){
                this.currentPage = selectedPage;
                this.getRestaurantsFiltered(this.currentPage);
            }
        }
    }
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

.ms_list{
    background-color: $lightOrange;
}

.ms_title1{
    color: $darkOrange;
    font-weight: bolder;
}

.ms_btn1{
      background-color: $darkOrange;
    border: 1px solid $lightOrange;
    color: white;
    font-weight: bold;
}


.ms_checkbox {
    -webkit-appearance: none;
	background-color: $lightOrange;
	border: 1px solid $darkOrange;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
	padding: 9px;
	border-radius: 3px;
	display: inline-block;
    
}

.ms_checkbox:checked {
	background-color: $darkOrange;
	border: 1px solid $lightOrange;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
	color: white;
}

</style>