<template>
  <div class="container-fluid"  v-for="flashSale in flashSales" :key="flashSale.id">
        <div class="row">
            <div class="col-12">
                <h3>uljet e ditës</h3>
            </div>
        </div>
        <div class="row flash-row">
            <div class="col-4 text-start p-md-0">
                <h3>flash sale</h3>
            </div>
            <div class="col-8 text-end p-md-0">
                <router-link class="flash-anchertag" :to="{ name:'front.flash-Sale', params: {slug: flashSale.slug} }">mbaron 
                    <vue-countdown :time="new Date(flashSale.end_date) - new Date(flashSale.date_now)"  v-slot="{ days, hours, minutes, seconds }">
                      <span v-if="days > 0">{{ days }}</span>:<span>{{ hours }}</span>:<span>{{ minutes }}</span>:<span>{{ seconds }}</span>
                    </vue-countdown>
                    ›
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-0">
              <swiper class="flash-sales swiper"  :space-between="10" :breakpoints="swiperOptions.breakpoints">
                <swiper-slide class="flash-sale swiper" v-for="productDetails in flashSale.products_id" :key="productDetails.id">
                  <div class="label-sale">
                    <img :src="flash" alt="flash-sale">
                    <p v-if="productDetails.discount_type === 'percentage'">-{{ productDetails.discount }}%</p>
                    <p v-else>-{{ dicount(productDetails) }}%</p>
                  </div>
                  <router-link :to="{ name:'product.details', params: {slug: productDetails.id} }">
                    <img :src="`../images/admin_products/small/${productDetails.product.thumbnail}`"/>
                  </router-link>
                  <div class="content">
                    <div class="content-price">
                        <h3 v-if="productDetails.discount_type === 'percentage'">{{ newPrice(productDetails) }} Lekë</h3>
                        <h3 v-else>{{ productDetails.product.price - productDetails.discount }} Lekë</h3>
                        <div class="align-self-md-center"><p>{{ productDetails.product.price }} Lekë</p></div>
                    </div>
                    <div class="progress-bar">
                        <div class="shell">
                            <div class="bar" :style="{ width: sold + '%' }">
                            </div>
                        </div>
                        <p>{{ productDetails.discount }}% Shitur</p>
                    </div>
                  </div>
                </swiper-slide>
              </swiper>
            </div>
        </div>
    </div>

</template>

<script>
import flash from "../../assets/rrufe.png"
import VueCountdown from '@chenfengyuan/vue-countdown';
import { Swiper, SwiperSlide, /* rest swiper/vue API... */ } from 'swiper/vue'
import 'swiper/css'
export default {
  components: {
    Swiper,
    SwiperSlide,
    VueCountdown
  },
  data() {
    const now = new Date('2022-10-25 08:56:00');
    const newYear = new Date(now.getFullYear() + 1, 0, 1);
    return {
      time: newYear - now,
      dateNow: now,
      sale: 100,
      sold: '65',
      flashSales : [],
      swiperOptions: {
        breakpoints: {         
          20: {  
            slidesPerView: 3,
            spaceBetween: 10     
          },        
          771: {
            slidesPerView: 5,       
            spaceBetween: 30     
          } 
        }   
      },
      flash: flash,
      loading: false
    }
  },
  mounted(){
    this.getFlashSaleProducts();
  },
  methods: {
    changepic(hoverimg, img) {
    img = hoverimg;
    return img;
    },
    dicount(productDetails) {
      return (productDetails.discount*100/productDetails.product.price).toFixed(0); //in the sale will the price after discount
    },
    newPrice(productDetails) {
      return (productDetails.product.price - productDetails.product.price * productDetails.discount / 100).toFixed(0); 
    },
    getFlashSaleProducts() {
      this.loading = true;
      this.axios.get('/api/v1/flash-sale-products').then((response) => {
        this.loading = false;
        this.flashSales = response.data.data;
      }).catch((error) => {
          this.loading = false;
      })
    }
  },
}
</script>
<style scoped>
 h3 {
    text-transform: uppercase;
    font-family: 'Rubik', sans-serif;
    font-weight: 800;
    font-size: 1.8rem;
    text-align: center;
}
.flash-row {
    padding:0px 20px;
    margin-bottom:40px;
}
.flash-row h3 {
    font-family: 'Rubik', sans-serif;
    text-align:left;
    margin-bottom:0;
    margin-top:9px;
}
.flash-anchertag {
    text-transform: uppercase;
    font-size:1.2rem;
    padding-bottom:5px;
    color: #020202;
}
 .flash-anchertag span span {
    background:#000;
    border:1px solid transparent;
    border-radius:8px;
    padding:4px 8px;
    margin:0px 10px;
    color:#fff;
    font-family: 'Rubik', sans-serif;
    font-size:1.8rem;
    font-weight:1000;
}
.flash-sales .carousel__prev, .flash-sales .carousel__next {
    display:none;
}
.flash-sale {
    display:flex;
    flex-direction: column;
    justify-content: left;
  }
  @media(min-width:901px){
    .content-price {
      display:flex;
      justify-content: start;
    }
  }
