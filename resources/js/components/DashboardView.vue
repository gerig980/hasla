<template>
    <section class="first-banner">
        <div class="container-fluid">
            <div class="row informations desktop">
                <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center info-col">
                        <div class="img"><img :src="customerService" /></div>
                        <div class="info-content">
                            <h3>24/7 suport</h3>
                            <p>Suport në çdo kohë</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center info-col">
                        <div class="img"><img :src="returnpolicy" /></div>
                        <div class="info-content">
                            <h3>Politika e kthimit</h3>
                            <p>100% e sigurt</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center info-col">
                        <div class="img"><img :src="fastDelivery" /></div>
                        <div class="info-content">
                            <h3 class="info-title">merrni 10% ulje</h3>
                            <p>në porosinë tuaj të parë</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 align-self-center">
                    <div class="d-flex justify-content-center info-col">
                        <div class="img"><img :src="tag" /></div>
                        <div class="info-content">
                            <h3>Dërgesa të shpejta</h3>
                            <p>Brenda 48 orëve</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row informations mobile">
                <div class="info-col d-flex justify-content-center">
                    <div class="info-content">
                        <h3>Politika e kthimit</h3>
                        <p>100% e sigurt</p>
                    </div>
                </div>
                <div class="info-col d-flex justify-content-center">
                    <div class="info-content">
                        <h3>24/7 suport</h3>
                        <p>Suport në çdo kohë</p>
                    </div>
                </div>
                <div class="info-col d-flex justify-content-center">
                    <div class="info-content">
                        <h3>Dërgesa të shpejta</h3>
                        <p>Brenda 48 orëve</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col p-0">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                v-for="(slider, index) in sliders" :key="index" :class="{ active: index === 0 }"
                                :data-bs-slide-to="`${index}`" aria-current="true" aria-label="Slide 1">
                            </button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item" v-for="(slider, index) in sliders" :key="index"
                                :class="{ active: index === 0 }" :data-bs-slide-to="`${index}`">
                                <a :href="`${slider.link}`"><img class="d-block w-100"
                                        v-bind:src="`/images/banners/large/${slider.bg_image}`" alt="First slide"></a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <img :src="left">
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <img :src="right">
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-category pc">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3>Bli sipas kategorive</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 p-0 d-flex cards-row">
                    <div class="card" v-for="(subCategory, i) in subCategories" :key="i">
                        <router-link :to="{ name: 'product.by.category', params: { slug: subCategory.slug } }">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <img
                                            v-bind:src="`/backend/assets/images/products/category/icons/${subCategory.icon}`">
                                    </div>
                                    <div class="col-8 align-self-center">
                                        <p class="category-title">{{ subCategory.name }}</p>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="card view-all last">
                        <a href="/category/femra">
                            <div class="container-fluid px-0">
                                <div class="row">
                                    <div class="col-8 align-self-center">
                                        <p class="category-title px-0">Të Gjitha</p>
                                    </div>
                                    <div class="col-4 align-self-center text-end">
                                        <img :src="arrowright" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-category mobile px-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 px-0"></div>
                <div class="col-8 px-0">
                    <h3>Bli sipas kategorive</h3>
                </div>
                <div class="col-2 px-0"><a href="" class="view-all">Të Gjitha ›</a></div>
            </div>
            <div class="row">
                <div class="col p-0">
                    <CategorySlider />
                </div>
            </div>
        </div>
    </section>
    <section class="last-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <a v-for="fullBanner in firstFullBanner" :key="fullBanner.id" :href="`${fullBanner.link}`">
                        <img v-bind:src="`/images/banners/large/${fullBanner.image}`" class="last-banner-img" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="second-banners">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 p-0 d-flex" v-for="(halfBanner, key) in twoFirstHalfBanner" :key="key"
                    :class="{ 'justify-content-start': key % 2 === 0, 'justify-content-end': key % 2 !== 0 }">
                    <router-link :to="halfBanner.link" class="first-row-banners"
                        :class="{ 'justify-content-end d-flex': key % 2 !== 0 }">
                        <img v-bind:src="`/images/banners/medium/${halfBanner.image}`"></router-link>
                </div>
            </div>
        </div>
    </section>
    <section class="flash-sales">
        <FlashSales class="slider" />

    </section>
    <section class="second-banners">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 p-0 d-flex" v-for="(halfBanner, index) in halfBanners" :key="index"
                    :class="{ 'justify-content-start': index % 2 === 0, 'justify-content-end': index % 2 !== 0 }">
                    <router-link :to="halfBanner.link" class="first-row-banners"
                        :class="{ 'justify-content-end d-flex': index % 2 !== 0 }">
                        <img v-bind:src="`/images/banners/medium/${halfBanner.image}`">
                    </router-link>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-products">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3>më të shiturat</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 p-0 m-2">
                    <FeaturedProducts class="slider" />
                </div>
            </div>
        </div>
    </section>
    <section class="last-banner">
        <div class="container-fluid">
            <div class="row last-banner-row" v-for="(fullBanner, index) in fullBanners" :key="index">
                <div class="col-12 p-0">
                    <a :href="`${fullBanner.link}`">
                        <img v-bind:src="`/images/banners/large/${fullBanner.image}`" class="last-banner-img" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="filter-products filter-products-dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0">
                    <h3>#klaudiofashion products</h3>
                </div>
            </div>
            <div class="row">
                <a class="product-card" v-for="(product, index) in products" :key="index"
                    :href="`/product/${product.id}`">
                    <img :src="product.thumbnail_path + product.thumbnail" :alt="product.name" class="img-fluid" />
                    <p class="product-name mt-1">{{ product.name }} </p>
                    <p class="price">{{ product.price }} lekë</p>
                    <div class="d-flex justify-content-start patterns" v-if="product.has_variant === 1">
                        <div class="background" v-for="(stock, index) in product.product_stocks" :key="index">
                            <div :style="`background:${stock.color_code}`" class="background-color"
                                v-on:mouseover="product.thumbnail = stock.color_images[0], product.thumbnail_path = product.stocks_path">
                            </div>
                        </div>
                    </div>
                </a>
                <!-- <button @click="productsToShow += 5">show more reviews</button> -->
            </div>
        </div>
    </section>
    <BottomIcons />
