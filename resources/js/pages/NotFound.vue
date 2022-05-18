<template>

  <section class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-9 ms-height my-5">

        <div class="jumbotron ms_jumbo">

          <h1 class="display-4 text-white">Errore 404!</h1>
          <p class="lead">
            Potrebbe essere un problema di connessione, oppure prova a
            controllare che l'url inserito sia corretto.
          </p>
          <hr class="my-4"/>
          <p>Clicca sul bottone per tornare alla HomePage</p>
          <p class="lead">
              <router-link class="navbar-brand" :to="{name: 'home'}"><a class="btn ms_btn1 btn-lg" href="#" role="button">Home</a></router-link>
           
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

  .ms-height{
    min-height: 100vh;
  }

  section{
    background-color: rgba(235, 235, 235, 0.87)
  }

  .ms_jumbo {
    background-color: $lightOrange;
    margin-top: 2rem;
    border: 2px solid brown;
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