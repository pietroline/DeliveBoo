<template>
  <div class="container" v-if="restaurant">






   <!-- inizio dati ristorante -->

    <div class="row">
      <div class="col">

        <div class="px-4 py-5 my-5 text-center">

          <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg"/>
          <h1 class="display-5 fw-bold">{{ restaurant.name }}</h1>
          <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">{{ restaurant.description }}</p>

            <!--<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
              Primary button
            </button>
          </div>-->
          </div>

        </div>

      </div>
    </div>

   <!-- fine dati ristorante -->






    <section v-if="menuRestaurant">




      <!-- inizio menu ristorante -->




        <div class="row">
            <h1>Menu</h1>
        </div>

        <div class="row row-cols-3">
            <div class="col card-group" v-for="food in menuRestaurant" :key="'menuRestaurant_'+food.id">

                <!-- food.description assume valore di NULL quando non è presente una descrizione del food, per questo popolo la prop :description in maniera tale da essere sempre string -->
                <Food 
                    :name="food.name"
                    :id="food.id"
                    :price="food.price"
                    :description="food.description ? food.description : ''" 
                    :ingredients="food.ingredients"
                />

            </div>
        </div>




      <!-- fine menu ristorante -->

      <!-- inizio page navigator -->





        <div class="row justify-content-center my-5">

          <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">

                  <!-- precedente -->
                  <li class="page-item" :class="(currentPage == 1) ? 'disabled' : '' ">
                      <span class="page-link ms_cursor_pointer" @click="getMenu(currentPage -1)">Precedente</span>
                  </li>

                  <!-- visualizzo numero di pagina -->
                  <li class="page-item" @click="mJS_selectedPage(page)" :class="(page == currentPage) ? 'active' : ''" v-for="page in lastPage" :key="page">
                      <span class="page-link ms_cursor_pointer">{{page}}</span>
                  </li>

                  <!-- successivo -->
                  <li class="page-item" :class="(currentPage == lastPage) ? 'disabled' : '' ">
                      <span class="page-link ms_cursor_pointer" @click="getMenu(currentPage +1)">Successivo</span>
                  </li>
              </ul>
          </nav>

        </div>

      <!-- fine page navigator -->





    </section>

    <section v-else>
      <h1>Non esiste nessun menu per questo ristorante</h1>
    </section>








  </div>

  <!--<div class="container d-flex flex-column">

        <div class="p-2" ></div>

    </div>
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

        </div>-->
</template>

<script>
  import Food from "./../components/partials/Food.vue";

  export default {
    name: "SingleRestaurant",

    components: {
      Food,
    },

    data() {
      return {
        restaurant: null,
        menuRestaurant: null,
        currentPage: 1,
        lastPage: null
      };
    },

    mounted() {
      this.getMenu(1);
    },

    methods:{

      getMenu(RequestPage){
        const $slug = this.$route.params.slug;

        axios
          .get(`/api/restaurants/${$slug}`,{
              "params":{
                "page": RequestPage
              }
          })
          .then((response) => {
            // handle success
            console.log(response)
            if (response.data.success == true) {
              this.currentPage = response.data.showMenuRestaurant.current_page;
              this.restaurant = response.data.showRestaurant;
              this.menuRestaurant = response.data.showMenuRestaurant.data;
              this.lastPage = response.data.showMenuRestaurant.last_page;
            } else {
              this.$route.push({ name: "not-found" });
            }
          })
          .catch(function (error) {
            // handle error
            console.log(error);
          });
        }
    }
  };
</script>

<style lang="scss" scoped>
</style>