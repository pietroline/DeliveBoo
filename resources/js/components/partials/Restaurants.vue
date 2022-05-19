<template>
    <div class="container-fluid">

        <!-- inizio filtro ristoranti -->

            <div class="row ms_fs3 mt-5 mb-3 ms_title1">
                <div class="col-12 d-flex justify-content-center">
                    <span class="text-center">
                        Filtro ristoranti per tipologie
                    </span>
                </div>
                
            </div>

           <div class="container">
                <form  @submit.prevent="getRestaurantsFiltered(1)" >

                    <div class="row mb-3">
                        <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center" v-for="(typology) in allTypologies" :key="typology.id">
                            
                            <div class="form-check p-0 position-relative">
                                
                                <label class="form-check-label" :for="'typology_' + typology.id">
                                    <img :src="typology.image" class="card-typology ms_cursor_pointer"  :alt="typology.name">
                                </label>
                                <div class="ms_position-absolute">
                                    <input  type="checkbox" class="form-check-input ms_checkbox" v-model="typologySelected" :value="typology.id" :id="'typology_' + typology.id">
                                </div>
    
                                <p class="mb-4 mt-1 text-center">
                                    {{typology.name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mb-5">
                        <button type="submit" class="btn ms_btn1">Cerca</button>
                    </div>
                    </div>
                    
                        
                </form>
           </div>

        <!-- fine filtro ristoranti -->


        <!-- inizio risultati ricerca -->

                <section class="px-3" v-if="restaurants">

                    <div class="row justify-content-center mt-5">
                        <h1 class="ms_title1">Elenco ristoranti</h1>
                    </div>
                    <div class="ms_height">
                        <div class="row">
                            <div class="card-group col-12 col-md-6 col-lg-3 px-5 px-md-3 px-lg-3" v-for="restaurant in restaurants" :key="'restaurant_'+restaurant.id">
                                
                                <Restaurant 
                                    :name="restaurant.name"
                                    :slug="restaurant.slug"
                                    :typologies="restaurant.typologies"
                                    :description="restaurant.description"
                                    :image="restaurant.image"
                                />

                            </div>
                        </div>
                    </div>
                    
                </section>
                <section v-else>

                    <h1>Non ci sono ristoranti da visualizzare</h1>

                </section>


                <!-- inizio page navigator -->

                    <div class="row justify-content-center mt-2 mb-5">

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">

                                <!-- precedente -->
                                <li class="page-item" :class="(currentPage == 1) ? 'disabled' : '' ">
                                    <span class="page-link ms_cursor_pointer ms_colorTextNavigator" @click="getRestaurantsFiltered(currentPage -1)">Precedente</span>
                                </li>

                                <!-- visualizzo numero di pagina -->
                                <li class="page-item" @click="mJS_selectedPage(page)" :class="(page == currentPage) ? 'active' : ''" v-for="page in lastPage" :key="page">
                                    <span class="page-link ms_cursor_pointer ms_colorTextNavigator">{{page}}</span>
                                </li>

                                <!-- successivo -->
                                <li class="page-item" :class="(currentPage == lastPage) ? 'disabled' : '' ">
                                    <span class="page-link ms_cursor_pointer ms_colorTextNavigator" @click="getRestaurantsFiltered(currentPage +1)">Successivo</span>
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
                lastPage: null,
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
            },
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/_variables.scss";

    .ms_height{
        width: 100%;
        min-height: 80vh;
    }

    .ms_list{
        background-color: $lightOrange;
    }
    .ms_title1{
        color: $darkOrange;
        font-weight: bolder;
    }
    .ms_btn1{
        background-color: $darkOrange;
        border: 2px solid brown;
        color: white;
        font-weight: bold;
        &:hover{
            border: 2px solid $darkOrange;
            background-color: brown;
        }
    }
    .ms_checkbox {
        -webkit-appearance: none;
        border: 1px solid black;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
        padding: 10px;
        border-radius: 50%;
        background-color: white;
        
    }
    .ms_checkbox:checked {
        background-color: $darkOrange;
        border: 2px solid brown;
        color: white;
    }
    .card-typology{
        width: 230px;
        height: 140px;
        border-radius: 20px;
    }
    .ms_position-absolute{
        position: absolute;
        top: 3%;
        right: 6%;
    }
    .ms_colorTextNavigator{
        color: $darkOrange;
    }
    .page-item.active .page-link{
        background-color: $navigator;
        border-color: $navigator;
    }
</style>
