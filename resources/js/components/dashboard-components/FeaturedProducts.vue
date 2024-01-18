<template>
  <swiper class="featured-products swiper" :space-between="10" :breakpoints="swiperOptions.breakpoints">
    <swiper-slide class="featured-product swiper" v-for="slide in slides" :key="slide.id">
      <div style="display:none;"> {{ thumbnail = slide.thumbnail }} </div>
        <a :href="`/product/${slide.id}`">
          <img :src="slide.thumbnail_path + slide.thumbnail" class="mainImage"/>
        </a>
        <div class="content-featured text-align">
          <a :href="`/product/${slide.id}`"><p class="product-title">{{ slide.name }}</p></a>
            <h3>{{ slide.price }} Lekë</h3>
            <div class="d-flex justify-content-start patterns" v-if="slide.colors.length > 0">
              <div class="background" v-for="(stock, index) in slide.product_stocks" :key="index">
                <div :style="`background:${stock.color_code}`" class="background-color"  v-on:mouseover="slide.thumbnail = stock.color_images[0], slide.thumbnail_path = slide.stocks_path"></div>
              </div>
            </div> 
        </div>
    </swiper-slide>
  </swiper>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      slides : [],
      swiperOptions: {
        breakpoints: {
          320: {
            slidesPerView: 3,
            spaceBetween: 10     
          },
          771: {
            slidesPerView: 5,       
            spaceBetween: 30     
          } 
        }   
      }
    }
  },
  mounted(){
    this.getFeaturedProducts();
  },
  methods: {
    // changepic: function(image_color, thumbnail) {
    // thumbnail = image_color;
    // return thumbnail;
    // },
    getFeaturedProducts() {
      this.loading = true;
      this.axios.get('/api/v1/featured-products').then((response) => {
        this.loading = false;
        this.slides = response.data.data;
      }).catch((error) => {
          this.loading = false;
      })
    }
  },
}

</script>
<style>
.featured-products .featured-product {
  margin-right:10px;
}
.featured-products .featured-product img {
    width: 300px;
    height:370px;
    object-fit: cover;
}
.content-featured {
  margin-top: 0;
}
.featured-products .content-featured h3 {
  color:#D31621;
  font-family: 'Rubik', sans-serif;
  font-weight: 600;
  font-size: 1.2rem;
  text-align: left;
  margin-bottom: 0;
  cursor: pointer;
}
.content-featured p{
    font-size: 0.9rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    margin-bottom: 0;
    color: #767676;
    height: 1.4rem;
    width: 100%;
    word-break: normal;
    overflow: hidden;
}
.content-featured p:hover{
color:#000000;
}
.content-featured .patterns .background {
    cursor: pointer;
    width:25px;
    height:25px;
    object-fit: cover;
    border:1px solid #020202;
    border-radius:50%;
    text-align: center;
    padding: 0;
    margin-right:10px;
    -webkit-box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
    box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
}
.featured-products .featured-product .content-featured .patterns .background img{
    width:23px;
    height:23px;
    object-fit: cover;
    border:2px solid #fff;
    border-radius:50%;
    vertical-align: baseline;
}
@media(max-width:1800px) {
  .featured-products .featured-product img {
    width: 300px;
    height:370px;
    object-fit: cover;
}
}
@media(max-width:1450px) {
  .featured-products .featured-product img {
    width: 280px;
    height:350px;
    object-fit: cover;
}
}
@media(max-width: 1300px) {
  .featured-products .featured-product img {
    width: 250px;
    height:320px;
    object-fit: cover;
}
}
@media(max-width: 1150px) {
  .featured-products .featured-product img {
    width: 280px;
    height:350px;
    object-fit: cover;
}
}
@media(max-width: 900px) {
  .content-featured .patterns .background {
    width: 20px;
    height: 20px;
  }
  .content-featured .patterns .background-color {
    width: 18px;
    height: 18px;
  }
  .featured-products .featured-product img {
    width: 150px;
    height:160px;
    object-fit: cover;
}
.product-title {
  display:none;
}
.featured-products .content-featured h3 {
  font-size:0.9rem;
  font-weight: 500;
}
}
</style>