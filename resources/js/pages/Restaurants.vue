<template>
  <div class="container mt-3">
        <div class="row">
            <h1>Elenco ristoranti</h1>
        </div>

        <div class="row row-cols-4">
            <div class="col card-group" v-for="restaurant in restaurants" :key="'restaurant'+restaurant.id">

                <Restaurant :name="restaurant.name"/>

            </div>
        </div>
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
                
                restaurants: [],
            };
        },

        mounted(){
            this.getRestaurants();
        },

        methods:{

            getRestaurants(){
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
        }
    }
</script>

<style>

</style>