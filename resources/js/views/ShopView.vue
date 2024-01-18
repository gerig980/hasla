<template>
    <NavbarView/>
    <ShopView/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import ShopView from "../components/ShopView.vue";
export default {
  components: { NavbarView, FooterView, ShopView },
}
</script>