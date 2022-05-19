<template>
    <div class="container ms-height mt-5">

        <div class="row">
            <div class="col">

                <h1>Ci siamo quasi stai per inviare l'ordine</h1>

                <h3 class="my-3">Ecco il riepilogo dell'ordine</h3>

                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Quantità</th>
                            <th scope="col">Totale</th>
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

         <!-- inizio sezione errori dovuti alle verifiche sui form -->

            <div class="row"  v-if="errors">
                <div class="col">
            
                        <div class="row justify-content-center">
                            <div class="col-md-12">

                                
                            
                                    <div class="alert alert-danger">
                                        <ul>
                                            <!-- @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach -->
                                            <li v-for="(error, count) in errors" :key="'error_'+count">
                                                <span v-for="(messageError, count) in error" :key="'messageError_'+count">{{messageError}}</span>
                                            </li>
                                        </ul>
                                    </div>
                            
                                
                            </div>
                        </div>
                    
                </div>
            </div>

        <!-- fine sezione errori dovuti alle verifiche sui form -->

        <div class="row">
            <div class="col">

                 <form id="payment-form">

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
    
                    <section>
                        <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                        </div>
                    </section>

                    <input id="nonce" type="hidden" />

                    <div class="d-flex justify-content-center">
                        <button class="btn ms_btn1 my-4" type="submit" ref="submit">
                            <span class="ms_fs4">{{working ? "Elaborazione..." : "Conferma e paga"}}</span>
                        </button>
                    </div>
                </form>
               
            </div>
        </div>

        <!-- Modal per carrello vuoto -->
        <div class="row">
            <b-modal no-close-on-backdrop v-model="emptyCart" ok-only>Il carrello è vuoto</b-modal>
        </div>

         <!-- Modal form non compialto correttamente-->
        <div class="row">
            <b-modal no-close-on-backdrop v-model="errorsForm" ok-only>Form non compilato correttamente. Ordine negato</b-modal>
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
                restaurant_id: null,
                restaurant_slug: null,
                name: null,
                address: null,
                phone: null,
                errors: null,
                emptyCart: false,
                errorsForm: false,
                working: false
            };
        },

        created(){
            // Quando si apre la pagina payment, popolo il dato "cart" con il valore passato come parametro
            this.cart = this.$route.params.cart;
            this.total = this.$route.params.total; 
            this.restaurant_id = this.$route.params.restaurant_id; 
            this.restaurant_slug = this.$route.params.restaurant_slug; 

          
            // salvo i dati in valiabili localStorage, in maniera tale da mantenere il dato anche se riavviata la pagina
            if( this.cart != undefined ){
                localStorage.setItem( "cartPayment", JSON.stringify(this.cart)); 
            }else{
                this.cart = JSON.parse(localStorage.getItem('cartPayment'));
            }

            if( this.total != undefined){
                localStorage.setItem( "totalPayment", JSON.stringify(this.total)); 
            }else{
                this.total = JSON.parse(localStorage.getItem('totalPayment'));
            }

            //--- inizio Braintree ---
                //Ajax chiama la rotta che restituisce il token di autorizzazione nella risposta
                axios.get("/payment/checkout").then((response) => {
                    var form = document.querySelector("#payment-form");

                    //Si crea il dropin con il token
                    braintree.dropin.create({

                        authorization: response.data,
                        selector: "#bt-dropin",
                       
                    },(createErr, instance) => {

                        if (createErr) {
                            console.log("Create Error", createErr);
                        } else {

                            form.addEventListener("submit", (event) => {
                                event.preventDefault();

                                // cambio scritta btn da "Conferma e paga" a "Elaborazione"
                                this.working = true;

                                instance.requestPaymentMethod((err, payload) => {

                                    if (err) {
                                        console.log("Request Payment Method Error", err);
                                        return;
                                    }

                                    // Add the nonce to the form and submit
                                    document.getElementById("nonce").value = payload.nonce;

                                    let data = {
                                        amount: this.total,
                                        payment_method_nonce: payload.nonce,
                                        name: this.name,
                                        phone: this.phone,
                                    };

                                    axios.post("/payment/checkout", data)
                                        .then((response) => {
                                            // console.log("SUCCESSO /payment/checkout", response);
                                            //Funzione che aggiunge nuovo ordine al DB
                                            this.sendOrder();
                                        })
                                        .catch((error) => {
                                            console.log("ERRORE /payment/checkout", error.data);
                                        });
                                });
                            });
                        }
                        }
                    );
                });
            //--- fine Braintree ---

        },

       methods: {
           sendOrder(){

                if(this.name && this.address && this.phone){

                    if(this.cart){
                        axios.post('api/payment', {
                            name: this.name,
                            address: this.address,
                            phone: this.phone,
                            total: this.total,
                            restaurant_id: this.restaurant_id,
                            restaurant_slug: this.restaurant_slug,
                            cart: this.cart
                        })
                        .then(response =>{
                            // handle success
                            if(response.data.success == true){
                                // Se l'ordine va a buon fine reindirizzo alla pagina /orderConfirmed, vedi router.js

                                // cambio scritta btn da "Elaborazione" a "Conferma e paga"
                                this.working = false;

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
                                this.errorsForm = true;
                            }
                        })
                        .catch(error => {
                            // handle error
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        })
                    }else{
                        this.emptyCart = true;
                    }

                }else{
                    this.errorsForm = true;
                }
           }
       }
       
    }
</script>

<style lang="scss" scoped>

    @import "./../../sass/_variables.scss";

    .ms-height{
        min-height: 100vh;
    }

    .ms_btn1{
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