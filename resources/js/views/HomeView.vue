<template>
  <NavbarView />
  <DashboardView />
  <FooterView />
</template>

<script>

// @ is an alias to /src
import NavbarView from '../components/NavbarView.vue';
import FooterView from '../components/FooterView.vue';
import DashboardView from '../components/DashboardView.vue';
import { defineComponent, computed, reactive } from 'vue';
// import { useHead } from '@vueuse/head';

export default defineComponent({
  components: {
    NavbarView,
      FooterView,
      DashboardView,
  },
  setup() {
    // useHead({
    //   title: 'Klaudio Fashion',
    //   meta: [
    //     {
    //       name: 'description',
    //       content: 'Klaudio Fashion',
    //     },
    //   ],
    // })
  },
})
</script>
