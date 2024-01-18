<template>
    <NavbarView/>
    <WhoweareView/>
    <FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import WhoweareView from "../components/WhoweareView.vue";
export default {
  components: { NavbarView, FooterView, WhoweareView },
}
</script>