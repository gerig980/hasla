<template>
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8 ps-md-0 pe-md-2">
                    <div v-if="!cartStore.isEmpty">
                        <div class="item-summary-col bg-white summary-pc">
                            <h3 class="item-sum text-start">Përmbledhja e produkteve ({{ cartStore.count }})</h3>
                            <div class="card-item-cells">
                                <!-- <div class="card-item-cell first">
                                  <input type="checkbox" name="all" v-model="selectedAll"/>
                                  <p class="">All</p>
                                </div> -->
                                <div class="card-item-cell first">
                                    <p class="">Item</p>
                                </div>
                                <div class="card-item-cell">
                                    <p>Price</p>
                                </div>
                                <div class="col-md-2 card-item-cell">
                                    <p>Qty</p>
                                </div>
                                <div class="card-item-cell text-end">
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="items-selected" v-for="(item, index) in cartStore.items" :key="index" :class="{ bordered: cartStore.items.length > 1}">
                                <!-- <input type="checkbox" :value="product.id" v-model="selected"/> -->
                                <router-link class="item-image" :to="`/product/${item.id}`">
                                    <img :src="item.image" class="img-fluid" alt="..."/>
                                </router-link>
                                <div class="item-details">
                                    <p class="product-name text-start"> {{item.name}} </p>
                                    <!-- data-bs-toggle="modal" data-bs-target="#attributeModalpc" -->
                                    <router-link v-if="item.colorCode !== null || item.sizeValue !== null" class="sale-attr d-flex" :to="`/product/${item.id}`">
                                        <div v-if="item.colorCode !== null" class="patterns">
                                            <div :style="`background:${item.colorCode}`" class="background-color text-center"></div>
                                        </div>
                                        <p v-if="item.sizeValue !== null">/ {{ item.sizeValue }}</p>
                                    </router-link>

                                    <div class="delete-item" @click="removeFromCart(index)"><p>Delete</p></div>
                                </div>
                                <div class="item-price even text-center"><p>{{ item.price }} Lekë</p></div>
                                <input type="hidden" id="initialPrice" :value="`${item.price}`">
                                <div class="item-quantity even justify-content-center">
                                    <div class="value-button" id="decrease" v-if="item.quantity > 1" @click="item.quantity--">-</div>
                                    <div class="value-button" id="decrease" v-else>-</div>
                                    <input type="number" id="number" :value="item.quantity" min="1"/>
                                    <div class="value-button" id="increase" @click="item.quantity++">+</div>
                                </div>
                                <div class="item-total even text-end"><p><span id="productTotal">{{calculateSubtotal(item.price,item.quantity)}}</span> Lekë</p></div>

                            </div>

                        </div>
                        <div class="item-summary-col bg-white summary-tel">
                            <h3 class="item-sum text-start">Përmbledhja e produkteve ({{cartStore.count}})</h3>
                            <div class="card-item-cells">
                                <div class="card-item-cell text-start">
                                    <p class="">Produkti</p>
                                </div>
                                <div class="card-item-cell text-end">
                                    <p>Detaje</p>
                                </div>
                            </div>
                            <hr />
                            <div class="items-selected" v-for="(item, index) in cartStore.items" :key="index">
                                <!-- <input type="checkbox" :value="product.id" v-model="selected"/> -->
                                <router-link class="item-image" :to="`/product/${item.id}`">
                                    <img :src="item.image" class="img-fluid" alt="..."/>
                                </router-link>
                                <div class="item-details ">
                                    <p class="product-name text-start"> {{item.name}} </p>
                                    <div class="d-flex">
                                        <!-- <div class="sale-attr d-flex" data-bs-toggle="modal" data-bs-target="#attributeModaltel"> -->
                                        <router-link class="sale-attr d-flex"  :to="`/product/${item.id}`">
                                            <div class="patterns">
                                                <div :style="`background:${item.colorCode}`" class="background-color text-center"></div>
                                            </div>
                                            <p>/ {{ item.sizeValue }}</p>
                                        </router-link>
                                        <div class="delete-item" @click="removeFromCart(index)">
                                            <img :src="recycle" alt="delete">
                                        </div>
                                    </div>
                                </div>
                                <div class="item-price even text-end">
                                    <div class="d-flex justify-content-end">
                                        <p class="single-price">{{ item.price }} Lekë</p>
                                        <input type="hidden" id="initialPrice" :value="`${item.price}`">
                                        <div class="item-quantity text-center">
                                            <div class="value-button" id="decrease" v-if="item.quantity > 1" @click="item.quantity--"
                                                 value="Decrease Value">-</div>
                                            <div class="value-button" id="decrease" v-else value="Decrease Value">-</div>
                                            <input type="number" id="number" :value="item.quantity" min="1" />
                                            <div class="value-button" id="increase" @click="item.quantity++" value="Increase Value">+</div>
                                        </div>
                                    </div>
                                    <p class="product-total"><span id="productTotal">{{calculateSubtotal(item.price,item.quantity)}}</span> Lekë</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div class="cart-empty">
                            <img :src="emtpy" alt="empty cart">
                            <p>Shporta juaj është bosh</p>
                            <a href="">Bli Produkte</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="order-summary">
                        <h3 class="main-title">Përmbledhja e porosisë</h3>
                        <div class="row">
                            <div class="col-6 text-start">
                                <p class="subtotal-title">Subtotal</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="subtotal">{{ cartStore.totalPurchaseAmount }} Lekë</p>
                            </div>
                        </div>
                        <div class="row">
                            <router-link :to="`/checkout`" class="btn btn-dark" style="border-radius: 0; line-height: 52px; font-size: 18px"><img :src="shoppingbag">Përfundoni Porosinë</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <AttributeModal/>