</template>
<script>
import bannerone from "../assets/banners/first-slide.jpg"
import bannerTwo from "/images/banner-k1.jpg"
import bannertwo from "/images/banner-k2.jpg"
import newCollection from "../assets/banners/new-collection.png"
import salesBanner from "../assets/banners/199leke.png"
import lastBanner from "/images/banner-k2.jpg"
import right from "../assets/Polygon2.png"
import left from "../assets/Polygon1.png"
import returnpolicy from "../assets/return-policy.png"
import tag from "../assets/tag.png"
import customerService from "../assets/customer-service.png"
import fastDelivery from "../assets/package-box.png"
import delivery from "../assets/delivery-truck.png"
import bikini from "../assets/bikini.png"
import skirts from "../assets/skirt.png"
import trousers from "../assets/trouser.png"
import tshirts from "../assets/tshirt.png"
import shoes from "../assets/shoe.png"
import arrowright from "../assets/view-all.png"
import FlashSales from "./dashboard-components/FlashSales.vue"
import FeaturedProducts from "./dashboard-components/FeaturedProducts.vue"
import CategorySlider from "./dashboard-components/CategorySlider.vue"
import BottomIcons from "./dashboard-components/BottomIcons.vue"

export default {
    components: { FlashSales, FeaturedProducts, CategorySlider, BottomIcons },
    data() {
        return {
            tag: tag,
            bannerone: bannerone,
            bannertwo: bannertwo,
            bannerTwo: bannerTwo,
            lastBanner: lastBanner,
            newCollection: newCollection,
            salesBanner: salesBanner,
            left: left,
            right: right,
            returnpolicy: returnpolicy,
            customerService: customerService,
            fastDelivery: fastDelivery,
            delivery: delivery,
            bikini: bikini,
            skirts: skirts,
            trousers: trousers,
            tshirts: tshirts,
            shoes: shoes,
            arrowright: arrowright,
            subCategories: [],
            sliders: [],
            products: [],
            banners: [],
            loading: false,
            productsToShow: 1,
            totalProducts: 0
        }
    },
    mounted() {
        this.getSliders();
        this.getBanners();
        this.getSubCategories();
        this.getProducts();
        this.totalProducts = this.products.length
  	console.log(this.products.length)
    },
    methods: {
        getSliders() {
            this.loading = true;
            this.axios.get('/api/v1/sliders').then((response) => {
                this.loading = false;
                this.sliders = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getBanners() {
            this.loading = true;
            this.axios.get('/api/v1/banners').then((response) => {
                this.loading = false;
                this.banners = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getSubCategories() {
            this.loading = true;
            this.axios.get('/api/v1/subcategories').then((response) => {
                this.loading = false;
                this.subCategories = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getProducts() {
            this.loading = true;
            this.axios.get('/api/v1/products').then((response) => {
                this.loading = false;
                this.products = response.data.data;
                console.log(response);
            }).catch((error) => {
                this.loading = false;
            })
        }
    },
    computed: {
        firstFullBanner() {
            return this.banners.filter(b => b.banner_type === 'col_1').slice(0, 1);
        },
        twoFirstHalfBanner() {
            return this.banners.filter(c => c.banner_type === 'col_2').slice(0, 2);
        },
        halfBanners() {
            return this.banners.filter(t => t.banner_type === 'col_2').slice(2);
        },
        fullBanners() {
            return this.banners.filter(d => d.banner_type === 'col_1').slice(1);
        }
    }
}

</script>
<style>
.product-card .product-name {
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
.product-name:hover{
color:#000000;
}
.filter-products.filter-products-dashboard {
    padding-top: 0;
}

@media(min-width:900px) {
    .informations.mobile {
        display: none;
    }
}

.first-row-banners {
    margin-bottom: 40px;
}

.first-banner {
    padding: 180px 80px 0px;
}

.first-banner .carousel-inner,
.first-banner .carousel-inner img {
    width: 100%;
    height: 580px;
    object-fit: cover;
}

.carousel-control-prev {
    left: -90px !important;
    opacity: 1 !important;
}

.carousel-control-prev img,
.carousel-control-next img {
    width: 12px;
}

.carousel-control-next {
    right: -90px !important;
    opacity: 1 !important;
}

.carousel-indicators button.active {
    background-color: #D31621;
    width: 60px !important;
}

.carousel-indicators button {
    border: 1px solid transparent !important;
    border-radius: 8px !important;
    height: 5px !important;
    margin-right: 8px;
    width: 45px !important;
}

.informations {
    background: #f5f5f5;
    height: 70px;
    margin-bottom: 20px;
}

.informations .col-3 {
    position: relative;
}

.informations .info-col {
    vertical-align: baseline;
    padding-top: auto;
    padding-bottom: auto;
}

.informations .info-col .img {
    width: 30px;
    align-self: center;
}

.informations .info-col .img img {
    width: 100%;
    height: auto;
    object-fit: contain;
}

.informations .col-3:first-child::after,
.informations .col-3:nth-child(2)::after,
.informations .col-3:nth-child(3)::after {
    content: "";
    width: 0.2px;
    height: 50px;
    top: -8px;
    right: 0;
    position: absolute;
    background-color: #D31621;
    border: 1px solid transparent;
    border-radius: 8px;
    ;
}

.informations .info-col .info-content {
    align-self: center;
}

.informations .info-col .info-content p {
    margin-left: 20px;
    margin-bottom: 0;
    font-size: 0.9rem;
}

.product-card .price {
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    margin-bottom: 0;
}

.informations .info-col h3 {
    margin-left: 20px;
    text-transform: uppercase;
    font-family: 'Rubik', sans-serif;
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 0;
    text-align: left;
}

.shop-category {
    margin-top: 80px;
    padding: 40px 80px;
    background-color: #f5f5f5;
}

.shop-category.mobile {
    display: none;
}

.shop-category.pc {
    display: block;
}

.shop-category h3,
.featured-products h3 {
    text-transform: uppercase;
    font-family: 'Rubik', sans-serif;
    font-weight: 800;
    font-size: 1.8rem;
    text-align: center;
}

.shop-category .card {
    background: #fff;
    width: calc(20% - 20px);
    height: 100px;
    border: none;
    border-radius: 0px;
    padding-left: 25px;
    padding-right: 25px;
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.shop-category .card.last {
    margin-right: 0px !important;
}

.shop-category .cards-row {
    margin-top: 40px;
    flex-wrap: wrap;
    justify-content: space-between;
}

.shop-category .card img {
    width: 50px;
    height: auto;
}

.shop-category .card .category-title {
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    font-size: 1.4rem;
    vertical-align: middle;
    margin-top: auto;
    margin-bottom: auto;
    color: #020202;
}

.shop-category .card.view-all {
    background-color: #D31621;
    padding-left: 40px;
    padding-right: 40px;
}

.shop-category .card.view-all img {
    width: 25px;
}

.shop-category .card.view-all p {
    color: #fff;
    text-transform: uppercase;
}

.flash-sales {
    padding: 40px 80px;
}

.flash-sales.swiper {
    padding: 0;
}

.flash-sales .slider,
.featured-products .slider {
    margin-top: 40px;
}

.second-banners {
    padding: 40px 80px 0px;
}

.second-banners a {
    width: 100%;
}

.second-banners img {
    width: 97%;
    height: 450px;
    object-fit: cover;
}

.featured-products {
    padding: 40px 80px;
}

.featured-products.swiper {
    padding: 0;
}

.last-banner .last-banner-row {
    margin-bottom: 40px;
}

.last-banner .last-banner-img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}

.last-banner {
    padding: 60px 80px 20px;
}

@media(max-width:1800px) {
    .shop-category .card {
        padding-left: 15px;
        padding-right: 15px;
    }

    .shop-category .card .category-title {
        font-size: 1.4rem;
    }

    .flash-sales {
        padding: 40px 80px;
    }

    .second-banners img {
        height: 400px;
    }

    .featured-products {
        padding: 40px 70px;
    }
}

@media(max-width:1450px) {
    .shop-category .card {
        margin-right: 10px !important;
        padding-left: 5px;
        padding-right: 5px;
        height: 80px;
    }

    .shop-category .card .category-title {
        font-size: 1rem;
    }

    .shop-category .card img {
        width: 35px;
        height: auto;
    }

    .shop-category .card.view-all {
        padding-left: 20px;
        padding-right: 20px;
    }

    .second-banners img {
        height: 350px;
    }

    .flash-sales {
        padding: 40px 80px;
    }

    .featured-products {
        padding: 40px 70px;
    }

    .carousel-control-prev {
        left: -70px !important;
    }

    .carousel-control-next {
        right: -70px !important;
    }
}

@media(max-width:1300px) {
    body {
        width: 100vw;
    }

    .carousel-control-prev {
        left: -50px !important;
    }

    .carousel-control-next {
        right: -50px !important;
    }

    .carousel-inner {
        width: 100%;
        height: 400px;
    }

    .informations {
        height: 80px;
    }

    .informations .col-3:first-child::after,
    .informations .col-3:nth-child(2)::after,
    .informations .col-3:nth-child(3)::after {
        height: 60px;
    }

    .informations .info-col h3 {
        font-size: 1.2rem;
    }

    .last-banner .last-banner-img {
        height: 400px;
    }
}

@media(max-width:1150px) {
    .first-banner {
        padding: 210px 50px 0px;
    }

    .shop-category,
    .second-banners,
    .last-banner {
        padding: 40px 50px;
    }

    .flash-sales,
    .featured-products {
        padding: 40px 20px;
    }
}

@media(max-width:1000px) {
    .carousel-control-prev {
        left: -40px !important;
    }

    .carousel-control-next {
        right: -40px !important;
    }

    .carousel-inner,
    .last-banner .last-banner-img,
    .second-banners img {
        height: 300px;
    }

    .shop-category .card {
        padding-left: 0px;
        padding-right: 0px;
    }

    .first-banner {
        padding: 210px 50px 0px;
    }

    .shop-category,
    .second-banners,
    .last-banner {
        padding: 40px 50px;
    }

    .flash-sales,
    .featured-products {
        padding: 40px 20px;
    }

    .shop-category .card .category-title {
        font-size: 0.9rem;
    }

    .shop-category .card.view-all {
        padding-left: 10px;
        padding-right: 10px;
    }

    .shop-category .card.view-all img {
        width: 20px;
    }
}

@media(max-width:900px) {
    .informations.desktop {
        display: none;
    }

    .first-banner {
        padding: 160px 0px 0px;
    }

    .carousel-inner,
    .last-banner .last-banner-img,
    .second-banners img {
        height: 200px;
    }

    .carousel-inner .carousel-item img {
        height: 200px;
        width: auto;
        object-fit: cover;
        object-position: top 50% right 0%;
    }

    .carousel-control-prev {
        left: -20px !important;
    }

    .carousel-control-next {
        right: -10px !important;
    }

    .shop-category {
        margin-top: 20px;
        padding: 10px;
    }

    .shop-category.pc {
        display: none;
    }

    .shop-category.mobile {
        display: block;
    }

    .shop-category .card {
        width: 100%;
        height: 100px;
        margin-bottom: 20px;
    }

    .shop-category .card .category-title {
        font-size: 1.2rem;
    }

    .shop-category .card img {
        width: 40px;
        height: auto;
    }

    .shop-category .card.view-all {
        padding-left: 10px;
        padding-right: 10px;
    }

    .shop-category .card.view-all img {
        margin-bottom: 10px;
    }

    .second-banners {
        padding: 0px;
    }

    .second-banners .first-row-banners {
        margin-bottom: 20px;
        width: 96%;
        height: 160px;
    }

    .second-banners .first-row-banners img {
        height: 160px;
        object-fit: cover;
        object-position: center;
    }

    .second-banners img {
        width: 100%;
    }

    .second-banners .second-banner {
        margin-top: 20px;
    }

    .last-banner {
        padding: 20px 0px;
    }

    .shop-category.mobile {
        background: #fff;
    }

    .shop-category h3,
    .flash-sales h3,
    .featured-products h3 {
        font-size: 1rem;
        font-family: 'Rubik', sans-serif;
        font-weight: 800;
    }

    .shop-category.mobile .view-all {
        font-size: 0.7rem;
        font-family: 'Rubik', sans-serif;
        font-weight: 600;
        color: #020202;
        text-decoration: underline !important;
        align-self: center;
        display: flex;
        justify-content: end;
    }

    .informations.mobile {
        padding: 0px 10px;
        display: flex;
        flex-direction: row;
        justify-content: start;
        overflow-x: auto !important;
        overflow-y: hidden;
        margin-top: 20px;
        height: 50px;
        flex-wrap: nowrap;
        background: transparent;
    }

    .informations.mobile::-webkit-scrollbar {
        display: none;
    }

    .informations.mobile .col-3:first-child::after,
    .informations.mobile .col-3:nth-child(2)::after,
    .informations.mobile .col-3:nth-child(3)::after {
        display: none;
    }

    .informations.mobile .info-col {
        width: 140px;
        height: 50px;
        background: #f5f5f5;
        text-align: center;
        padding: 5px 5px 0px;
        align-items: center;
        margin-right: 10px;
    }

    .informations.mobile .info-col .img img,
    .informations.mobile .info-col .img {
        width: 15px !important;
        margin-left: auto;
        margin-right: auto;
    }

    .informations.mobile .info-col h3 {
        margin-left: auto;
        margin-right: auto;
        font-size: 0.6rem;
        display: flex;
        justify-content: center;
    }

    .flash-sales .flash-row {
        padding: 0px;
    }

    .flash-sales .flash-row h3 {
        font-family: 'Rubik', sans-serif;
        text-align: left;
        margin-bottom: 0;
        margin-top: 4px;
    }

    .flash-sales .flash-row a {
        text-transform: uppercase;
        font-size: 0.8rem;
        padding-bottom: 0px;
    }

    .flash-sales .flash-row a span span {
        background: #000;
        border: 1px solid transparent;
        border-radius: 4px;
        padding: 1px 2px;
        margin: 0px 5px;
        color: #fff;
        font-family: 'Rubik', sans-serif;
        font-size: 1rem;
        font-weight: 800;
    }

    .first-banner .carousel-inner,
    .first-banner .carousel-inner img {
        width: 100%;
        height: 140px;
        object-fit: cover;
    }

    .first-banner .carousel-control-next {
        right: 0px !important;
        width: 15px;
    }

    .flash-sales .slider,
    .featured-products .slider {
        margin-top: 10px;
    }

    .featured-products,
    .flash-sales {
        padding: 20px 0px;
    }

    .carousel-indicators button,
    .submenu.active .carousel-indicators button {
        width: 30px !important;
        height: 2px !important;
    }

    .carousel-indicators button.active,
    .submenu.active .carousel-indicators button.active {
        width: 45px !important;
        background-color: #D31621;
    }

    .informations .info-col h3.info-title {
        color: #D31621;
        font-family: 'Rubik', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .informations .info-col h3 {
        font-family: 'Rubik', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .info-content {
        align-self: center;
    }

    .carousel-control-prev img,
    .carousel-control-next img {
        width: 8px;
    }
}
</style>

