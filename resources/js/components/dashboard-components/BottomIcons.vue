<template>
<div class="bottom-icons">
  <div class="d-flex">
    <a :href="`${origin}/`" class="single-icon">
    <img :src="home" />
    <p>Dyqani</p>
    </a>
    <a :href="`${origin}/category/femra`" class="single-icon">
    <img :src="newicon" />
    <p>Produktet</p>
    </a>
    <a :href="`${origin}/cart`" class="single-icon">
    <img :src="shoppingbag" />
    <p>Shporta</p>
    <span>{{ cartStore.count }}</span>
    </a>
    <a :href="`${origin}/user-profile`" class="single-icon">
    <img :src="usericon" />
    <p>Profili</p>
    </a>
  </div>
</div>
</template>
<script>
import usericon from "../../assets/user-icon.svg"
import shoppingbag from "../../assets/shopping-bag.svg"
import home from "../../assets/home.svg"
import newicon from "../../assets/new-icon.svg"
import { useCartStore } from "../../stores/Cart";
import { useRouter } from "vue-router";
import { useStore } from 'vuex'

export default {
  data: function () {
    return {
      usericon: usericon,
      shoppingbag: shoppingbag,
      home: home,
      newicon: newicon,
      origin: '',
    }
  },
  mounted() {
    this.getOrigin();
  },
  methods: {
    getOrigin() {
      this.origin = window.location.origin;
    },
  },
  setup() {
    const cartStore = useCartStore()

    const router = useRouter();
    const store = useStore();

    function logout() {
      store.dispatch('removeToken');
      // localStorage.removeItem('token');
      router.push({ name: 'home' })
    }
    return { cartStore, logout }
  },
}
</script>
<style scoped>
.single-icon p {
  font-size:0.7rem;
  color: #020202;
}
.bottom-icons p {
  margin-bottom: 0;
}
.bottom-icons .single-icon img {
  max-height: 22px;
  object-position: center;
  object-fit: scale-down;
}
.mobile-footer, .filters-page {
  padding-bottom: 90px !important;
}
.single-icon {
  position: relative;
}
.single-icon span {
  font-size: 9px;
  color: #fff;
  background: #D31621;
  width:15px;
  height:15px;
  padding: auto;
  border:1px solid transparent;
  border-radius:50%;
  position:absolute;
  right:20px;
  top:-5px;
}
</style>