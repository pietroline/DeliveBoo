<template>
  <section id="footer">
    <div class="container py-5">
      <div class="row text-white fw-bold">
        <div class="col-12 col-lg-6">
          <a href="#"><i class="bi bi-instagram mr-3"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-twitter"></i></a>
        </div>
        <div class="col-12 col-lg-2">
          <ul>
            <h3>Aiuto</h3>
            <li><a href="#">Contatti</a></li>
            <li><a href="#">Faq</a></li>
            <li><a href="#">Altro</a></li>
          </ul>
        </div>

        <div class="col-12 col-lg-2">
          <ul>
            <h3>Scopri Deliveboo</h3>
            <li><a href="#">Acceddi</a></li>
            <li><a href="#">Chi Siamo</a></li>
            <li><a href="#">Lavora con noi</a></li>
          </ul>
        </div>

        <div class="col-12 col-lg-2">
          <ul>
            <h3>Note legali</h3>
            <li><a href="#">Termini e condizioni</a></li>
            <li><a href="#">Informatica sulla privacy</a></li>
            <li><a href="#">Cookie</a></li>
          </ul>
        </div>
      </div>

    </div>

    
      <div class="row">
        <div class="col-12 col-lg-6 text-white fw-bold">carte di credito</div>
      
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
  height: 30rem;
  color: #fff;
  background-color: #ff8c28;
  position: absolute;
  bottom: 0;
  right: 0;
  left: 0;
  margin: 0;

}

#footer .row {
  height: 20rem;
}

#footer ul {
  list-style-type: none;
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

