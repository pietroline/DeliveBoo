<template>
    <div class="container-fluid mt-3">
        <div class="row ms_carousel">
            <Carousel/>

            <Restaurants/>
            
        </div>
    </div>
</template>

<script>

import Carousel from '../components/partials/Carousel.vue'
import Restaurants from '../components/partials/Restaurants.vue'

    export default {
        name: "Home",

        components:{
            Carousel,
            Restaurants,
        }
    }
</script>

<style lang="scss" scoped>

.ms_carousel{
    height: 400px;
}


</style> 