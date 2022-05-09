<template>
  <section class="container">
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




    <div class="container d-flex flex-column">

        <div class="p-2" ></div>

    </div>
    <!--<div class="row row-cols-2">

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
  </section>
</template>

<script>
import Restaurant from "./../components/partials/Restaurant.vue";


export default {
  name: "SingleRestaurant",

  components: {
    Restaurant,
    
  },

  data() {
    return {
      restaurant: null,
    };
  },

  mounted() {
    const $slug = this.$route.params.slug;

    axios
      .get(`/api/restaurants/${$slug}`)
      .then((response) => {
        if (response.data.success == true) {
          this.restaurant = response.data.showRestaurant;
        } else {
          this.$route.push({ name: "not-found" });
        }
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });

      
  },
};
</script>

<style lang="scss" scoped>


</style>