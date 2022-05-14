<template>
    <div class="container">
        <div class="row">
            <div class="col">

                 <h1>Ci siamo quasi stai per inviare l'ordine</h1>

                <h3>Ecco il riepilogo dell'ordine</h3>

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">prezzo</th>
                            <th scope="col">quantità</th>
                            <th scope="col">totale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in cart" :key="'food_'+item.id">
                            <td>{{item.name}}</td>
                            <td>{{item.price}} €</td>
                            <td>{{item.quantity}}
                            <td>{{item.total}} €</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end align-items-center">
                    <div class="mr-3 ms_fs3">Totale carrello {{total}} €</div>
                </div>


            </div>
        </div>

        <div class="row">
            <div class="col">

                <form @submit.prevent="sendOrder()">

                    <div class="form-group">
                        <label for="name">Nome *</label>
                        <input type="text" class="form-control" id="name" name="name" minlength="3" v-model="name" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Numero telefono *</label>
                        <input type="tel" pattern="[0-9]{6,15}" class="form-control" id="phone" name="phone" v-model="phone" required>
                    </div>
 
                    <div class="form-group">
                        <label for="address">Indirizzo *</label>
                        <input type="text" class="form-control" id="address" name="address" minlength="5" v-model="address" required>
                    </div>
    
                     <button type="submit" class="btn btn-primary my-3">Invia</button>
                </form>
               
            </div>
        </div>

    </div>
</template>

<script>
    export default {    
        name: "Payment",

        data() {
            return {
                cart: [],
                total: 0,
                name: null,
                address: null,
                phone: null,
            };
        },

       created(){
        // Quando si apre la pagina payment, popolo il dato "cart" con il valore passato come parametro
            this.cart = this.$route.params.cart;
            this.total = this.$route.params.total; 
       },

       methods: {
           sendOrder(){
                if(this.name && this.address && this.phone){

                    if(this.cart){
                        axios.get('api/payment')
                        .then(response =>{
                            // handle success
                            if(response.data.success == true){
                                // Se l'ordine va a buon fine reindirizzo alla pagina /orderConfirmed, vedi router.js
                               this.$router.push({
                                    name: 'orderConfirmed', 
                                    params: { arrayData: [
                                        {
                                            "data": "name",
                                            "content": this.name
                                        },
                                        {
                                            "data": "address",
                                            "content": this.address
                                        },
                                        {
                                            "data": "phone",
                                            "content": this.phone
                                        },
                                        {
                                            "data": "cart",
                                            "content": this.cart
                                        },
                                        {
                                            "data": "total",
                                            "content": this.total
                                        }
                                    ] }
                                });
                            }else{
                                // altrimenti reindirizzo alla pagine /orderNegated, vedi router.js
                               this.$router.push({name: 'orderNegated'});
                            }
                        })
                        .catch(error => {
                            // handle error
                            console.log(error);
                            alert("Problemi di connessione. Riprova più tardi")
                        })
                    }else{
                        alert("Carrello vuoto");
                    }

                }else{
                    alert("Form non compilato correttamente")
                }
           }
       }
       
    }
</script>

<style>

</style>