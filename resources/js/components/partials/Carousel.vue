<template>
  <div class="container-fluid p-0">

    <b-carousel
      class="container-fluid p-0"
      id="carousel-1"
      v-model="slide"
      :interval="4000"
      controls
      indicators
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
    >

      <!-- Slides with img slot -->
      <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->

      <b-carousel-slide>
        <template #img>
          <img
            class="d-block img-fluid w-100"
            src="../../../../public/img/carousel1.png"
            alt="image slot"
          />
        </template>
      </b-carousel-slide>

      <b-carousel-slide>
        <template #img>
          <img
            class="d-block img-fluid w-100"
            src="../../../../public/img/carousel2.png"
            alt="image slot"
          />
        </template>
      </b-carousel-slide>

      <b-carousel-slide>
        <template #img>
          <img
            class="d-block img-fluid w-100"
            src="../../../../public/img/carousel3.png"
            alt="image slot"
          />
        </template>
      </b-carousel-slide>
    </b-carousel>

  </div>
</template>

<script>
  export default {
    name: "Carousel",

    data() {
      return {
        slide: 0,
        sliding: null,
      };
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true;
      },
      onSlideEnd(slide) {
        this.sliding = false;
      },
    },
  };
</script>

<style lang="scss" scoped>
  div {
    max-height: 400px;

    img {
      height: 400px;
      object-fit: cover;
    }
  }
</style>