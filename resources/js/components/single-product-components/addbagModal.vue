<template>
    <div class="addbag-modal">
   <swiper class="carousel__item swiper" :modules="modules" :space-between="10" :breakpoints="swiperOptions.breakpoints">
       <swiper-slide class="product-img-modal swiper" v-for="slide in slides" :key="slide.id">
           <img :src="slide.img" alt="" class="img-fluid mainImage" />
       </swiper-slide>
   </swiper>
</div>
</template>
<script>
    import image1 from "/images/products/featured4.jpg";
    import image2 from "/images/products/featured3.jpg";
    import image3 from "/images/products/featured4.jpg";
    import image4 from "/images/products/featured2.jpg";
    import image5 from "/images/products/featured1.jpg";
    import { Swiper, SwiperSlide /* rest swiper/vue API... */ } from "swiper/vue";
    import "swiper/css";
    export default {
        components: { Swiper, SwiperSlide },
        data() {
            return {
                slides: [
                    { id: "1", img: image1 },
                    { id: "2", img: image2 },
                    { id: "3", img: image3 },
                    { id: "4", img: image4 },
                    { id: "5", img: image5 },
                    { id: "6", img: image4 },
                    { id: "7", img: image5 },
                    { id: "8", img: image2 },
                    { id: "9", img: image3 },
                    { id: "10", img: image1 },
                ],
                swiperOptions: {
                    breakpoints: {
                        320: { slidesPerView: 3, spaceBetween: 7 },
                        771: { slidesPerView: 5, spaceBetween: 30 },
                    },
                },
            };
        },
    };
    </script>

<style>

.addbag-modal .carousel__prev,
.addbag-modal .carousel__next {
    display: none;
}

.addbag-modal .swiper-backface-hidden .swiper-slide {
    width: 200px !important;
    margin-right: 7px !important;
}

.addbag-modal.swiper {
    z-index: 0 !important;
}
</style>
