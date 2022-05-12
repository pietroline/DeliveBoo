<template>
    <div class="container-fluid mt-3">
        <div class="row ms_carousel">
           

            <Carousel/>
            <BannerWorkForUs/>
        </div>
    </div>
</template>

<script>

import Carousel from '../components/partials/Carousel.vue';
import BannerWorkForUs from  '../components/partials/BannerWorkForUs.vue'

    export default {
        name: "Home",

        components:{
            Carousel,
            BannerWorkForUs
        }
    }
</script>

<style lang="scss" scoped>

.ms_carousel{
    height: 400px;
}


</style> 