.flash-sale img {
  width:300px;
  height: 360px;
  object-fit: cover;
  position: relative;
}
.content {
  margin-top: 10px;
  width:300px;
}
.content h3 {
  color:#D31621;
  font-family: 'Rubik', sans-serif;
  font-weight: 500;
  font-size: 1.2rem !important;
  margin-bottom: 0;
}
.content p {
  color: #474747;
  font-family: 'Rubik', sans-serif;
  font-weight: 400;
  font-size: 1rem;
  text-decoration: line-through;
  margin-left:5px;
}
.flash-sale .progress-bar {
  display: flex;
  flex-direction: column !important;
  justify-content: start !important;
}
.flash-sale .shell {
    height: 10px;
    width: 250px;
    border: 0px;
    background: #E7E7E7;
    border-radius: 0px;
    margin-right:10px;
    }
.flash-sale .bar {
  background: #FFD600;
  height: 10px;
  width: 15px;
  border-radius: 0;
}
.flash-sale .progress-bar p {
  font-size: 0.7em;
  color: #020202;
  font-weight:400;
  line-height:0.5rem;
  width:100px;
  text-align: left;
  text-decoration: none;
  margin-left:0;
  margin-top:5px;
}
.label-sale {
  width:45px;
  height:50px;
  background: #FFD600;
  position:absolute;
  top:0;
  left:0;
  z-index:250;
  text-align: center !important;
  align-self: middle;
}
.label-sale img {
  width: 9px !important;
  height: auto !important;
}
.label-sale p {
  font-size: 1rem;
  letter-spacing:-1px;
  font-weight: 600;
  margin-bottom:0;
  margin-top:-5px;
  text-align: center !important;
  font-family: 'Muli', sans-serif;
}
@media(max-width:1800px) {
  .flash-sale img {
  width:270px;
  height: 330px;
  object-fit: cover;
}
}
@media(max-width:1450px) {
  .flash-sale img {
  width:220px;
  height: 280px;
  object-fit: cover;
}
.flash-sale .shell {
  width:220px;
}
}
@media(max-width: 1300px) {
  .flash-sales-carousel .flash-sale {
    text-align: left;
  }
  .flash-sale img {
  width:200px;
  height: 260px;
  object-fit: cover;
}
.flash-sale .shell {
  width:200px;
}
}
@media(max-width:900px) {
.flash-sale .progress-bar {
  display: none;
}
.flash-sales .flash-sale img {
  width: 150px;
  height:160px;
  object-fit: cover;
}
.content {
  margin-top: 10px;
  width:100%;
}
.content .content-price {
  display: flex;
  flex-direction: column;
  justify-content: start !important;
}
.flash-sales .flash-sale {
  margin-right:10px;
}
.flash-sales .flash-sale h3 {
  font-size:0.9rem !important;
  line-height:0.5 !important;
  margin-left:0;
  margin-right: auto;
}
.flash-sales .flash-sale p {
  font-size:0.7rem;
  margin-left:0 !important;
  margin-right: auto !important;
  padding:0;
  text-align:left;
}
.label-sale {
  width: 35px;
  height: 40px;
}
.label-sale img {
  width: 7px !important;
  height: auto !important;
}
.label-sale p {
  font-size: 0.8rem !important;
}
}
</style>