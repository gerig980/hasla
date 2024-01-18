<template>
<NavbarView/>
<AboutView/>
<FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import AboutView from "../components/AboutView.vue";
export default {
  components: { NavbarView, FooterView, AboutView },
}
</script>