</template>
<script scoped>
import AttributeModal from './cart-components/attributeModal.vue';
import emtpyCart from '../assets/empty-cart.png';
import recycle from '../assets/recycle.png';
import { useCartStore } from "../stores/Cart";
import {useToast} from "vue-toastification";
export default {
    props: {
        items: {
            type: Array,
            required: false
        }
    },
    data() {
        return {
            emtpy: emtpyCart,
            cart: [],
            selected: [],
            checkedPrices: [],
            recycle: recycle,
        };
    },
    created() {
        document.title = 'Shporta Ime';
    },
    computed: {
        selectedAll: {
            set(val) {
                this.selected = []
                if (val) {
                    for (let i = 0; i <= this.selectedProducts.length; i++) {
                        this.selected.push(i)
                    }
                }
            },
            get() {
                return this.selected.length === this.selectedProducts.length
            },
        }
    },
    components: {
        AttributeModal,
    },
    methods: {
        calculateSubtotal(price, quantity) {
            return price * quantity;
        },
        removeFromCart: function (index) {
            this.cartStore.removeItem(index);
            this.toast.success('U fshi me sukses nga karta.');
        }
    },
    setup() {
        const toast = useToast();
        const cartStore = useCartStore()
        return { cartStore, toast }
    },
};
</script>


