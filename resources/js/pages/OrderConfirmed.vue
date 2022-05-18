<template>
    <section class="container-fluid ms-height">
    <div class="row justify-content-center ">
      <div class="col-12 col-md-9 col-lg-9">

        <div class="jumbotron ms_jumbo mx-auto">

            <h1 class="display-4 text-white">Ordine confermato! A breve saremo da te!</h1>
            <h4>Riepilogo dell'ordine effettuato</h4>
            
            <table class="table text-center bg-light">
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
            

            <h4>I tuoi dati</h4>
            <div><strong>Nome: </strong>{{name}}</div>
            <div><strong>Indirizzo: </strong>{{address}}</div>
            <div><strong>Telefono: </strong> {{phone}}</div>
          
            <hr class="my-4"/>
            <div>Clicca sul bottone per tornare alla HomePage</div>
            <router-link class="btn my-3 ms_btn1" :to="{name: 'home'}">Home</router-link>

        </div>

      </div>
    </div>
  </section>
</template>

<script>
    export default {
        name: "OrderConfirmed",

        data(){
            return{
                name: null,
                address: null,
                phone: null,
                cart: [],
                total: 0
            }
        },

        created(){
            // prendo i parametri passati, gli itero e popolo le variabili name, address, phone, cart, total
            const dataArray = this.$route.params.arrayData;
            dataArray.forEach(element => {
                if(element.data == "name"){
                    this.name = element.content;
                }else if(element.data == "address"){
                    this.address = element.content;
                }else if(element.data == "phone"){
                    this.phone = element.content;
                }else if(element.data == "cart"){
                    this.cart = element.content;
                }else if(element.data == "total"){
                    this.total = element.content;
                }
            });

            // resetto il carrello memorizzato 
            localStorage.removeItem("cart");
            
        }
    }
</script>
<style lang="scss" scoped>

  @import "./../../sass/_variables.scss";

   .ms-height{
        min-height: 100vh;
    }

    .ms_jumbo {
        background-color: $lightOrange;
        margin-top: 2rem;
        box-shadow: 0 0 1rem 0 #000;
      
        
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
}
  
</style>