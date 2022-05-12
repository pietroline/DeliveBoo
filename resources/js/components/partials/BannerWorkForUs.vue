<template>
  
<b-container fluid class=" my-4">
  <b-row>
    <b-col class="text-center">
        <h1>Hai già la nostra App?</h1>
        <h4 class="py-3">Scaricala ora - disponibile su Apple store e Google Play!</h4>

        <b-row>
            <b-col>
                <b-img src="../../../../public/img/LOGO APP STORE" fluid alt="logo app store"></b-img>
            </b-col>

            <b-col>
                <b-img src="../../../../public/img/LOGO PLAY STORE" fluid alt="logo play store"></b-img>
            </b-col>
        </b-row>
        
        
       
       
    </b-col>
    <b-col>
        <b-img src="../../../../public/img/banner-deliveboo.svg" fluid alt="Responsive image"></b-img>
    </b-col>
    
  </b-row>

  <!--SECONDO BANNER-->

  <b-row>
    <b-col class="text-center">

         <b-img src="../../../../public/img/banner-deliveboo2.svg" fluid alt="Responsive image"></b-img>

    </b-col>
    <b-col>

           <h1>DeliveBoo for Work</h1>
        <h4 class="py-3">Inizia ora a guadagnare!</h4>

        <b-button class="ms-btn-banner" href="#">Contattaci</b-button>

    </b-col>
    
  </b-row>
</b-container>



    

</template>

<script>
export default {
name:'BannerWorkForUs',
}
</script>

<style lang="scss" scoped>

@import "../../../sass/_variables.scss";


.ms-btn-banner{
     background-color: $darkOrange;
    border: 1px solid $lightOrange;
    color: white;
    font-weight: bold;
}

</style>