<template>
  

<b-container fluid class="my-3">
  <b-row class="mx-auto justify-content-center align-items-center">
    <b-col cols="4" class="text-center">
        <h1>Hai già la nostra <span class="ms_orange">App?</span> </h1>
        <h4 class="py-3">Scaricala <span class="ms_orange">ora</span>  - disponibile su Apple store e Google Play!</h4>

        <b-row>
            <b-col>
                <b-img :src="require('../../../../public/img/app-store.png')" fluid alt="logo app store"></b-img>
            </b-col>

            <b-col>
                <b-img :src="require('../../../../public/img/play-store.png')" fluid alt="logo play store"></b-img>
            </b-col>
        </b-row>
        
        
       
       
    </b-col>
    <b-col cols="4" class="ms_ban ">
        <b-img class="ms-img"  :src="require('../../../../public/img/banner-deliveboo.png')" fluid alt="Responsive image"></b-img>
    </b-col>
    
  </b-row>

  <!--SECONDO BANNER-->

  <b-row class="my-4 justify-content-center rounded">
    <b-col class="ms_ban" cols="4">

         <b-img :src="require('../../../../public/img/banner-deliveboo-2.png')" fluid alt="Responsive image"></b-img>

    </b-col>
    <b-col  cols="4" class=" d-flex ms_bg-dOrange justify-content-center align-items-center rounded text-center ">

      <div>
         <h1 class="text-dark ms_bolder">DeliveBoo for <span class="text-white">Work</span> </h1>

  <h4 class="my-2 text-dark">Inizia ora a guadagnare!</h4>
     
    
       
            <b-button class="ms-btn-banner" href="#">Contattaci</b-button>

      </div>
              
      
       
      
     

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

    &:hover{
       background-color: white;
    border: 1px solid $lightOrange;
    color:$darkOrange;
    }
}


.ms_ban{
  border: 1px solid $darkOrange;
  border-radius: 5px;
}

.ms_img{
  width: 100%;
  height: 100%;
}

.ms_orange{
  color: $darkOrange;
}

.ms_bg-dOrange{
  background-color: $darkOrange;
}

.ms_bolder{
  font-weight: bolder;
}
</style>