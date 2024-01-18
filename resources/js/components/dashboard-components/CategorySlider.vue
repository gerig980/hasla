<template>
  <div class="categories-row">
    <div v-for="slide in slides.slice(0, 7)" :key="slide.id">
      <router-link :to="{ name:'product.by.category', params: {slug: slide.slug } }">
        <div class="item">
        <div class="image-holder"><img v-bind:src="`/backend/assets/images/products/category/icons/${slide.icon}`"></div>
        <div class="content d-flex justify-content-center">
            <div class="align-self-center"><p>{{ slide.name }}</p></div>
        </div>
      </div>
    </router-link>
    </div>
  </div>
    <div class="categories-row">
    <div v-for="slide in slides.slice(7, 14)" :key="slide.id">
      <router-link :to="{ name:'product.by.category', params: {slug: slide.slug } }">
      <div class="item">
        <div class="image-holder"><img v-bind:src="`/backend/assets/images/products/category/icons/${slide.icon}`"></div>
        <div class="content d-flex justify-content-center">
            <div class="align-self-center"><p>{{ slide.name }}</p></div>
        </div>
      </div>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        slides: [],
        loading: false
      }
    },
    mounted(){
      this.getSUBCategories();
    },
    methods: {
      getSUBCategories(){
        this.loading = true;
        this.axios.get('/api/v1/subcategories').then((response) =>{
            this.loading = false;
            this.slides = response.data.data;
        }).catch((error) => {
            this.loading = false;
        })
    }
  }
}
</script>
<style>
.categories-row{
    padding: 0px;
    margin-top:10px;
    display:flex;
    justify-content: start;
    flex-direction:row;
    width:100vw;
    overflow-x:auto;
    overflow-y:hidden;
}
.categories-row .item {
  padding:0px 10px;
}
.categories-row .item .image-holder{
  width:80px;
  height: 80px;
  background:#F5F5F5;
  display:flex;
  border: 1px solid transparent;
  border-radius: 50%;
  padding: 10px;
  justify-content: center;
}
.categories-row .item img {
  width:auto;
  height: 50px;
  max-width:50px;
  align-self: center;
  object-fit: scale-down;
}
.categories-row::-webkit-scrollbar {
  display:none;
}
.category-slider .content {
  margin-top: 5px;
}
.categories-row .content p {
  color: #020202;
  font-family: 'Muli', sans-serif;
  font-weight: 400;
  font-size: 0.9rem;
  text-decoration: none;
  margin-left:auto;
}
</style>