<style scoped>
.bordered {
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 10px;
}
.cart-empty {
    background: #fff;
    text-align: center;
    padding: 40px 0px;
}
.cart-empty img {
    width: 150px;
    height: auto;
    margin-bottom: 20px;
}
.cart-empty p {
    font-size:1.2rem;
    font-weight: 500;
    font-family: 'Rubik', sans-serif;
    text-transform: uppercase;
}
.cart-empty a {
    padding: 10px 20px;
    background: #020202;
    color: #fff;
    font-weight: 500;
    font-family: 'Rubik', sans-serif;
    text-transform: uppercase;
}
.summary-tel {
    display: none;
}
.summary-pc {
    display: block;
}
.cart input {
    -webkit-appearance: none;
    margin-right: 10px;
    background-color: #fafafa;
    border: 1px solid #b3b3b3;
    width: 15px;
    height: 15px;
    align-self:center;
}
.cart input:checked {
    background-color: #020202;
}
.cart {
    background: #f7f8fa;
    padding-top: 210px;
    padding-bottom: 40px;
}
.item-sum {
    font-size: 15px;
    font-family: "Rubik", sans-serif;
    font-weight: 600;
    font-size: 1.4rem;
}
.item-summary-col {
    padding: 24px 10px 0 10px;
}
.card-item-cell {
    font-weight: 700;
    font-size: 14px;
    color: #222;
    text-align: center;
}
.card-item-cell p {
    margin-bottom: 0 !important;
    margin-top:auto;
}
.order-summary {
    padding: 24px;
    background-color: white;
}
.order-summary .main-title {
    font-size: 20px;
    display: inline-block;
    font-family: "Muli", sans-serif;
    font-weight: 800;
    color: #222;
    margin-bottom: 16px;
}
.order-summary .subtotal {
    color: #222;
    font-family: "Muli", sans-serif;
    font-weight: 800;
}
.items-selected {
    background-color: white;
}
.item-quantity {
    margin: 0 auto;
    text-align: center;
    display: flex;
}
.subtotal-title, .subtotal {
    font-size: 1.1rem;
}
.value-button {
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ddd;
    margin: 0px;
    width: 25px;
    height: 25px;
    text-align: center;
    vertical-align: middle;
    padding: 11px 0;
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
.item-quantity #decrease {
    border-radius: 24px 0 0 24px;
}
.item-quantity #increase {
    border-radius: 0 24px 24px 0;
}
.item-quantity #input-wrap {
    margin: 0px;
    padding: 0px;
}
input#number {
    text-align: center;
    border: none;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    margin: 0px;
    width: 25px;
    height: 25px;
    align-self: flex-start;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.breadcrumbs {
    padding:20px 0px;
    display:flex;
    justify-content: start;
}
.bread-crumb-link {
    color: #000;
}
.bread-crumb-link:hover {
    color: #474747;
}
.breadcrumbs .bread-crumb-item span {
    color: #474747;
}
.sale-attr {
    color: #020202;
    background: #f7f8fa;
    width:max-content;
    padding: 1px 4px;
    height:28px;
    border:1px solid transparent;
    border-radius: 15px;
    justify-content:center;
    align-content: center;
    cursor: pointer;
}
.sale-attr:hover {
    border:1px solid #020202;
}
.sale-attr p {
    font-weight:600;
    font-size:0.9rem;
}
.filter select {
    border-radius: 0px;
    font-weight: 600;
    padding: 0px 20px 0px 5px;
    -moz-appearance: inherit;
    -webkit-appearance: inherit;
    background-image: url("../assets/chevron-down.png");
    appearance: inherit;
    background-repeat: no-repeat;
    background-position: right 0.7em top 55%, 0 0;
}
.card-item-cells, .items-selected {
    display:flex;
    justify-content: start;
    padding:10px 0px;
}
.card-item-cells .card-item-cell{
    width: calc(100%/5);
}
.card-item-cells .card-item-cell.first {
    width: calc(40%) !important;
}
.items-selected .even {
    width: calc(100%/4);
}
.items-selected .item-image {
    width: calc(20%);
}
.card-item-cells .card-item-cell.first {
    display: flex;
    justify-content:start;
}
.item-image img{
    max-width: 100%;
    height: 133px;
    object-fit: cover;
}
.item-details {
    height:133px;
    position:relative;
    width: 30%;
    padding-left: 10px;
}
.item-details .delete-item {
    position:absolute;
    bottom:0;
    cursor: pointer;
}
.item-details .delete-item p {
    margin-bottom: 0px;
}
@media(max-width: 900px) {
    .summary-tel {
        display: block;
    }
    .summary-pc {
        display: none;
    }
    .summary-tel .items-selected .even {
        width: calc(100%/2);
    }
    .summary-tel .items-selected .item-image {
        width: calc(20%);
    }
    .summary-tel .item-image img {
        width: 100%;
        height: 55px;
        object-fit: cover;
    }
    .summary-tel .item-details .product-name, .summary-tel .sale-attr p {
        font-size:0.7rem;
        font-weight:400;
        margin-bottom: 0;
        align-self:center;
    }
    .summary-tel .sale-attr {
        width: 104px;
        height:25px;
        align-content:center;
    }
    .summary-tel .item-details .delete-item {
        position: static;
        margin-left:5px;
    }
    .summary-tel .item-details .delete-item img {
        max-width: 12px;
    }
    .summary-tel .item-details {
        width: 56%;
    }
    .summary-tel .value-button, .summary-tel input#number {
        width:20px;
        height:20px;
        padding:0;
        border-radius:0;
        outline: none;
    }
    .summary-tel .item-quantity {
        margin: 0;
    }
    .summary-tel .card-item-cells .card-item-cell {
        width: calc(100%/2);
    }
    .summary-tel .single-price {
        align-self:center;
        margin-right: 10px;
        font-size:0.8rem;
    }
    .summary-tel .product-total {
        font-weight: 600;
    }
    .summary-tel .items-selected {
        border-bottom: 1px solid #b3b3b3;
        height: 100px;
    }
    .cart {
        padding-top: 180px;
    }
    .item-sum {
        font-size:1.1rem;
    }
}
</style>
