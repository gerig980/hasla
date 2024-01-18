<template>
    <NavbarView/>
    <UserView/>
    <FooterView/>
    </template>
    <script>
    import NavbarView from "../components/NavbarView.vue";
    import FooterView from "../components/FooterView.vue";
    import UserView from "../components/UserView.vue";
    export default {
      components: { NavbarView, FooterView, UserView },
    }
    </script>
    