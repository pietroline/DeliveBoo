<template>

  <section class="container-fluid">
    <div class="row justify-content-center ">
      <div class="col-9">
        <div class="jumbotron ms_jumbo mx-auto">
          <h1 class="display-4 text-white">Errore 404!</h1>
          <p class="lead">
            Potrebbe essere un problema di connessione, oppure prova a
            controllare che l'url inserito sia corretto.
          </p>
          <hr class="my-4" />
          <p>Clicca sul bottone per tornare alla HomePage</p>
          <p class="lead">
              <router-link class="navbar-brand" :to="{name: 'home'}"><a class="btn btn-primary btn-lg" href="#" role="button">Home</a></router-link>
           
          </p>
        </div>
      </div>
    </div>
  </section>

 
    

</template>

<script>
export default {
  name: "NotFound",
};
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