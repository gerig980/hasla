<template>
    <NavbarView/>
    <OrderEmail/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import OrderEmail from "../components/OrderEmail.vue";
export default {
  components: { NavbarView, FooterView, OrderEmail },
}
</script>