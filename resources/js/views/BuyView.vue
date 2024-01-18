<template>
    <NavbarView/>
    <BuyView/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import BuyView from "../components/BuyView.vue";
export default {
  components: { NavbarView, FooterView, BuyView},
}
</script>