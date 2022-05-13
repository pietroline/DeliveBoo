<template>
    <div class="container-fluid">
        <div class="row ms_carousel">
            <Carousel/>
        </div>
        <div class="row">
            <Restaurants/>
        </div>
        <div class="row">
            <BannerWorkForUs/>
        </div>      
    </div>
</template>

<script>

    import Carousel from '../components/partials/Carousel.vue';
    import BannerWorkForUs from  '../components/partials/BannerWorkForUs.vue'
    import Restaurants from '../components/partials/Restaurants.vue'

    export default {
        name: "Home",

        components:{
            Carousel,
            BannerWorkForUs,
            Restaurants,
        }
    }

</script>

<style lang="scss" scoped>

    .ms_carousel{
        height: 400px;
    }


</style> 