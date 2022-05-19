<template>
  <div class="container" v-if="restaurant">

   <!-- inizio dati ristorante -->

    <div class="row">
      <div class="col">

        <div class="px-4 py-3 my-3 text-center">

          <img class="img-fluid mx-auto mb-4" :src="restaurant.image"/>

          <h1 class="display-5 fw-bold">{{ restaurant.name }}</h1>
          <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">{{ restaurant.description }}</p>

            <div> <strong>Phone:</strong> {{restaurant.phone}}</div>
            <div> <strong>Email:</strong>  {{restaurant.email}}</div>
            <div> <strong>Indirizzo:</strong> {{restaurant.address}}</div>
        
            <div v-if="restaurant.typologies">
              <strong>Tipologia:</strong>  
                  
              <span v-for="(typology, count) in restaurant.typologies" :key="'typology_' + typology.id">
                  {{typology.name}}
                  <span v-if="count < restaurant.typologies.length-1">, </span>
              </span>
                
            </div>

          </div>

        </div>

      </div>
    </div>

   <!-- fine dati ristorante -->

  

    <!-- inizio btn torna ai ristoranti -->
      <div class="row text-center mb-5">
        <div class="col">
          <router-link class="btn ms_btn" :to="{name: 'home'}">Torna ai ristoranti</router-link>
        </div>
      </div>
    <!-- fine btn torna ai ristoranti -->


    <section v-if="menuRestaurant">

      <!-- inizio menu ristorante -->

      <div class="d-flex justify-content-center">
          <h1 class="m-0">Menu</h1>
      </div>

      <div class="row">
        <div class="col-12 col-lg-8">
            <div  class="row" v-if="menuRestaurant.length > 0">
              <div class="card-group col-12 col-md-6 col-lg-4" v-for="food in menuRestaurant" :key="'menuRestaurant_'+food.id">

                <!-- food.description assume valore di NULL quando non è presente una descrizione del food, per questo popolo la prop :description in maniera tale da essere sempre string -->
                <Food 
                  :name="food.name"
                  :id="food.id"
                  :price="food.price"
                  :description="food.description ? food.description : ''" 
                  :ingredients="food.ingredients"
                  :restaurant_id="food.restaurant_id"
                  :image="food.image"

                  @addFood="addToCart"
                />

              </div>
            </div>
              <div v-else class="d-flex justify-content-center align-items-center ms_height rounded ms_fs5 text-center">
                  <span>Non ci sono piatti disponibili al momento</span>
              </div>
        </div>

        <!-- inizio carrello -->
        <div class="col-12 col-lg-4">
          <div class="row"> 
            <div class="col-12">
              <h1 class="text-center pt-4">Carrello</h1>
              <div v-if="cart.length > 0">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Prezzo</th>
                      <th scope="col">Quantità</th>
                      <th scope="col">Totale</th>
                      <th scope="col">Elimina</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr v-for="item in cart" :key="'food_'+item.id">
                      <td class="align-middle p-0">{{item.name}}</td>
                      <td class="align-middle">{{item.price}} €</td>
                        
                      <td>
                        <div class="d-flex justify-content-center">
                          <div class="d-flex align-items-center">
                          <i class="bi bi-dash-circle ms_fs5 ms_cursor_pointer" @click="updateCart(item.id, item.price, item.quantity -1)"></i> 
                          </div>
                          <div>
                            <span class="ms_fs3 px-1">{{item.quantity}}</span>
                          </div>
                          <div class="d-flex align-items-center">
                            <i class="bi bi-plus-circle ms_fs5 ms_cursor_pointer" @click="updateCart(item.id, item.price, item.quantity +1)"></i> 
                          </div>
                        </div>
                      </td>
                      
                      <td class="align-middle">{{item.total}} €</td>
                      
                      <td class="align-middle p-0">
                        <button class="btn btn-danger" @click="deleteToCart(item.id)"><strong>X</strong></button>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div class="d-flex flex-column justify-content-center align-items-center">
                  <div class="ms_fs4" v-if="getTotal() > 0">Totale carrello {{getTotal()}} €</div>
                  <div class="mt-3">
                    <button class="btn btn-success mr-3" @click="goToPayment()">Paga</button>
                    <button class="btn btn-danger" @click="deleteCart()">Svuota</button>
                  </div>
                </div>
              </div>
              
              <div v-else class="d-flex justify-content-center align-items-center ms_carrello-vuoto rounded ms_fs5 mt-4">
                <span>Il carrello è vuoto</span>
              </div>

            </div> 
            
          </div>
        </div>
        <!-- fine carrello -->      

            

      </div>   
      <!-- fine menu ristorante -->



      <!-- inizio page navigator -->
      <div class="row justify-content-center my-5">

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">

                <!-- precedente -->
                <li class="page-item" :class="(currentPage == 1) ? 'disabled' : '' ">
                    <span class="page-link ms_cursor_pointer" @click="getMenu(currentPage -1)">Precedente</span>
                </li>

                <!-- visualizzo numero di pagina -->
                <li class="page-item" @click="mJS_selectedPage(page)" :class="(page == currentPage) ? 'active' : ''" v-for="page in lastPage" :key="page">
                    <span class="page-link ms_cursor_pointer">{{page}}</span>
                </li>

                <!-- successivo -->
                <li class="page-item" :class="(currentPage == lastPage) ? 'disabled' : '' ">
                    <span class="page-link ms_cursor_pointer" @click="getMenu(currentPage +1)">Successivo</span>
                </li>
            </ul>
        </nav>

      </div>

      <!-- fine page navigator -->


    </section>

    <section v-else>
      <h1>Non esiste nessun menu per questo ristorante</h1>
    </section>

    <!-- modal per prodotto già presente nel carrello -->
      <b-modal no-close-on-backdrop ok-only v-model="foodInCart">
        <p class="my-4">Il prodotto selezionato è già presente nel carrello</p>
      </b-modal>

    <!-- modal per carrello vuoto -->
      <b-modal no-close-on-backdrop ok-only v-model="emptyCart">
        <p class="my-4">Il carrello è vuoto</p>
      </b-modal>

    <!-- modal se si aggiunge un prodotto al carrello, diverso da qulli già presenti appartenenti ad un altro ristorante -->
      <b-modal no-close-on-backdrop v-model="onlyOneRestaurant">
        <p class="my-4">È possibile acquistare da un solo ristorante. Il carrello contiene prodotti appartenenti ad un altro ristorante. Per proseguire, svuotare prima il carrello</p>
      
         <template #modal-footer="{ ok, cancel }">
            <!-- Emulate built in modal footer ok and cancel button actions -->
            <b-button size="sm" variant="success" @click="ok()">Annulla</b-button>
            <b-button size="sm" variant="danger" @click="deleteCart(); addToCart(loadFood); cancel()">Svuota carrello e aggiungi prodotto</b-button>
          </template>
      </b-modal>


  </div>
