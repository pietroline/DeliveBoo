<template>
  <section class="d-flex justify-content-center align-items-center">
      
              
          

      <div class="d-flex justify-content-center align-items-center rounded mc_box">

         <img  class="text-end" src="./../../../public/storage/Deliveboo-logo-white.svg"  width="150" height="100" alt="logo DeliveBoo"> <!--logo deliveboo-->
       
       <div class="mx-auto w-75">
           
            <h1>404</h1>
            <h2 class="py-2">Pagina non trovata</h2>
            <h3>Potrebbe essere un problema di connessione, oppure prova a controllare che l'URL inserito sia corretto...</h3>
        </div> 
    </div>
  </section>
    
</template>

<script>
    export default {
        name: "NotFound"
    }
</script>

<style lang="scss" scoped>
@import "./../../sass/_variables.scss";

section{
    background-color: $lightOrange;
    height: 70vh;

    .mc_box{
        background-color: white;
        width: 50%;
        height: 40vh;
        border: 5px solid $darkOrange;
    }
    
}



</style>