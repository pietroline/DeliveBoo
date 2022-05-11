<template>
    <div class="container-fluid mt-3">
        <div class="row ms_carousel">
           

            <Carousel/>
        </div>
    </div>
</template>

<script>

import Carousel from '../components/partials/Carousel.vue'

    export default {
        name: "Home",

        components:{
            Carousel,
        }
    }
</script>

<style lang="scss" scoped>

.ms_carousel{
    height: 400px;
}


</style> 