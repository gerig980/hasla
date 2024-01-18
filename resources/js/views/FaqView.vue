<template>
    <NavbarView/>
    <FaqView/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import FaqView from "../components/FaqView.vue";
export default {
  components: { NavbarView, FooterView, FaqView },
}
</script>