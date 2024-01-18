<template>
    <NavbarView />
    <Collection />
    <FooterView />
</template>

<script>

// @ is an alias to /src
import NavbarView from '../components/NavbarView.vue';
import FooterView from '../components/FooterView.vue';
import Collection from '../components/Collection.vue';

export default {
    name: 'HomeView',
    components: {
        NavbarView,
        FooterView,
        Collection
    }
}
</script>
