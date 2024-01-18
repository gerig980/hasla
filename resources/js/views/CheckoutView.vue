<template>
    <Checkout/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import Checkout from "../components/Checkout.vue";
export default {
  components: { NavbarView, FooterView, Checkout },
}
</script>