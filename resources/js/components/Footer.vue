<template>
  <footer>

    <div class="container-fluid py-2 pt-2 pb-4">

      <div class="row">
        <div class="col-12 col-lg-5 d-flex justify-content-center">
          <a href="#"><img src="./../../../public/img/deliveboo-logo-orange-textwhite.png" class="imgLogo" alt="" /></a>
        </div>

        <div class="col-md-2 col-lg-1"></div>

        <div class="col-12 col-md-2 col-lg-1 d-flex align-items-center">
  
            <ul class="list-unstyled">
                <li class="ms_fs3 mb-2 font-weight-bold">
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
              <li  class="ms_fs3 mb-2 font-weight-bold">
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
              <li  class="ms_fs3 mb-2 font-weight-bold">
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


        <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center my-3">


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

        <div class="col-lg-1"></div>

        <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center my-3 text-md-center">
          
            <a href="#" class="width-a mx-4"><img src="./../../../public/img/instagram.jpg" class="img-fluid rounded-circle" alt=""/></a>
          
            <a href="#" class="width-a mx-4"><img src="./../../../public/img/facebook.jpg" class="img-fluid rounded-circle" alt=""/></a>

            <a href="#" class="width-a mx-4"><img src="./../../../public/img/twitter.jpg" class="img-fluid rounded-circle" alt=""/></a>

            <a href="#" class="width-a mx-4"><img src="./../../../public/img/youtube.png" class="img-fluid rounded-circle" alt=""/></a>

        </div>

        <div class="col-lg-1"></div>

      </div>


      <div class="row mt-5 text-center">
        <div class="col-12 my-1 d-flex align-items-center justify-content-center">
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

  @import "./../../sass/_common.scss";

  

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

      .width-a{
        width: 50px;
      }

      a{
        color: white!important;
      }
  }
</style>