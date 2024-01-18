<template>
    <section class="flash-sale-products">
        <div class="flash-countdown">
            <div class="container-fluid">
                <div class="row">
                    <div class="col p-0" v-for="flashSaleDate in flashSaleDates" :key="flashSaleDate.id" :class="{ nowflash: flashSaleDate.date_now > flashSaleDate.start_date }" @click="activeCategory = ''">
                        <router-link class="flash-ancher" :to="{ name:'front.flash-Sale', params: {slug: flashSaleDate.slug} }">
                            <div v-bind:class="(flashSaleDate.date_now > flashSaleDate.start_date)?'current-flashsale text-center':'next-flashsale text-center'">
                                <p><span class="time-countdown">{{ flashSaleDate.start_date.split(' ')[1].split(':')[0] }}:{{ flashSaleDate.start_date.split(' ')[1].split(':')[1] }}</span><span class="date-countdown">{{ flashSaleDate.start_date.split(' ')[0].split('-')[1] }}/{{ flashSaleDate.start_date.split(' ')[0].split('-')[2] }}</span></p>
                                <p v-if="flashSaleDate.date_now > flashSaleDate.start_date"><span class="finish">MBARON PËR</span> &nbsp;
                                    <vue-countdown :time="new Date(flashSaleDate.end_date) - new Date(flashSaleDate.date_now)"  v-slot="{ days, hours, minutes, seconds }">
                                    <span class="countdown" v-if="days > 0">{{ days }}</span> : <span class="countdown">{{ hours }}</span> : <span class="countdown">{{ minutes }}</span> : <span class="countdown">{{ seconds }}</span>
                                    </vue-countdown>
                                </p>
                                <p v-else>SË SHPEJTI</p>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    <div v-for="flashSale in flashSales" :key="flashSale.id" :load="productsFlash = flashSale.products_id">
        <div class="flash-categories">
            <button class="category-button" @click="activeCategory = ''" :class="{ 'active': activeCategory === '' }">Të Gjitha</button>
            <button class="category-button" v-for="category in flashSale.categories" :key="category.id" @click="activeCategory = category.id" :class="{ 'active': activeCategory === category.id }">{{ category.name }}</button>
        </div>
        <div class="container-fluid">
            <div class="row" v-if="flashSale.products_id">
                <router-link class="product-card flash-sale-product" v-for="(productDetail, index) in productFilter" :key="index" :to="{ name:'product.details', params: {slug: productDetail.product.id} }">
                    <div class="img">
                        <div class="label-sale">
                            <img :src="flash" alt="flash-sale">
                            <p v-if="productDetail.discount_type === 'percentage'">-{{ productDetail.discount }}%</p>
                            <p v-else>-{{ dicount(productDetail) }}%</p>
                        </div>
                        <img :src="`../images/admin_products/small/${productDetail.product.thumbnail}`" />
                    </div>
                    <div class="content">
                        <div class="content-price">
                            <h3 v-if="productDetail.discount_type === 'percentage'">{{ newPrice(productDetail) }} Lekë</h3>
                            <h3 v-else>{{ productDetail.product.price - productDetail.discount }} Lekë</h3>
                            <div class="align-self-md-center"><p>{{ productDetail.product.price }} Lekë</p></div>
                        </div>
                        <div class="progress-bar">
                            <div class="shell">
                                <div class="bar" :style="{ width: sold + '%' }">
                                </div>
                            </div>
                            <p>{{ sold }}% Shitur</p>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
    </section>
