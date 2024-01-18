import { defineStore } from "pinia";

export const useCartStore = defineStore('cart', {
    state: () => ({
        items: [],
        hasCoupon: false,
        coupon_product_ids: [],
        coupon_code: null,
        coupon_type: null,
        coupon_discount: null,
        coupon_discount_type: null,
        coupon_minimum_shopping: null,
        coupon_maximum_discount: null,
    }),
    persist: true,

    actions: {
        addItem(item) {
            this.items.push(item);
        },
        removeItem(payload) {
            this.items.splice(payload, 1);
        },
    },

    getters: {
        count: (state) => state.items.length,
        isEmpty: (state) => state.count === 0,
        totalPurchaseAmount(state) {
            return state.items.reduce((acc, product) => {
                return acc + (product.quantity * product.price)
            }, 0)
        },
        couponAmount(state) {
            let amount = 0;
            if (state.hasCoupon) {
                if (state.totalPurchaseAmount >= state.coupon_minimum_shopping) {
                    if (state.coupon_type === 'product_base') {
                        state.items.forEach((item) => {
                            state.coupon_product_ids.forEach((product_id) => {
                                console.log(product_id);
                                if (parseInt(item.id) === parseInt(product_id)) {
                                    if (state.coupon_discount_type === 'flat') {
                                        amount += (state.coupon_discount*item.quantity);
                                    } else if (state.coupon_discount_type === 'percent') {
                                        amount += ((item.price*item.quantity)*state.coupon_discount)/100;
                                    }
                                }
                            });
                        });
                    }
                    // if (state.coupon_type === 'invoice_base') {
                    //     if (state.coupon_discount_type === 'percent') {
                    //         amount =  (state.totalPurchaseAmount * state.coupon_discount)/100;
                    //         if (amount > state.coupon_maximum_discount) {
                    //             amount = state.coupon_maximum_discount;
                    //         }
                    //     } else if (state.coupon_discount_type === 'flat') {
                    //         amount = state.coupon_discount;
                    //         if (amount > state.coupon_maximum_discount) {
                    //             amount = state.coupon_maximum_discount;
                    //         }
                    //     }
                    // }
                }
            }
            return amount;
        },
    },
});
