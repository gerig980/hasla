<template>
    <NavbarView/>
    <PayView/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import PayView from "../components/PayView.vue";
export default {
  components: { NavbarView, FooterView, PayView },
}
</script>