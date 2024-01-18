import AllProductsView from '../views/AllProductsView.vue'
import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CartView from '../views/CartView.vue'
import CheckoutView from '../views/CheckoutView.vue'
import SingleProductView from '../views/SingleProductView.vue'
import LoginView from '../views/LoginView.vue'
import UserView from '../views/UserView.vue'
import FlashSaleView from '../views/FlashSaleView.vue'
import CollectionView from '../views/CollectionView.vue'
import EmailVerificationView from '../components/email-components/EmailVerification.vue'
import EmailBackView from '../components/EmailBack.vue'
import ThankYouView from '../views/ThankYouView.vue'
import WhoweareView from '../views/WhoweareView.vue'
import FaqView from '../views/FaqView.vue'
import BuyView from '../views/BuyView.vue'
import PayView from '../views/PayView.vue'
import TransportView from '../views/TransportView.vue'
import ShopView from '../views/ShopView.vue'
import TermsView from '../views/TermsView.vue'
import OrderEmail from '../views/OrderEmail.vue'
import store from '../stores/index'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/all-products',
    name: 'All Products',
    component: AllProductsView
  },
  {
    path: '/user-login',
    name: 'User Login',
    component: LoginView,
    meta:{
      requiresAuth:false
    }
  },
  {
    path: '/user-profile',
    name: 'user.profile',
    component: UserView,
    meta:{
      requiresAuth:true
    }
  },
  {
    path: '/checkout',
    name: 'Checkout',
    component: CheckoutView
  },
  {
    path: '/flash-sale/:slug',
    name: 'front.flash-Sale',
    component: FlashSaleView,
    meta: {
      title: 'Flash Sale'
    }
  },
  {
    path: '/collection/:slug',
    name: 'front.collection',
    component: CollectionView
  },
  {
    path: '/user-verification',
    name: 'User Verification',
    component: EmailBackView
  },
  // {
  //   path: '/single-product/:slug',
  //   name: 'Single Product',
  //   component: SingleProductView
  // },
  {
    path: '/cart',
    name: 'Cart',
    component: CartView
  },
  {
    path: '/whoweare',
    name: 'Whoweare',
    component: WhoweareView
  },
  {
    path: '/faq',
    name: 'Faq',
    component: FaqView
  },
  {
    path: '/buy',
    name: 'Buy',
    component: BuyView
  },
  {
    path: '/payment',
    name: 'Pay',
    component: PayView
  },
  {
    path: '/terms',
    name: 'Terms',
    component: TermsView
  },
  {
    path: '/transport',
    name: 'Transport',
    component: TransportView
  },
  {
    path: '/shop',
    name: 'Shop',
    component: ShopView
  },
  {
    path: '/order-email',
    name: 'Order Email',
    component: OrderEmail
  },

  {
    path: '/category/:slug',
    name: 'product.by.category',
    component: AllProductsView,
    meta: {
      title: 'Category Products'
    }
  },
  {
    path: '/product/:slug',
    name: 'product.details',
    component: SingleProductView,
    meta: {
      title: 'Product Details'
    }
  },
  {
    path: '/thank-you',
    name: 'thankyou',
    component: ThankYouView,
    meta: {
        title: 'Thank You Page'
    }
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/user/verification/verify/:user',
    name: 'verification.user',
    component: EmailVerificationView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

router.beforeEach((to, from) => {
  if(to.meta.requiresAuth && store.getters.getToken == 0){
    return { name: 'User Login'}
  }
  if(to.meta.requiresAuth == false && store.getters.getToken != 0){
    return { name: 'user.profile'}
  }
})

export default router;
