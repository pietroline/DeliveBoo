<template>
  <section id="footer">
    <div class="container py-5">
      <div class="row text-white ">
        <div class="col-12 col-md-6 col-xl-6">
          <h3>Scarica App</h3>
             <div class="col">
          <img src="./../../../public/img/app-store.png" class="img" alt="" />
        </div>
             <div class="col">
        <img src="./../../../public/img/play-store.png" class="img" alt="" />
        </div>
          
        
        
        </div>
        <!--
        <div class="col-2">
          <img src="./../../../public/img/visa.png" class="img-fluid" alt="" />
        </div>
        <div class="col-2">
          <img
            src="./../../../public/img/mastecard.png"
            class="img-fluid"
            alt=""
          />
        </div>
        <div class="col-2">
          <img src="./../../../public/img/PayPal.png" class="img-fluid" alt="" />
        </div>
        -->

        <div class=" col-12 col-md-6 col-xl-2">
           
          <ul>
           <h3>Aiuto</h3>
            <li><a href="#">Contatti</a></li>
            <li><a href="#">Faq</a></li>
            <li><a href="#">Altro</a></li>
          </ul>
        </div>

        <div class="col-12 col-md-6 col-xl-2">
          <ul>
            <h4>Scopri Deliveboo</h4>
            <li><a href="#">Accedi</a></li>
            <li><a href="#">Chi Siamo</a></li>
            <li><a href="#">Lavora con noi</a></li>
          </ul>
        </div>

        <div class="col-12 col-md-6 col-xl-2">
          <ul>
            <h3>Note legali</h3>
            <li><a href="#">Termini e condizioni</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Cookie</a></li>
          </ul>
        </div>
      </div>
  

      <div class="row mt-5">
        <div class="col-12 col-md-6 col-xl-6 text-white">
          <a href="#"><i class="bi bi-instagram mr-3"></i></a>
          <a href="#"><i class="bi bi-facebook mr-3"></i></a>
          <a href="#"><i class="bi bi-twitter mr-3"></i></a>
        </div>

        <div class="col-12 col-md-6 col-xl-2">
           <img src="./../../../public/img/visaver.png" class="img" alt="">
        
        </div>
        <div class="col-12 col-md-6 col-xl-2">
           <img
            src="./../../../public/img/mastecardsc.png"
            class="img"
            alt=""
          />
        </div>
          <div class="col-12 col-md-6 col-xl-2">
           <img
            src="./../../../public/img/PayPal.png"
            class="img"
            alt=""
          />
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
#footer {
  color: #fff;
  background-color: #ff8c28;
  // position: absolute;
  // bottom: 0;
  // right: 0;
  // left: 0;
  // margin: 0;
}

.img {
  width: 8rem;
  padding: 5px;
}

#footer ul {
  list-style-type: none;
  padding: 5px;
  
}

#footer i {
  color: #ffff;
  font-size: 30px;
}

#footer a {
  color: #ffff;
  font-size: 15px;
  
}
</style>

