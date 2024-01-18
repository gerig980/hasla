<template>
<NavbarView/>
<LoginView/>
<FooterView/>
</template>
<script>
import NavbarView from "../components/NavbarView.vue";
import FooterView from "../components/FooterView.vue";
import LoginView from "../components/LoginView.vue";
export default {
  components: { NavbarView, FooterView, LoginView },
}
</script>
