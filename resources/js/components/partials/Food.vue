<template>

    <div class="card my-3">

        <!-- <img src="..." class="card-img-top" alt="..."> -->

        <div class="card-body d-flex flex-column">
            <h3 class="card-title text-center">{{name}}</h3>
            <p><strong>Prezzo:</strong> {{price}} €</p>
            <p class="card-text" v-if="description"><strong>Descrizione: </strong>{{description}}</p>
            <p class="card-text"><strong>Ingredienti: </strong>{{ingredients}}</p>

            <div class="mt-auto mx-auto">
                <button class="btn ms_btn my-3" @click="pushItemInCart()">Aggiungi al carrello</button>
            </div>
            
            
        </div>
        
    </div>

</template>

<script>
    export default {
        name: "Food",

        props:{
            "name": String,
            "id": Number,
            "price": Number,
            "description":String,
            "ingredients":String,
            "restaurant_id":Number

        },

        data(){
            return{
                quantity: 1,
            }
        },

        methods:{

            pushItemInCart(){

                const item = {
                    "name": this.name,
                    "id": this.id,
                    "description": this.description,
                    "ingredients": this.ingredients,
                    "price": this.price,
                    "quantity": this.quantity,
                    "total": this.price * this.quantity,
                    "restaurant_id": this.restaurant_id
                }

                this.$emit("addFood", item);

            }
        }

    }
</script>

<style lang="scss" scoped>

@import "../../../sass/variables.scss";

    .ms_w50px{
        width: 50px;
    }

    .ms_btn{
        background-color: $darkOrange;
        border: 2px solid brown;
        color: white;
        font-weight: bold;
        
        &:hover{
            border: 2px solid $darkOrange;
            background-color: brown;
        }
    }
</style>