</template>
<script>
import flash from "../assets/rrufe.png"
import BottomIcons from "./dashboard-components/BottomIcons.vue";
import VueCountdown from '@chenfengyuan/vue-countdown';
export default {
    components: {
        BottomIcons,
        VueCountdown
    },
    el: "#app",
    data() {
        return {
            sold: '65',
            key: '',
            flashSales: [],
            productsFlash: [],
            breadcrumbs: null,
            flash: flash,
            flashSaleDates: [],
            loading: false,
            selectedCategories: [],
            activeCategory: '',
        }
    },
    watch: {
        $route(to, from) {
            this.flashSaleProducts();
        }
    },
    mounted() {
        this.flashSaleProducts();
        this.flashSalesDates();
    },
    methods: {
        dicount(productDetail) {
            return (productDetail.discount*100/productDetail.product.price).toFixed(0); //in the sale will the price after discount
        },
        newPrice(productDetail) {
            return (productDetail.product.price - productDetail.product.price * productDetails.discount / 100).toFixed(0); 
        },
        flashSaleProducts() {
            this.loading = true;
            this.axios.get('/api/v1/flash-sale/'+this.$route.params.slug).then((response) => {
                this.loading = false;
                this.flashSales = response.data.data;
                document.title = this.flashSales[0].title;
            }).catch((error) => {
                this.loading = false;
            })
        },
        flashSalesDates() {
            this.loading = true;
            this.axios.get('/api/v1/flash-sales/').then((response) => {
                this.loading = false;
                this.flashSaleDates = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
    },
    computed: {
        productFilter() {
            return this.productsFlash.filter((item) => {
                return (
                    (this.activeCategory === '' || this.activeCategory === item.product.category_id)
                );
            });
        },
    }
}
</script>
<style scoped>
.nowflash:first-of-type {
    display: block;
}
.nowflash {
    display: none;
}
.category-button.active {
border: 1px solid #020202 !important;
position: relative;
}
.category-button.active::before {
    content: '';
    font-size:0.6rem;
    color: #fff;
    width: 0;
    height: 0;
    border: 20px solid transparent;
    border-right: 0;
    border-top: 20px solid #000;
    position: absolute;
    top:0;
    right:0;
}
.category-button.active::after {
    content: '\00D7';
    position: absolute;
    color: #fff;
    top:-3px;
    font-weight: 200;
    font-size:0.8rem;
    right:2px;
}
.flash-sale-products {
    padding: 210px 80px 80px;
}
.flash-sale-products p {
    margin-bottom: 0;
    font-family: 'Rubik', sans-serif;
    font-weight: 200;
    color: #000;
}
.flash-countdown .current-flashsale {
    background-color: #facf19;
    padding-top: 10px;
    padding-bottom: 10px;
    cursor: pointer;
}
.flash-countdown .next-flashsale {
    background-color: rgba(250, 207, 25, .6);
    padding-top: 10px;
    padding-bottom: 10px;
    cursor: pointer;
}
.flash-countdown .next-flashsale:hover {
    background-color: #facf19;
}
.flash-countdown .time-countdown {
    font-size:1.8rem;
    font-weight: 500;
}
.flash-countdown .date-countdown {
    margin-left: 10px;
    font-size: 1.2rem;
    font-weight: 300;
}
.flash-countdown .countdown {
    background: #000;
    color: #fff;
    padding:3px;
    font-size:1rem;
    font-weight: 400;
}
.flash-countdown .next-flashsale:last-child {
    padding-bottom: 13px;
}
.flash-categories {
    background-color: #f5f5f5;
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
    padding: 20px;
    justify-content: center;
    margin-bottom: 20px;
}
.flash-categories .category-button {
    border: 1px solid transparent;
    border-radius: none;
    padding: 5px 10px; 
    font-size:1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: thin !important;
    outline: none;
    box-shadow: none;
    cursor: pointer;
    background: #fff;
}
.flash-categories .category-button:hover {
    border: 1px solid #020202;
}
.flash-categories .category-button:not(:last-child) {
    margin-right: 20px;
}
option:disabled{
    color: #000 !important;
    background: #fff;
    opacity: 1;
}
.product-card.flash-sale-product .progress-bar {
    display: flex;
    flex-direction: column !important;
    justify-content: start !important;
}

.product-card.flash-sale-product .shell {
    height: 10px;
    width: 250px;
    border: 0px;
    background: #E7E7E7;
    border-radius: 0px;
    margin-right: 10px;
}

.product-card.flash-sale-product .bar {
    background: #FFD600;
    height: 10px;
    width: 15px;
    border-radius: 0;
}
.label-sale {
    width: 45px;
    height: 50px;
    background: #FFD600;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 50;
    text-align: center !important;
    align-self: middle;
}

.product-card.flash-sale-product .label-sale img {
    width: 9px !important;
    height: auto !important;
}

.label-sale p {
    font-size: 1rem;
    letter-spacing: -1px;
    font-weight: 600;
    margin-bottom: 0;
    margin-top: -5px;
    text-align: center !important;
    font-family: 'Muli', sans-serif;
}

.product-card.flash-sale-product .progress-bar p {
    font-size: 0.7em;
    color: #020202;
    font-weight: 400;
    line-height: 0.5rem;
    width: 100px;
    text-align: left;
    text-decoration: none;
    margin-left: 0;
    margin-top: 5px;
}
.product-card.flash-sale-product img {
    width: 300px;
    height: 360px;
    object-fit: cover;
}
.product-card.flash-sale-product .img {
    position: relative;
    width: 300px;
}
.product-card.flash-sale-product {
    display: flex;
    flex-direction: column;
    justify-content: left;
}
.content {
    margin-top: 10px;
    width: 300px;
}

.content h3 {
    color: #D31621;
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
    margin-left: 5px;
}
@media(min-width:901px) {
    .content-price {
        display: flex;
        justify-content: start;
    }
}
@media(max-width: 900px) {
    .content {
        margin-top: 10px;
        width: 100%;
    }
    .finish {
        display: none;
    }
    .flash-sale-products {
        padding: 160px 0px 30px;
    }
    .flash-countdown .time-countdown {
        font-size: 1.2rem;
    }

    .flash-countdown .date-countdown {
        margin-left: 5px;
        font-size: 0.9rem;
    }
    .flash-countdown p {
        font-size:0.6rem;
    }
    .flash-countdown .countdown {
        padding: 1px;
        font-size: 0.6rem;
    }
    .flash-countdown .current-flashsale { 
        padding: 10px 2px;
    }
    .flash-countdown .next-flashsale:last-child {
        padding-bottom: 10px;
    }
    .flash-categories {
        margin-top: 10px;
        padding: 5px;
        margin-bottom: 10px;
        justify-content: start;
        flex-wrap: nowrap;
        overflow-x:auto;
}
    .product-card.flash-sale-product img {
        width: 100%;
        height: 180px !important;
        object-fit: cover;
    }
    .product-card.flash-sale-product .img {
        width: 100%;
    }
    .product-card.flash-sale-product .progress-bar, .product-card.flash-sale-product .shell {
        width: 170px;
    }
    .flash-categories select {
        font-size: 0.9rem;
    }
}
</style>