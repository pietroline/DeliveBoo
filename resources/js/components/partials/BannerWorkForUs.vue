<template>
  <b-container fluid class="my-3">
    <b-row class="justify-content-center align-items-center">
      <b-col cols="11" md="10" lg="4" class="text-center">
        <h1>Hai già la nostra <span class="ms_orange">App?</span></h1>
        <h4 class="py-3">
          Scaricala <span class="ms_orange">ora</span> - disponibile su Apple
          store e Google Play!
        </h4>

        <b-row class="mb-3">
          <b-col>
            <b-link href="https://www.apple.com/it/app-store/" target="_blank"> <b-img class= "ms_img" :src="require('../../../../public/img/app-store.png')"  alt="logo app store"></b-img></b-link>
          </b-col>

          <b-col>
            <b-link href="https://play.google.com/store/apps?gl=IT" target="_blank"><b-img :src="require('../../../../public/img/play-store.png')" class="ms_img" alt="logo play store"></b-img></b-link>
          </b-col>
        </b-row>
      </b-col>
      <b-col cols="11" md="10" lg="4" class="ms_ban p-0">
        <div class="banner-1">
          <!-- <b-img class="img-fluid" :src="require('../../../../public/img/banner-deliveboo.png')" alt="deliveboo banner1"></b-img> -->
        </div>
        
      </b-col>
    </b-row>

    <!--SECONDO BANNER-->

    <b-row class="justify-content-center">
      <b-col class="ms_ban p-0 d-flex justify-content-center my-3 my-lg-0" cols="11" md="10" lg="4">
        <div class="banner-2">
          <!-- <b-img :src="require('../../../../public/img/banner-deliveboo-2.png')" class="ms_img" alt="deliveboo banner2"></b-img> -->
        </div>
      </b-col>
      <b-col  cols="12" md="10" lg="4" class="d-flex ms_bg-dOrange justify-content-center align-items-center rounded text-center">
        <div class="py-5">
          <h1 class="text-dark ms_bolder">
            DeliveBoo for <span class="text-white">Work</span>
          </h1>

          <h4 class="my-2 text-dark">Inizia ora a guadagnare!</h4>

          <b-button class="ms-btn-banner" href="#">Contattaci</b-button>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: "BannerWorkForUs",
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

.ms-btn-banner {
  background-color: $darkOrange;
  border: 1px solid $lightOrange;
  color: white;
  font-weight: bold;

  &:hover {
    background-color: white;
    border: 1px solid $lightOrange;
    color: $darkOrange;
  }
}

.ms_ban {
  border: 1px solid $darkOrange;
  background-color: white;
  border-radius: 5px;
  padding: 0;
}

.ms_img {
  width: 100%;
  height: 100%;
}

.banner-1{
  width: 100%;
  min-height: 300px;
  background-image: url('../../../../public/img/banner-deliveboo.png');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.banner-2{
  width: 100%;
  height: 300px;
  background-image: url('../../../../public/img/banner-deliveboo-2.png');
  background-repeat: no-repeat;
  background-size: contain;
  background-position: center;
}

.ms_orange {
  color: $darkOrange;
}

.ms_bg-dOrange {
  background-color: $darkOrange;
}

.ms_bolder {
  font-weight: bolder;
}
</style>