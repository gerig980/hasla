<template>
    <aside class="cart-container cart-cart">
        <div class="cart-modal">
            <div class="cart-modal-products">
                <div class="cart-body">
                    <div class="items-selected container-fluid">

                        <div class="row mb-2" v-for="(item, index) in cartStore.items" :key="index">
                            <div class="col-md-3 pe-2 d-flex justify-content-center align-items-center">
                                <img :src="item.image" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-4">
                                <div class="modal-detail-1">
                                    <p class="sing-product modal-product-name text-start">{{item.name}}</p>
                                    <div class="modal-product-size d-flex justify-content-start">
                                        <div v-if="item.colorCode !== null" class="patterns">
                                            <div :style="`background:${item.colorCode}`" class="background-color text-center"></div>
                                        </div>
                                        <p v-if="item.sizeValue !== null">/ {{ item.sizeValue }}</p>
                                    </div>
                                    <div class="item-quantity d-flex justify-content-start">
                                        <div class="value-button" id="decrease" v-if="item.quantity > 1" @click="item.quantity--">-</div>
                                        <div class="value-button" id="decrease" v-else>-</div>
                                        <input type="number" id="number" :value="item.quantity" min="1"/>
                                        <div class="value-button" id="increase" @click="item.quantity++">+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="modal-detail-2">
                                    <p class="modal-product-price">{{ item.price }} Lekë</p>
                                    <div class="delete-item" @click="removeFromCart(index)">
                                        <img src="/images/recycle.png?567e8cf5c57e0a33a60bff8e3e5b2e18" alt="delete">
                                    </div>
                                    <p class="modal-total-price m-0">Totali: <span>{{calculateSubtotal(item.price,item.quantity)}} Lekë</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bottom-row container-fluid">
                <div class="row total-amount">
                    <div class="col-6 p-0 text-start">
                        <label for="all">Të Gjitha</label>
                    </div>
                    <div class="col-6 p-0">
                        <p class="modal-total-amount text-end">
                            Totali: {{ cartStore.totalPurchaseAmount }} Lekë
                        </p>
                    </div>

                </div>
                <div class="row total-amount">
                    <a href="" class="btn btn-dark">Shiko shportën ({{ cartStore.items.length }})</a>
                </div>
            </div>

        </div>

    </aside>
</template>

<script>

import { useCartStore } from "../../stores/Cart";
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
            selectedProducts: [{
                id: "1",
                name: "Bluze me menge te shkurtra",
                price: "430",
                quantity: 1,
                selectedPattern: "/backend/assets/images/products/attributes/pattern1.png",
                selectedSize: "S",
                patterns: [{
                    id: "1",
                    patternValue: "Blue",
                    patternImage: "/images/products/featured1.jpg"
                }],
                sizes: [{
                    id: "1",
                    sizeValue: "S"
                },
                    {
                        id: "2",
                        sizeValue: "M"
                    }
                ],
                imageThumbnail: "/backend/assets/images/products/img-1.png"
            },
                {
                    id: "2",
                    name: "Bluze me menge te shkurtra",
                    price: "430",
                    quantity: 1,
                    selectedPattern: "/backend/assets/images/products/attributes/pattern1.png",
                    selectedSize: "S",
                    patterns: [{
                        id: "1",
                        patternValue: "Blue",
                        patternImage: "/images/products/featured1.jpg"
                    }],
                    sizes: [{
                        id: "1",
                        sizeValue: "S"
                    },
                        {
                            id: "2",
                            sizeValue: "M"
                        }
                    ],
                    imageThumbnail: "/backend/assets/images/products/img-1.png"
                }
            ],
            patterns: [{
                patternid: "1",
                patternone: './cart-components/attributeModal.vue',
                hoverimg: require('/images/products/featured1.jpg')
            }],
            imagecart: '/images/products/featured1.jpg',
            cart: [],
            selected: [],
            checkedPrices: [],
        };
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

    },
    methods: {
        calculateSubtotal(price, quantity) {
            return price * quantity;
        },
        // total() {
        //     return this.cartStore.items.reduce((acc, product) => {
        //         return acc + (product.quantity * product.price)
        //     }, 0)
        // },
        removeFromCart: function (index) {
            this.cartStore.removeItem(index);
            this.toast.success('Successfully removed from the cart.');
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
.cart-container .delete-item img {
    width: 14px;
    height: auto;
}
.item-quantity #decrease {
    border-radius: 24px 0 0 24px;
}
.item-quantity #increase {
    border-radius: 0 24px 24px 0;
}
@media(max-width: 900px) {
    aside.cart-container {
        display: none !important;
    }
}
.bottom-row {
    padding: 10px 20px;
    padding-bottom:0;
    border-top: 1px solid #e5e5e5;
}
.patterns {
    cursor: pointer;
    width: 18px;
    height: 18px;
    object-fit: cover;
    border: 1px solid #020202;
    border-radius: 50%;
    text-align: center;
    padding: 0;
    margin-right: 2px;
    -webkit-box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
    box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
}
.patterns .background-color {
    width: 16;
    height: 16px;
    object-fit: cover;
    border: 2px solid #fff;
    border-radius: 50%;
    vertical-align: baseline;
}
.cart-container {
    position: absolute;
    overflow: hidden;
    background-color: #fff;
    width: 400px;
    top: 70px !important;
    right: -50px;
    max-height: 800px;
    margin-left: auto;
    z-index: 250;
    padding-bottom: 10px;
}

