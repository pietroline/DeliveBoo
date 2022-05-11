<template>
  <section id="footer">
    <div class="container py-5">

      <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 text-white ">

        <div class="col col-md-12 d-flex flex-column align-items-center">
          <div class="imgLogo">
              <a href="#"><img src="./../../../public/img/logo-white.png" class="w-100" alt="" /></a>
          </div>
        </div>

        <div class="col d-flex flex-column align-items-center justify-content-center my-3">
           
          <ul class="list-unstyled text-center">
            <li class="ms_fs3 font-weight-bold">Aiuto</li>
            <li><a href="#" class="text-white">Contatti</a></li>
            <li><a href="#" class="text-white ">Faq</a></li>
            <li><a href="#" class="text-white ">Altro</a></li>
          </ul>

        </div>

         <div class="col d-flex flex-column align-items-center justify-content-center my-3">
           
          <ul class="list-unstyled text-center">
            <li class="ms_fs3 font-weight-bold">Scopri Deliveboo</li>
            <li><a href="#" class="text-white">Accedi</a></li>
            <li><a href="#" class="text-white">Chi Siamo</a></li>
            <li><a href="#" class="text-white">Lavora con noi</a></li>
          </ul>
 
        </div>

         <div class="col d-flex flex-column align-items-center justify-content-center my-3">
           
          <ul class="list-unstyled text-center">
            <li class="ms_fs3 font-weight-bold">Note legali</li>
            <li><a href="#" class="text-white">Termini e condizioni</a></li>
            <li><a href="#" class="text-white">Privacy</a></li>
            <li><a href="#" class="text-white">Cookie</a></li>
          </ul>

        </div>
      
      </div>

      <div class="row row-cols-1 row-cols-md-2">
         <div class="col d-flex justify-content-center align-items-center my-3">
            <a href="#"><i class="bi bi-instagram mx-5 text-white ms_fs2"></i></a>
            <a href="#"><i class="bi bi-facebook mx-5 text-white ms_fs2"></i></a>
            <a href="#"><i class="bi bi-twitter mx-5 text-white ms_fs2"></i></a>
        </div>

        <div class="col d-flex flex-column flex-xl-row justify-content-around align-items-center my-3">
          <div class="font-weight-bold ms_fs2 d-xl-none ">Scarica App</div>
         
              <div class="imgApp my-2">
                <a href="#"><img src="./../../../public/img/app-store.png" class="w-100" alt=""/></a>
              </div>
              <div class="imgApp my-2">
                <a href="#"><img src="./../../../public/img/play-store.png" class="w-100" alt=""/></a>
              </div>
         
        </div>
        
      </div>

      <div class="row row-cols-1 row-cols-md-2">
        <div class="col d-flex justify-content-center my-3">

          <div class="imgCard">
            <a href="#"><img src="./../../../public/img/logo-visa.png" class="w-100" alt=""></a>
          </div>

          <div class="imgCard">
             <a href="#"> <img src="./../../../public/img/logo-mastercard.png" class="w-100" alt=""></a>
          </div>

          <div class="imgCard">
            <a href="#"><img src="./../../../public/img/logo-paypal.png" class="w-100" alt=""></a>
          </div> 

        </div>

        <div class="col d-flex justify-content-center align-items-center my-3">
          <div class="ms_fs5">DeliveBoo Italy S.r.l. - P.IVA 05141940750</div>
        </div>
      </div>
          
        
        
    </div>
  </section>
</template>

<script>
  export default {
    name: "Footer",
  };
</script>

<style lang="scss" scoped>

  @import "./../../sass/common.scss";
  #footer {
    color: #fff;
    background-color: #ff8c28;
  }

  .imgLogo {
    width: 15rem;
  }

  .imgApp {
    width: 10rem;
  }

  .imgCard{
    width: 5rem;
    margin: 0 1.5rem;
  }

</style>

