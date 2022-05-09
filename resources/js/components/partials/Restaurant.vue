<template>

    <div class="card my-3">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <h5 class="card-title">{{name}}</h5>
            <a href="#" class="btn btn-primary">Vai al ristorante</a>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Restaurant",

        props:{
            "name": String,
        }
    }
</script>

<style>

</style>