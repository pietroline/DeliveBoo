<template>
    <div class="container ms-height mt-5">

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

                 <form @submit.prevent="sendOrder()">

                    <div class="form-group">
                        <label for="name">Nome *</label>
                        <input type="text" class="form-control" id="name" name="name" minlength="3" v-model="name" required>
                    </div>

                    <div class="form-group">
                        <label for="surname">Cognome *</label>
                        <input type="text" class="form-control" id="surname" name="surname" minlength="3" v-model="surname" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Numero telefono *</label>
                        <input type="tel" pattern="[0-9]{6,15}" class="form-control" id="phone" name="phone" v-model="phone" required>
                    </div>
 
                    <div class="form-group">
                        <label for="address">Indirizzo *</label>
                        <input type="text" class="form-control" id="address" name="address" minlength="5" v-model="address" required>
                    </div>

                    <div class="form-group">
                        <label for="paymentMethod">Metodo di pagamento</label>
                        <select class="form-control" id="paymentMethod" name="paymentMethod" v-model="paymentMethod">
                            <option value="1" selected>Alla consegna</option>
                            <option value="2">Adesso con carta</option>
                        </select>
                    </div>

                   <section v-if="paymentMethod == 2">

                        <div class="form-group p-3">
                            <div class="row">
                                <input placeholder="Numero carta" type="text" class="form-control col-8" id="cardNumber" name="cardNumber" v-model="cardNumber" pattern="[0-9]{16}" required>
                                <input placeholder="CVV" type="text" class="form-control col-3 ml-3" id="cvv" name="cvv" v-model="cvv" pattern="[0-9]{3}" required>     
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <input placeholder="Mese" type="number" class="form-control ms_inputSize" id="expirationMonth" name="expirationMonth" min="1" max="12" v-model="expirationMonth" required>
                            <div class="mx-3">/</div>
                            <input placeholder="Anno" type="number" class="form-control ms_inputSize" id="expirationYear" name="expirationYear" min="2000" max="2100" v-model="expirationYear" required>
                        </div>

                   </section>
    
                    <button type="submit" class="btn btn-primary my-3">Invia</button>
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
                name: null,
                surname: null,
                cardNumber: null,
                cvv: null,
                expirationMonth: null,
                expirationYear: null,
                paymentMethod: 1,
                address: null,
                phone: null,
                errors: null,
                emptyCart: false,
                errorsForm: false,
            };
        },

        created(){
            // Quando si apre la pagina payment, popolo il dato "cart" con il valore passato come parametro
            this.cart = this.$route.params.cart;
            this.total = this.$route.params.total; 
            this.restaurant_id = this.$route.params.restaurant_id; 

          
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
        },

       methods: {
           sendOrder(){

                let sendData = {};
                // creo oggetto contenennte i dati dell'ordine e del pagamento
                if(this.paymentMethod == 1){
                //    metodo di pagamento carta
                   sendData = {
                        name: this.name,
                        surname: this.surname,
                        paymentMethod: this.paymentMethod,
                        address: this.address,
                        phone: this.phone,
                        total: this.total,
                        restaurant_id: this.restaurant_id
                   }
               }else{
                //    metodo di pagamento alla consegna
                    sendData = {
                        name: this.name,
                        surname: this.surname,
                        cardNumber: this.cardNumber,
                        cvv: this.cvv,
                        expirationMonth: this.expirationMonth,
                        expirationYear: this.expirationYear,
                        paymentMethod: this.paymentMethod,
                        address: this.address,
                        phone: this.phone,
                        total: this.total,
                        restaurant_id: this.restaurant_id
                   }
               }




                if(this.name && this.address && this.phone){

                    if(this.cart){
                        axios.post('api/payment', sendData)
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
    .ms-height{
        min-height: 100vh;
    }
</style>