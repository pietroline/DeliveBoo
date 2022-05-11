<template>

    <div class="card my-3">

        <!-- <img src="..." class="card-img-top" alt="..."> -->

        <div class="card-body">
            <h3 class="card-title">{{name}}</h3>
            <h5 >{{price}} €</h5>
            <p class="card-text" v-if="description"><strong>Descrizione:</strong>{{description}}</p>
            <p class="card-text"><strong>Ingredienti: </strong>{{ingredients}}</p>

            <div class="d-flex align-items-center">
                <label :for="'quantity_' + id" class="my-0 mx-2">Quantità</label>
                <input type="number" :id="'quantity_' + id" value="1" v-model="quantity" class="ms_w50px">
            </div>

            <button class="btn btn-primary my-3" @click="pushItemInCart()">Aggiungi al carrello</button>
            
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
            "ingredients":String
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
                    "total": this.price * this.quantity
                }

                this.$emit("addFood", item);
                
                // localStorage.setItem("carrello", JSON.stringify(item));
                // console.log(JSON.parse(localStorage.getItem("carrello")))
            }
        }
    }
</script>

<style scoped>
    .ms_w50px{
        width: 50px;
    }
</style>