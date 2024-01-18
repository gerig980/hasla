<template>
  <NavbarView />
  <SingleProduct />
  <FooterView />
</template>

<script>

// @ is an alias to /src
import NavbarView from '../components/NavbarView.vue';
import FooterView from '../components/FooterView.vue';
import SingleProduct from '../components/SingleProduct.vue';

export default {
  name: 'HomeView',
  components: {
    NavbarView,
    FooterView,
    SingleProduct
}
}
</script>
