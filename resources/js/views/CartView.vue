<template>
    <NavbarView/>
    <CartView/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import CartView from "../components/CartView.vue";
export default {
  components: { NavbarView, FooterView, CartView },
}
</script>