</template>

<script>
  import Food from "./../components/partials/Food.vue";

  export default {
    name: "SingleRestaurant",

    components: {
      Food,
    },

    data() {
      return {
        restaurant: null,
        menuRestaurant: null,
        currentPage: 1,
        lastPage: null,
        cart: [],
        foodInCart: false,
        emptyCart: false,
        onlyOneRestaurant: false,
        loadFood: null
      };
    },

    created(){
      // al primo avvio del browser se la variabile del cart è null allora assegna il valore di [] a cart
      if(JSON.parse(localStorage.getItem('cart')) == null){
        localStorage.setItem( "cart", JSON.stringify(this.cart) );
      } 
    },

    mounted() {
      this.getMenu(1);
      this.getCart();
    },

    methods:{


      //inizio metodi per carrello
        deleteCart(){
          this.cart.splice(0, this.cart.length);
          localStorage.setItem( "cart", JSON.stringify(this.cart) );
        },

        addToCart(item){
          // aggiunge il food nel carrello
          
          // verifico se il carrello ha già dei prodotti

        if(this.cart.length > 0){

          let flagFoodInCart = 0;
          let flagFoodOtherRestaurant = 0;

          // itero tutti gli elementi del carrello
          this.cart.forEach(element => {
            // se il prodotto è già presente nel carrello setto flagFoodInCart = 1
            if(element.id == item.id){
              flagFoodInCart = 1;
            }

            // se il prodotto da aggiungere al carrello appartiene ad un ristorante diverso 
            // rispetto ai prodotti presenti già sul carrello, aumento flagFoodOtherRestaurant
            if(element.restaurant_id != item.restaurant_id){
              flagFoodOtherRestaurant++;

            }
          });

          // terminata l'iterazione dei prodotti sul carrello
          // se flagFoodOtherRestaurant > 0 significa che il prodotto da inserire non appartiene 
          // allo stesso ristorante dei prodotti già presenti nel carrello, quindi avviso l'utente
          if(flagFoodOtherRestaurant > 0){
            this.onlyOneRestaurant = true;
            this.loadFood = item;
          }else{
            // se flagFoodInCart = 0 significa che il prodotto da inserire non è già presente nel carrello
            // posso quindi aggiungerlo, altrimenti avviso l'utente
            if(flagFoodInCart == 0){
              this.cart.push(item);
              localStorage.setItem( "cart", JSON.stringify(this.cart) );
            }else{
              this.foodInCart = true;
            }
          }

        }else{
          // il carrello è vuoto, inserisco il primo prodotto nel carrello
          this.cart.push(item);
          localStorage.setItem( "cart", JSON.stringify(this.cart) );
        }
         

          
         
        },

        updateCart(idFood, price, newQuantity){
          // aggiorna la quantità del food passato ad argomento

          if(parseInt(newQuantity) && newQuantity > 0 && parseInt(idFood) && idFood > 0){

            // solo se newQuantity è un intero e newQuantity > 0 e idFood è un numero intero e idFood > 0
            this.cart.filter(item =>{
              if(item["id"] == idFood){
                item["quantity"] = newQuantity;
                item["total"] = price * newQuantity; 
              }
            })
          }
          localStorage.setItem( "cart", JSON.stringify(this.cart) );
        },

        deleteToCart(idFood){
          // elimina il food passato ad argomento

          if(parseInt(idFood) && idFood > 0){

            // solo se idFood è un intero e idFood > 0
            this.cart.forEach((item, count) => {
              if(item["id"] == idFood){
                this.cart.splice(count, 1);
              }
            });
            
          }
          localStorage.setItem( "cart", JSON.stringify(this.cart) );
        },

        getTotal(){
          let total = 0;
          this.cart.forEach(item => {
            total += item.total;
          });
          return total
        },


        getCart(){
           this.cart = JSON.parse(localStorage.getItem('cart') );
        },

    

      // fine metodi per carrello




      getMenu(RequestPage){
        const $slug = this.$route.params.slug;

        axios
          .get(`/api/restaurants/${$slug}`,{
              "params":{
                "page": RequestPage
              }
          })
          .then((response) => {
            // handle success
            if (response.data.success == true) {
              this.currentPage = response.data.showMenuRestaurant.current_page;
              this.restaurant = response.data.showRestaurant;
              this.menuRestaurant = response.data.showMenuRestaurant.data;
              this.lastPage = response.data.showMenuRestaurant.last_page;
            }else {
              this.$route.push({ name: "not-found" });
            }
          })
          .catch(function (error) {
            // handle error
            console.log(error);
          });
      },

      goToPayment(){
        // questa funzione permette di reindirizzare la pagina alla pagina definita su router.js di nome payment 
        // e inoltre passo nei parametri il carrello
        // ovviamente solo se il carrello contiene dei food

        if(this.cart.length > 0){
          this.$router.push({name:"payment", params:{cart: this.cart, total: this.getTotal(), restaurant_id: this.restaurant.id, restaurant_slug: this.restaurant.slug}});
        }else{
          this.emptyCart = true;
        }
        
      }

    }
  };
</script>

<style lang="scss" scoped>

 @import "./../../sass/_common.scss";
 @import "./../../sass/_variables.scss";

  .page-item.active .page-link{
      background-color: $navigator;
      border-color: $navigator;
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

  .ms_carrello-vuoto{
    height: 30px;
    width: 100%;
    background-color: brown;
    color: white;
  }

  .ms_height{
    height: 200px;
  }
</style>