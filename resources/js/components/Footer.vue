<template>
  <footer>
    <div class="container-fluid py-2 pt-2 pb-4">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-5">
          <a href="#"><img src="./../../../public/img/logo-orange.png" class="imgLogo" alt="" /></a>
        </div>


        <div class="col-12 col-md-4 col-lg-1 d-flex align-items-center">
            <ul class="list-unstyled">
                <li class="ms_fs3 font-weight-bold">
                  Aiuto
                </li>
                <li>
                  <a href="#">Contatti</a>
                </li>
                <li>
                  <a href="#">Faq</a>
                </li>
                <li>
                  <a href="#">Altro</a>
                </li>
            </ul>
        </div>

        <div class="col-12 col-md-4 col-lg-2 d-flex align-items-center">
            <ul class="list-unstyled">
              <li  class="ms_fs3 font-weight-bold">
                Scopri Deliveboo
              </li>
              <li>
                <a href="#">Accedi</a>
              </li>
              <li>
                <a href="#">Chi Siamo</a>
              </li>
              <li>
                <a href="#">Lavora con noi</a>
              </li>
            </ul>
        </div>

        <div class="col-12 col-md-4 col-lg-2 d-flex align-items-center">
            <ul class="list-unstyled">
              <li  class="ms_fs3 font-weight-bold">
                Note legali
              </li>
              <li>
                <a href="#">Termini e condizioni</a>
              </li>
              <li>
                <a href="#">Privacy</a>
              </li>
              <li>
                <a href="#">Cookie</a>
              </li>
            </ul>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="col-12 col-md-6 col-lg-5 d-flex align-items-center">
            <a href="#"><i class="bi bi-instagram mx-4 text-white ms_fs2"></i></a>
            <a href="#"><i class="bi bi-facebook mx-4 text-white ms_fs2"></i></a>
            <a href="#"><i class="bi bi-twitter mx-4 text-white ms_fs2"></i></a>
          </div>

          <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-center">
            <div class="imgApp m-2">
              <a href="#"><img src="./../../../public/img/app-store.png" class="w-100" alt=""/></a>
            </div>
            <div class="imgApp m-2">
              <a href="#"><img src="./../../../public/img/play-store.png" class="w-100" alt=""/></a>
            </div>
              
          </div>
      </div>


      <div class="row justify-content-center">

        <div class="col-12 col-lg-5 d-flex my-1">

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

        <div class="col-12 col-lg-5 my-1 d-flex align-items-center justify-content-center">
          <div class="ms_fs5">DeliveBoo Italy S.r.l. - P.IVA 05141940750</div>
        </div>
      </div>
    </div>

  </footer>
  
  
</template>

<script>
  export default {
    name: "Footer",
  };
</script>

<style lang="scss" scoped>

  @import "./../../sass/common.scss";

  

  footer{
    color: #fff;
    background-color: rgb(41, 49, 51);
    width: 100%;
    min-height: 10vh;

      .imgLogo {
        width: 15rem;
      }

      .imgApp {
        width: 10rem;
      }

      .imgCard{
        width: 5rem;
        margin: 0 1.5rem;
        padding: 10px;
        border-radius: 10px;
        background-color: white;
      }

      a{
        color: white!important;
      }
}
</style>