.cart-modal {
    position: relative;
    color: black;
    transition: 1s ease right;
    bottom: 0;
}

.cart-title {
    align-items: center;
    padding: 0px 15px;
    font-size: 26px;
    text-align-last: justify;
}

.cart-modal-products {
    max-height: 640px;
    overflow-y: auto;
}

.cart-close {
    background: transparent;
    border: 0px;
    border-radius: 20px;
    padding: 0px 13px;
    color: black;
    font-size: 24px;
    font-weight: bold;

}

.cart-table {
    width: 400px;
    border-collapse: collapse;
    margin: 0px;
    font-size: 15px;
    background-color: #fff;
}

.cart-body {
    overflow: auto;
}

.items-selected {
    width: 100%;
    background-color: white;
    padding: 10px 20px 0px;
    overflow-x: hidden;
}
.items-selected .img-fluid {
    max-width: 100%;
    height: 80px;
    object-fit: cover;
}
form {
    margin: 0 auto;
    text-align: center;
    display: flex;
}

.cart-modal .value-button {
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ddd;
    margin: 0px;
    width: 20px !important;
    height: 20px!important;
    text-align: center;
    vertical-align: middle;
    padding: 8px;
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

.cart-body input#number {
    text-align: center;
    border: none;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    margin: 0px;
    width: 20px !important;
    height: 20px !important;
    display: flex;
    justify-content: center;
    text-align: center;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.total-amount a {
    margin:0;
    color: #fff ;
}
.total-amount:hover{
    color:black !important;
}

.modal-product-name {
    font-size: 0.8rem;
    color: #767676;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
    margin-bottom:5px;
}

.modal-product-size {
    font-size: 12px;
    color: #767676;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
    height: 25px;
    margin-bottom:5px;
}

.modal-product-price {
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    margin-bottom: 0;
    font-size: 0.8rem;
}

.modal-total-price {
    font-size: 12px;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
}

.cart-modal input {
    -webkit-appearance: none;
    margin-right: 10px;
    background-color: #fafafa;
    border: 1px solid #b3b3b3;
    width: 15px;
    height: 15px;
}

.cart-modal input:checked {
    background-color: #020202;
}

.total-amount {
    background-color: #fff;
    padding: 0 10px 0 10px;
}
.total-amount .btn {
    border-radius: 0;
    line-height: 32px;
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    text-transform: uppercase;
}
.modal-total-amount {
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    margin-bottom: 0.5rem;
}
.modal-total-price span {
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    position: static !important;
}
.modal-detail-2 {
    text-align: end;
}
</style>
