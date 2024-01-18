<template>
    <section class="checkout-area">
        <div class="logo-bar">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-start"><a href="/" class="logo"><img :src="logo"></a></div>
                    <div class="col-6 third text-end">
                        <div class="d-flex justify-content-end icons">
                            <a href="/">Continue Shopping <span class="span-arrow"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="checkout-view">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="bread-crumb j-bread-crumb">
                            <div class="bread-crumb__inner">
                                <div class="bread-crumb__item">
                                    <a class="bread-crumb__item-link">Shporta</a>
                                </div>
                                <div class="bread-crumb__item">
                                    <a class="bread-crumb__item-link ps-2 active">/ Vendosja e Porosisë </a>
                                </div>
                                <div class="bread-crumb__item">
                                    <a class="bread-crumb__item-link ps-2">/ Konfirmimi </a>
                                </div>
                                <div class="bread-crumb__item">
                                    <a class="bread-crumb__item-link ps-2">/ Përfundimi i porosisë </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row checkout-page">
                    <div class="col-md-8">
                        <div class="checkout-page-col1">
                            <h1 style="text-align: left">Adresa e dërgimit</h1>
                            <hr />

                            <!-- logged in user case  -->
                            <div v-if="$store.getters.getToken !== 0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div v-for="(userAdd, index) in user_data.addresses" :key="index"
                                            class="col col-md-6">
                                            <div class="adresa" @click="customerShippingAddress(userAdd)"
                                                :attribute="userAdd.address">
                                                <p class="name">{{ user_data.name }}</p>
                                                <p class="address-details">{{ userAdd.other_phone }}</p>
                                                <p class="address-details">{{ userAdd.address }}</p>
                                                <p class="address-details">{{ userAdd.city }}, {{ userAdd.country }}</p>
                                                <p class="address-details">Delivery cost: {{ userAdd.cost }} Lekë</p>
                                                <a @click="customerShippingAddress(userAdd)">Përdor këtë adresë</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col text-center">
                                            <button type="button" class="btn shto-adrese user-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Shto Adresë</button>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Shto Adresë</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="#">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-lg-6 text-left">
                                                                <input type="number" name="tel"
                                                                    placeholder="*Numër Telefoni"><br>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 text-left">
                                                                <input type="text" name="city"
                                                                    placeholder="*Qyteti"><br>
                                                            </div>
                                                            <div class="col-lg-6 text-left">
                                                                <input type="text" name="state"
                                                                    placeholder="*Shteti"><br>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 text-left">
                                                                <input type="text" name="address"
                                                                    placeholder="*Adresa"><br>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="submit">Ruaj adresë</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else>
                                <!-- guest user case  -->
                                <div class="checkout">

                                    <div v-if="errors.length" style="color: red;">
                                        <strong>Please correct the following error(s):</strong>
                                        <ul>
                                            <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                                        </ul>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate>
                                        <div class="col-md-6 ps-0 pe-0 pe-md-2">
                                            <label for="name" class="d-flex">* Emër</label>
                                            <input type="text" name="name" v-model="name" class="form-control"  required/>
                                        </div>
                                        <div class="col-md-6 pe-0 ps-0 ps-md-2">
                                            <label for="surname" class="d-flex">* Mbiemër</label>
                                            <input type="text" name="surname" v-model="surname" class="form-control"  required/>
                                        </div>
                                        <div class="col-md-12 px-0">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon3">+355</span>
                                                <input type="number" name="mobile" v-model="mobile" class="form-control"
                                                    id="basic-url" aria-describedby="basic-addon3"
                                                    placeholder="*Numri i Telefonit" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-0 pe-0 pe-md-2">
                                            <select name="country" v-model="country_id" class="form-control"
                                                @change="getCities" required>
                                                <option value="null" disabled>* Shteti</option>
                                                <option v-for="(country, index) in countries" :key="index"
                                                    :value="country.id">{{ country.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 pe-0 ps-0 ps-md-2">
                                            <select name="city" v-model="city" class="form-control"
                                                @change="shippingFee" required>
                                                <option disabled value="null">* Qyteti</option>
                                                <option v-for="(city, index) in cities" :key="index" :value="city.id"
                                                    :cost="city.cost">{{ city.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 px-0">
                                            <label for="address" class="d-flex">* Adresa 1</label>
                                            <input type="text" name="address" v-model="address" class="form-control"
                                                 required />
                                        </div>
                                        <div class="col-md-12 px-0">
                                            <label for="address_two" class="d-flex">Adresa 2 (optional)</label>
                                            <input type="text" name="address_two" v-model="address_two"
                                                class="form-control"  />
                                        </div>
                                        <!-- <div class="col-12">
                                            <button class="btn btn-save" type="submit">SAVE</button>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                            <div class="shopping-bag">
                                <div class="shopping-bag-title">
                                    <h1 class="title">Shporta e Produkteve</h1>
                                    <a class="shopping-bag-link" type="button" data-bs-toggle="modal"
                                        data-bs-target="#productsModal">Shiko më shumë ›</a>
                                </div>

                                <div class="modal fade" id="productsModal" tabindex="-1"
                                    aria-labelledby="productsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header p-0 border-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col text-center text-md-start">
                                                            <h1 class="title">Shporta e Produkteve</h1>
                                                        </div>
                                                    </div>
                                                    <div class="row products-row">
                                                        <div class="col-6 col-md-3"
                                                            v-for="(item, index) in cartStore.items" :key="index">
                                                            <div class="bag-product">
                                                                <div class="main-details">
                                                                    <img :src="item.image" alt="" class="img-fluid" />
                                                                    <div class="bag-product-quantity">
                                                                        <p class="m-0">x{{ item.quantity }}</p>
                                                                    </div>
                                                                </div>
                                                                <h5 class="bag-product-name mb-0 mt-1">{{ item.name }}
                                                                </h5>
                                                                <p class="bag-product-price">{{ item.quantity *
                                                                        item.price
                                                                }} Lekë</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />

                                <div class="bag-products">
                                    <swiper class="bag-productsss swiper" :modules="modules" :space-between="10"
                                        :breakpoints="swiperSlideOptions.breakpoints">
                                        <swiper-slide class="bag-product" v-for="(item, index) in cartStore.items"
                                            :key="index">
                                            <div class="main-details">
                                                <img :src="item.image" alt="" class="img-fluid" />
                                                <div class="bag-product-quantity">
                                                    <p class="m-0">x{{ item.quantity }}</p>
                                                </div>
                                            </div>
                                            <h5 class="bag-product-name mb-0 mt-1">{{ item.name }}</h5>
                                            <p class="bag-product-price">{{ item.quantity * item.price }} Lekë</p>
                                        </swiper-slide>
                                    </swiper>
                                </div>

                                <hr />
                                <div class="shopping-bag-totalprice">
                                    <h4>Totali:<span> {{ cartStore.totalPurchaseAmount }} Lekë</span></h4>
                                </div>
                            </div>
                            <p class="payment_method_title">MËNYRAT E PAGESËS</p>
                            <div v-for="paymentMethod in paymentMethods" :key="paymentMethod.id" class="payment_method"
                                :style="{ 'color': hasPaymentError }">
                                <input v-model="payment_method" type="radio" :value="paymentMethod.id"
                                    name="payment_method">
                                <label><img :src="`images/payment-methods/icon/${paymentMethod.icon}`" alt="">{{
                                        paymentMethod.name
                                }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkout-page-col2">
                            <div>
                                <h1 style="text-align: left">Përmbledhja e Porosisë</h1>
                                <hr />
                                <p class="d-flex justify-content-between subtotal">Nëntotali:<span>{{
                                        cartStore.totalPurchaseAmount
                                }} Lekë</span></p>
                                <p class="d-flex justify-content-between subtotal">Vlera e Trasportit:<span>{{
                                        shipping_fee
                                }} Lekë</span></p>
                                <hr />

                                <div v-if="this.cartStore.hasCoupon">
                                    <p class="d-flex justify-content-between subtotal">Subtotal:<span>{{ cartSubTotal }}
                                            Lekë</span></p>
                                    <p class="d-flex justify-content-between subtotal">Kuponit:<span>-{{
                                            cartStore.couponAmount
                                    }} Lekë</span></p>
                                    <hr />
                                </div>

                                <p class="d-flex justify-content-between subtotal">Total:<span>{{ cartTotal }}
                                        Lekë</span></p>
                                <div class="form-group mb-2" style="text-align: left">
                                    <p class="coupon-code">Kodi i Kuponit <label class="hint"
                                            data-title="SHËNIM: Vlera e kuponit do t'i ulet vlerës totale të faturës sapo ju të klikoni 'Apliko'">?</label>
                                    </p>
                                    <div class="d-flex mb-2" style="margin-top: 15px">
                                        <input name="coupon_code" v-model="coupon_code" type="text" class="form-control"
                                            :style="{ 'margin-right': '30px', 'border-color': hasCouponError }" />
                                        <button @click="hasCouponCode()" class="btn-apply">Apliko</button>
                                    </div>
                                </div>
                                <button type="submit" class="place-order mt-2" @click="orderSubmit();">Përfundo
                                    Porosinë</button>
                                <!--                                <button type="submit" class="place-order mt-2" disabled @click="orderSubmit()">Përfundo Porosinë</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <BottomIcons />
</template>
<script>
import $ from "jquery";
import imageabout1 from "../assets/about/about4.jpg";
import logo from "../assets/logo-klaudio.png"
import { Swiper, SwiperSlide /* rest swiper/vue API... */ } from "swiper/vue";
import "swiper/css";
import { useCartStore } from "../stores/Cart";
import { useToast } from "vue-toastification";
import BottomIcons from "./dashboard-components/BottomIcons.vue";

export default {
    components: {
        Swiper,
        SwiperSlide,
        BottomIcons,

    },
    data() {
        return {
            logo: logo,
            imageabout1: imageabout1,
            palceholderEmër: 'Emër',
            palceholderMbiemër: 'Mbiemër',
            paymentMethods: [],
            user_data: [],
            countries: [],
            cities: [],
            shipping_fee: 0,
            loading: false,
            palceholderEmër:'*Emër',
            palceholderMbiemër:'*Mbiemër',
            swiperSlideOptions: {
                breakpoints: {
                    320: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    1400: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            },
            errors: [],
            name: null,
            surname: null,
            mobile: null,
            country_id: null,
            city: null,
            address: null,
            address_two: null,
            coupon_code: null,
            hasCouponError: null,
            coupon_product_ids: [],
            coupon_type: null,
            coupon_discount: null,
            coupon_discount_type: null,
            coupon_minimum_shopping: null,
            coupon_maximum_discount: null,
            hasPaymentError: null,
            payment_method: null,
            orderId: ''
        };
    },
    created() {
        document.title = 'Checkout';
    },
    mounted() {
        this.getPaymentMethods();
        this.getCountries();
        this.userData();
    },
    methods: {
        getPaymentMethods() {
            this.loading = true;
            this.axios.get('/api/v1/payment-methods').then((response) => {
                this.loading = false;
                this.paymentMethods = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        // total() {
        //     return this.cartStore.items.reduce((acc, product) => {
        //         return acc + (product.quantity * product.price)
        //     }, 0)
        // },
        shippingFee: function hide(e) {
            var options = e.target.options
            if (options.selectedIndex > -1) {
                var name = options[options.selectedIndex].getAttribute('cost');
                this.shipping_fee = name;
            }
        },
        getCountries() {
            this.loading = true;
            this.axios.get('/api/v1/countries').then((response) => {
                this.loading = false;
                this.countries = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getCities() {
            this.loading = false;
            this.axios.get('/api/v1/cities/' + this.country_id).then((response) => {
                this.loading = false;
                this.cities = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        customerShippingAddress(address) {
            this.name = this.user_data.name;
            this.mobile = address.other_phone;
            this.country_id = address.country_id;
            this.city = address.city_id;
            this.address = address.address;
            this.shipping_fee = address.cost;
            // if($('.adresa').attr('attribute') == address.address) {
            //     $(this).css('border-color', '#020202');
            // }
        },
        hasCouponCode() {
            if (!this.coupon_code) {
                this.hasCouponError = 'red';
                this.toast.error("Give the coupon code.");
                return false;
            }

            this.axios.post('/api/v1/check-coupon-code', {
                coupon_code: this.coupon_code,
            }).then((res) => {
                if (res.data.success === false) {
                    this.toast.error(res.data.message);
                } else if (res.data.success === true) {
                    this.setCouponInformation(res.data.data);
                    this.toast.success(res.data.message);
                }
            }).catch((error) => {
                console.log(error);
            });
        },
        setCouponInformation(data) {
            this.cartStore.$patch({
                hasCoupon: true,
                coupon_product_ids: data.coupon_product_ids,
                coupon_code: data.coupon_code,
                coupon_type: data.coupon_type,
                coupon_discount: data.coupon_discount,
                coupon_discount_type: data.coupon_discount_type,
                coupon_minimum_shopping: data.coupon_minimum_shopping,
                coupon_maximum_discount: data.coupon_maximum_discount,
            });
        },
        checkShippingAddress() {
            this.errors = [];
            if (this.name && this.mobile && this.country_id && this.city && this.address) return true;
            if (!this.name) this.errors.push('Emër kërkohet');
            if (this.mobile == null) this.toast.error('Ju lutem vendosni një numër telefoni në llogarinë tuaj.');
            if (!this.country_id) this.errors.push('Shteti kërkohet');
            if (!this.city) this.errors.push('Qyteti kërkohet');
            if (!this.address) this.errors.push('Adresa 1 kërkohet');
            // this.toast.error('Select shipping address');
            return false;
        },
        checkPaymentMethod() {
            let shouldSkip = true;
            if (!this.payment_method) {
                this.hasPaymentError = 'red';
                this.toast.error("Please select payment method.");
                shouldSkip = false;
            }
            return shouldSkip;
        },
        sendEmail() {
            if (this.checkShippingAddress() && this.checkPaymentMethod()) {
                this.loading = true;
                this.axios.post('/api/v1/send-email', {
                    name: this.name,
                    surname: this.surname,
                    mobile: this.mobile,
                    country_id: this.country_id,
                    city: this.city,
                    address: this.address,
                    address_two: this.address_two,
                    coupon_code: this.cartStore.coupon_code,
                    coupon_amount: this.cartStore.couponAmount,
                    shipping_fee: this.shipping_fee,
                    payment_method: this.payment_method,
                    grant_total: this.cartTotal,
                    token: localStorage.token ? localStorage.token : '',
                    items: this.cartStore.items,
                }).then((res) => {
                }).catch((error) => {
                    console.log(error);
                });
            }
        },
        orderSubmit() {
            if (this.cartStore.isEmpty) {
                this.toast.error("Your cart is empty!");
                return false;
            }
            if (this.checkShippingAddress() && this.checkPaymentMethod()) {
                this.loading = true;
                this.axios.post('/api/v1/order-submit', {
                    name: this.name,
                    surname: this.surname,
                    mobile: this.mobile,
                    country_id: this.country_id,
                    city: this.city,
                    address: this.address,
                    address_two: this.address_two,
                    coupon_code: this.cartStore.coupon_code,
                    coupon_amount: this.cartStore.couponAmount,
                    shipping_fee: this.shipping_fee,
                    payment_method: this.payment_method,
                    grant_total: this.cartTotal,
                    token: localStorage.token ? localStorage.token : '',
                    items: this.cartStore.items,
                }).then((res) => {
                    if (res.status === 200) {
                        this.cleanCheckOutData();
                        window.location.href = '/thank-you';
                    }
                }).catch((error) => {
                    console.log(error);
                });
            }
        },
        cleanCheckOutData() {
            this.cartStore.$reset();
            this.cartStore.$patch({
                hasCoupon: false,
                coupon_product_ids: [],
                coupon_code: null,
                coupon_type: null,
                coupon_discount: null,
                coupon_discount_type: null,
                coupon_minimum_shopping: null,
                coupon_maximum_discount: null,
            });
            this.name = null;
            this.surname = null;
            this.mobile = null;
            this.country_id = null;
            this.city = null;
            this.address = null;
            this.address_two = null;
            this.shipping_fee = 0;
        },
        userData() {
            this.loading = true;
            this.axios.get('/api/v1/user-addresses/' + localStorage.token).then((response) => {
                this.loading = false;
                this.user_data = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
    },
    computed: {
        cartSubTotal() {
            return parseInt(this.cartStore.totalPurchaseAmount) + parseInt(this.shipping_fee);
        },
        cartTotal() {
            return parseInt(this.cartSubTotal) - parseInt(this.cartStore.couponAmount);
        }
    },
    setup() {
        const cartStore = useCartStore();
        const toast = useToast();
        return { cartStore, toast }
    },
};
</script>
<style scoped>
.checkout form .form-control::-webkit-input-placeholder {
  color: #212529!important;
  opacity: 1!important;
}
.checkout-area .modal-dialog input {
    width: 100% !important;
    border: 1px solid #E5E5E5;
    height: 39px;
    outline: none;
    color: #020202;
    margin: 0 0 15px;
    padding: 0px 10px;
}

.checkout-area .submit {
    background-color: #222222;
    color: #fff;
    height: 44px;
    margin: 21px 0 13px;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    text-transform: uppercase;
    width: 20%;
    border: 0;
    box-shadow: none;
}

.icons a .span-arrow {
    top: 0px !important;
}

.checkout-area .modal-dialog .submit {
    width: 35% !important;
}

.checkout-area .modal-dialog {
    max-width: 500px;
}

.checkout-area .user-btn {
    border: 0;
    border-radius: 0;
    text-transform: uppercase;
    background-color: #222222;
    color: #fff;
    height: 44px;
    margin-top: 10px;
    margin-bottom: 0px;
    padding: 0 21px;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
}

.checkout-area .user-btn:hover {
    border: 0;
    background-color: #666;
    cursor: pointer;
}

.checkout-area .user-btn:focus {
    outline: 0;
}

.adresa {
    position: relative;
    border: 1px solid #e5e5e5;
    padding: 20px;
    margin-top: 10px;
    transition: all 0.4s;
    cursor: pointer;
}

.adresa .name {
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    margin-bottom: 0;
    color: #959595;
}

.adresa .address-details {
    margin-bottom: 0;
    font-size: 0.8rem;
    color: #959595;
}

.adresa:hover {
    border: 1px solid #020202;
    transition: all 0.4s;
}

.adresa a {
    font-size: 0.8rem;
    display: flex;
    justify-content: end;
}

hr {
    margin-bottom: 0.5rem;
}

.payment_method_title {
    margin-top: 20px;
    font-size: 1.2rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px solid #d5d5d5;
}

.payment_method {
    font-size: 1rem;
    font-weight: 300;
    font-family: 'Rubik', sans-serif;
    margin-bottom: 10px;
}

.payment_method img {
    width: auto;
    max-height: 25px;
    margin-right: 10px;
}

.bag-productsss.swiper {
    width: 100%;
}

#productsModal .modal-dialog {
    max-width: 1000px;
}

#productsModal .modal-dialog .modal-content {
    border-radius: 0;
    padding: 40px;
}

#productsModal .shopping-bag .title {
    margin-top: 0px;
    margin-bottom: 10px;
}

#productsModal .products-row {
    border: 1px solid #e5e5e5;
    margin-top: 10px;
    padding: 40px;
}

.checkout-area .logo-bar {
    height: inherit;
    background: transparent;
    border-bottom: 1px solid #e5e5e5;
}

.checkout-area .logo-bar a {
    text-transform: uppercase;
    font-size: 0.8rem;
}

.checkout-area .logo-bar a span {
    border-top: 4px solid transparent;
    border-left: 4px solid #999;
    border-bottom: 4px solid transparent;
    margin-top: 5px;
}

.checkout-area .logo-bar img {
    width: 150px;
}

.checkout-page-col2 .coupon-code {
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
}

.checkout-page-col2 input {
    background: transparent;
    height: 30px;
}

.subtotal span {
    font-size: 1.2rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
}

.hint {
    font-weight: 300;
    border: 1px solid #767676;
    border-radius: 50%;
    width: 1rem;
    height: 1rem;
    padding-left: 4px;
    font-size: 0.6rem;
}

[data-title] {
    position: relative;
}

[data-title]:after {
    content: attr(data-title);
    position: absolute;
    top: 0;
    color: #020202;
    background: #fff;
    width: 200px;
    font-size: 0.7rem;
    padding: 8px;
    word-break: normal;
    opacity: 0;
    visibility: hidden;
    box-shadow: 0px 2px 16px 4px rgba(0, 0, 0, 0.16);
}

[data-title]:hover::after {
    opacity: 1;
    visibility: visible;
    transition: all 0.1s ease 0.5s;
}

.bag-product img {
    width: 100%;
    height: 160px !important;
    object-fit: cover;
    object-position: 50% 50%;
}

.bag-product .main-details {
    height: 160px;
    position: relative;
}

#productsModal .bag-product img,
#productsModal .bag-product .main-details {
    height: 180px !important;
}

.bag-productss {
    display: flex;
    flex-direction: column;
    justify-content: left;
}

.checkout-view {
    padding: 20px 0px 40px;
}

.checkout input {
    border-radius: 0;
}

.checkout .form-control {
    background: transparent;
    padding: 0.65rem 0.75rem;
    border: 1px solid rgba(0, 0, 0, 0.2);
}

.checkout .btn-save {
    min-width: 185px;
    height: 40px;
    line-height: 42px;
    padding: 0 24px;
    font-size: 14px;
    border-radius: 0;
    color: white;
    background-color: black;
    /* opacity: 0.3; */
}

.checkout .btn-save:hover {
    border-color: #666;
    background-color: #666;
}

.checkout-page h1 {
    font-size: 22px;
    font-weight: 500;
    color: #222;
    line-height: 25px;
}

.checkout-page .place-order {
    width: 100%;
    border-radius: 0;
    background: #020202;
    border: 0;
    text-transform: uppercase;
    padding: 0.65rem 0.75rem;
    color: rgba(255, 255, 255, 0.6);
    font-size: 1rem;
    font-weight: 500;
    font-family: 'Rubik', sans-serif;
}

.checkout-page .place-order[disabled] {
    background-color: #999;
}

.checkout-page input {
    border-radius: 0;
}

.checkout-page .btn-apply {
    border-radius: 0;
    background-color: transparent;
    color: black;
    border: 1px solid #020202;
    height: 30px;
    width: 100px;
}

.breadcrumb-item+.breadcrumb-item::before {
    float: left;
    padding-right: var(--bs-breadcrumb-item-padding-x);
    color: var(--bs-breadcrumb-divider-color);
    content: var(--bs-breadcrumb-divider, ">");
}

.order-process-status {
    padding: 100px 0 100px 0;
}

.order-status .active {
    color: red;
}

.order-status>span:first-child:before {
    content: "";
    padding: 0;
}

.order-status>span:before {
    content: ">";
    padding: 0 10px;
}

.checkout-page .checkout-page-col1 {
    padding: 0px 20px;
}

.checkout-page-col1 h1 {
    font-family: 'Rubik', sans-serif;
}

.input-group-text {
    padding: 0 20px !important;
    border-radius: 0;
    opacity: 0.6;
}

.checkout-page .item-summary-col {
    width: 97%;
    padding: 24px 24px 0 24px;
    background-color: white;
}

.card-row .card-item-cell {
    font-weight: 500;
    font-size: 14px;
    color: #222;
    text-align: center;
}

.checkout-page .checkout-page-col2 {
    border-left: 1px solid #cabebe;
    padding: 0px 20px;
}

.checkout-page .checkout-page-col2 .order-summary {
    padding: 24px;
    background-color: white;
}

.checkout-page .checkout-page-col2 .order-summary .main-title {
    font-size: 20px;
    text-transform: capitalize;
    display: inline-block;
    font-weight: 500;
    color: #222;
    margin-bottom: 16px;
}

.checkout-page .checkout-page-col2 .order-summary p {
    font-family: Arial, Helvetica, sans-serif !important;
    font-size: 12px;
    color: #222;
}

.items-selected {
    width: 97%;
    padding: 24px 24px 0 24px;
    background-color: white;
}

form {
    margin: 0 auto;
    text-align: center;
    display: flex;
}

.value-button {
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ddd;
    margin: 0px;
    width: 40px;
    height: 40px;
    text-align: center;
    vertical-align: middle;
    padding: 11px 0;
    background: #eee;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.value-button:hover {
    cursor: pointer;
}

form #decrease {
    border-radius: 24px 0 0 24px;
}

form #increase {
    border-radius: 0 24px 24px 0;
}

form #input-wrap {
    margin: 0px;
    padding: 0px;
}

input#number {
    text-align: center;
    border: none;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    margin: 0px;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    text-align: center;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    margin: 0;
}

.cart-item__insufficientStock {
    position: absolute;
    bottom: 0;
    line-height: 1;
    color: #fff;
    width: 83%;
    font-weight: 500;
    font-size: 12px;
}

.cart-item__insufficientStock {
    background: rgba(0, 0, 0, 0.6);
    padding: 5px 12px;
}

.bread-crumb {
    padding: 50px 0;
}

.bread-crumb__item {
    display: inline-block;
}

.sale-attr .color-attr {
    display: inline-block;
    width: 10%;
    border-radius: 50%;
}

.bread-crumb__item-link {
    color: black;
    text-decoration: none;
}

.bread-crumb__item-link.active {
    font-weight: 500;
}

.sale-attr .dropdown-toggle btn:hover {
    border: 0;
}

.shopping-bag {
    border: 1px solid #d5d5d5;
    height: 340px;
    margin-top: 20px;
}

.bag-products {
    display: flex;
    justify-content: start;
    width: 96%;
    margin: auto;
}

.bag-products .bag-product {
    width: calc(100% / 5) !important;
    padding: 0 5px;
    margin-right: 6px !important;
}

.bag-product .bag-product-name {
    font-size: 12px;
    text-align: start;
    color: #767676;
    text-overflow: ellipsis;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
}

.shopping-bag-title {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    padding: 0 20px;
}

.shopping-bag-link {
    color: black;
    text-decoration: none;
    font-size: 0.8rem;
}

.shopping-bag .title {
    margin-top: 20px;
}

.bag-product-price {
    text-align: start;
    font-size: 15px;
    font-weight: 500;
}

.bag-product-quantity {
    line-height: 26px;
    background-color: rgba(255, 255, 255, 0.9);
    bottom: 0;
    text-align: center;
    font-size: 13px;
    color: #222;
    font-weight: 500;
    position: absolute;
    width: 100%;
}

.shopping-bag-totalprice {
    text-align: left;
    margin-left: 20px;
}

.shopping-bag-totalprice h4 {
    font-size: 16px;
    font-weight: 500;
}

.shopping-bag-totalprice h4 span {
    font-size: 1rem;
    font-weight: 500;
    font-family: 'Rubik', sans-serif;
}

input::-webkit-input-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

input:-moz-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

input::-moz-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

input:-ms-input-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

.form-control:focus {
    box-shadow: none;
    border: 1px solid #020202;
}

input:focus::-webkit-input-placeholder {
    top: 0;
    font-size: 0.7rem;
    -webkit-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}

input:focus:-moz-placeholder {
    top: 0;
    font-size: 0.7rem;
    -moz-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}

input:focus::-moz-placeholder {
    top: 0;
    font-size: 0.7rem;
    -moz-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}

input:focus:-ms-input-placeholder {
    top: 0;
    font-size: 0.7rem;
    -ms-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}

@media(max-width: 900px) {
    #productsModal .modal-dialog .modal-content {
        border-radius: 0;
        padding: 10px;
    }

    #productsModal .shopping-bag .title {
        margin-top: 0px;
        margin-bottom: 10px;
        text-align: center !important;
        font-weight: 400;
    }

    #productsModal .products-row {
        border: 0;
        margin-top: 10px;
        padding: 0;
    }

    .bread-crumb {
        padding: 10px 0;
    }

    .checkout-page .checkout-page-col1,
    .checkout-page .checkout-page-col2 {
        padding: 0px;
    }

    .shopping-bag .title {
        font-family: 'Rubik', sans-serif;
        font-size: 1rem;
        margin-top: 10px;
    }

    .shopping-bag-title {
        padding: 0 5px;
    }

    .bag-products .bag-product {
        width: calc(100% / 3) !important;
        padding: 0 5px;
        margin-right: 6px !important;
    }

    .checkout-page .checkout-page-col2 {
        border-left: 0;
        padding: 0px 5px;
        margin-top: 20px;
    }

    
    .checkout-page h1 {
        font-weight: bold;
    }
}
</style>
