<template>
    <NavbarView/>
    <TransportView/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import TransportView from "../components/TransportView.vue";
export default {
  components: { NavbarView, FooterView, TransportView },
}
</script>