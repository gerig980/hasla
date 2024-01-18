<template>
    <NavbarView />
    <FlashSale />
    <FooterView />
</template>

<script>

// @ is an alias to /src
import NavbarView from '../components/NavbarView.vue';
import FooterView from '../components/FooterView.vue';
import FlashSale from '../components/FlashSale.vue';

export default {
    name: 'HomeView',
    components: {
        NavbarView,
        FooterView,
        FlashSale
    }
}
</script>
