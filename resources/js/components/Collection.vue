<template>
    <section class="collection-page" v-for="(collection, index) in collection_products" :key="index" :load="productsCollection = collection.products">
        <div class="last-banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <a href="">
                            <img :src="`../images/collections/banner/${collection.image}`" class="last-banner-img" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="categories-tabs">
            <ul>
                <li v-for="(category, index) in categories" :key="index" :class="{ 'active': activeCategory == index }" style="text-transform: uppercase;" @click="(getCategoryBy(category), activeCategory = index)">{{ category.name }}</li>
            </ul>
        </div>
        <div class="container-fluid" >
            <div class="row" v-if="collection.products && collection.products.length > 0" >
                <router-link class="product-card" v-for="(product, index) in productsFilter" :key="index"
                    :to="`/product/${product.id}`">
                    <!-- <img v-bind:src="product.thumbnail_path + product.thumbnail" alt="" class="product-image"> -->
                    <div style="display:none;"> {{ thumbnail = product.thumbnail }} </div>
                    <img :src="`../images/admin_products/medium/${product.thumbnail}`" :alt="product.name" class="img-fluid" />
                    <p class="product-name">{{ product.name }} </p>
                    <p class="price">{{ product.price }} lekë</p>
                    <div class="d-flex justify-content-start patterns" v-if="product.colors.length > 1">
                        <div class="background" v-for="(stock, ind) in product.product_stocks" :key="ind">
                            <div :style="`background:${stock.color_code}`" class="background-color"  v-on:mouseover="product.thumbnail = stock.color_images[0]"></div>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </section>
</template>
<script>
import BottomIcons from "./dashboard-components/BottomIcons.vue";
export default {
    components: {
        BottomIcons
    },
    el: "#app",
    data() {
        return {
            key: '',
            loading: false,
            collection_products: [],
            breadcrumbs: null,
            categories: [],
            category_ids: [],
            categorySlug: null,
            activeCategory: 0,
            productsCollection: []
        }
    },
    mounted() {
        this.collectionProducts();
        this.getCategories();
    },
    methods: {
        // changepic(thumbnail, image_color) {
        //     image_color = thumbnail;
        //     return thumbnail;
        // },
        collectionProducts() {
            this.loading = true;
            this.axios.get('/api/v1/collection/'+this.$route.params.slug).then((response) => {
                this.loading = false;
                this.collection_products = response.data.data;
                document.title = this.collection_products[0].name;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getCategories() {
            this.loading = true;
            this.axios.get('/api/v1/all-categories').then((response) => {
                this.loading = false;
                this.categories = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getCategoryBy(category) {
            this.categorySlug = category.slug;
            this.loading = true;
            this.axios.get('/api/v1/category-by/'+this.categorySlug).then((response) => {
                this.loading = false;
                this.category_ids = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
    },
    computed: {
        productsFilter() {
            return this.productsCollection.filter((item) => {
                return (
                    (this.category_ids.length === 0 || this.category_ids.includes(item.category_id))
                );
            });
        },
    }
};
</script>
<style scoped>
.collection-page {
    padding: 210px 80px 80px;
}
.collection-page .last-banner {
    padding: 0px;
} 
.categories-tabs {
    background: #020202;
    padding: 20px 20px 0px 20px;
    margin-top: 20px;
    margin-bottom: 20px;
}
.categories-tabs ul {
    list-style-type: none;
    display: -webkit-box;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-between;
    overflow-x: auto;
}
.categories-tabs ul li {
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    font-weight: 500;
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    color: #fff;
    cursor: pointer;
    border-bottom: 4px solid transparent;
    width: max-content;
}
.categories-tabs ul li:hover, .categories-tabs ul li.active  {
    border-bottom: 4px solid #D31621;
}
@media(max-width: 900px) {
    .collection-page {
        padding: 180px 0px 0px;
    }
    .collection-page .last-banner, .collection-page .last-banner img {
        height: 150px;
    }
    .categories-tabs {
        padding: 5px 5px 0px 5px;
    }
    .categories-tabs ul {
        justify-content: start;
        padding-left:0;
    }
    .categories-tabs ul li {
        padding-bottom: 5px;
        padding-left: 10px;
        padding-right: 10px;
        font-size: 0.8rem;
    }
    .collection-page .product-card img {
        height: 180px !important;
    }
}
</style>