<template>
  <section class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-3 col-md-3 col-lg-2 mx-sm-5">
        <img src="../../../public/img/logo-orange.png" alt="logo deliveboo" />
      </div>
    </div>
    <div class="row justify-content-center ms_jumbo_home">
      <div class="col-9">
        <div class="jumbotron ms_jumbo mx-auto text-center">
          <h1 class="font-weight-bold">Benvenuto su DeliveBoo!</h1>
          <p class="lead">Un nuovo modo di concepire il Delivery World</p>
          <hr class="my-4" />
          <p>Clicca sul bottone per iniziare</p>

          <div class="mx-auto d-flex justify-content-center">
            <router-link class="col-9 text-center" :to="{ name: 'home' }">
              <a class="btn" href="#" role="button">Entra</a>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style lang="scss" scoped>
@import "./../../sass/_variables.scss";

.ms_jumbo_home {
 

  h1 {
    color: $darkOrange;
  }


  a {
    width: 100%;
    background-color: $darkOrange;
    border-radius: 5px;
    border: 1px solid $darkOrange;
  }

 
}

img{
    width: 100%;
}

</style>