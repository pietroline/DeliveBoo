<template>

  <section class="container-fluid">
    <div class="row justify-content-center ">
      <div class="col-9">

        <div class="jumbotron ms_jumbo mx-auto">

            <h1 class="display-4 text-white">Ordine rifiutato. Riprova più tardi</h1>
            <p class="lead">
                Potrebbe essere un problema di connessione, o potresti aver inserito dei dati sbagliati
            </p>
         
            <hr class="my-4"/>
            <div>Clicca sul bottone per tornare alla HomePage</div>
            <router-link class="btn btn-primary my-3" :to="{name: 'home'}">Home</router-link>

        </div>

      </div>
    </div>
  </section>

</template>

<script>
    export default {
        name: "OrderConfirmed",  
    }
</script>
<style lang="scss" scoped>
  @import "./../../sass/_variables.scss";

  section {
    background-color: $darkOrange;


    .ms_jumbo {
      background-color: $lightOrange;
      margin-top: 2rem;

      a {
        background-color: $darkOrange;
        border-radius: 5px;
        border: 1px solid $darkOrange;
      }
    }
  }
</style>