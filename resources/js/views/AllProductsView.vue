<template>
  <NavbarView />
  <AllProducts />
  <FooterView />
</template>

<script>

// @ is an alias to /src
import NavbarView from '../components/NavbarView.vue';
import FooterView from '../components/FooterView.vue';
import AllProducts from '../components/AllProducts.vue';

export default {
  name: 'HomeView',
  components: {
    NavbarView,
    FooterView,
    AllProducts
}
}
</script>
