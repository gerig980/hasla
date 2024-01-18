<template>
    <div class="header">
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center p-0 p-md-auto">
                        <a href=""><h4>WE <img :src="heart" class="gif"> BEST SELLERS!</h4></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 first text-start">
                        <!-- <p>Register & enjoy 10% off on your first order.</p> -->
                        <a class="menu-toggle" @click="visible = !visible"><img :src="menu"></a>
                    </div>
                    <div class="col-6 text-center px-sm-0 px-lg-5"><a href="/" class="logo"><img :src="logo"></a></div>
                    <div class="col-3 third text-end">
                        <div class="d-flex justify-content-end icons">
                            <router-link class="to-user to-cart" :to="`/user-login`" v-if="$store.getters.getToken == 0"><img :src="usericon"></router-link>
                            <router-link class="to-user to-cart" :to="`/user-profile`" v-else><img :src="usericon">
                                <aside class="cart-container profile-cart">
                                    <div class="cart-modal">
                                        <div class="cart-modal-products">
                                            <div class="cart-body">
                                                <ul>
                                                    <li class="user-name">User Name</li><hr/>
                                                    <li>
                                                        <router-link :to="`/user-profile`">Profili Im</router-link>
                                                    </li>
                                                    <li>
                                                        <router-link :to="`/user-profile`">Porositë e mia</router-link>
                                                    </li><hr/>
                                                    <li @click="logout">Dil nga llogaria</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                            </router-link>
                            <!-- <button type="button" class="btn btn-dark mt-2" @click="logout" v-if="$store.getters.getToken != 0">Logout</button> -->
                            <router-link class="to-cart link-cart" :to="`/cart`"><img :src="shoppingbag"><span class="cart-span">{{ cartStore.count }}</span><ModalView /></router-link>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="overflow-menu">
            <ul class="navbar-nav">
                <li class="nav-item mx-3" v-for="(category, index) in categories" :key="index">
                    <router-link :to="{ name:'product.by.category', params: {slug: category.slug } }" class="nav-link">{{ category.name }} </router-link>
                </li>
            </ul>
        </div>
        <nav class="navbar">
            <ul class="navbar-nav ms-0 me-auto first-nav">
                <li class="nav-item mx-3" v-for="(category, index) in categories" :key="index">
                    <router-link :to="{ name:'product.by.category', params: {slug: category.slug } }" class="nav-link nav-links">{{ category.name }}</router-link>
                    <div class="subnav">
                        <div class="container">
                            <div class="row">
                                <div class="col-3 first-col">
                                    <div v-for="(banner, index) in banners" :key="index">
                                    <router-link :to="banner.link"  v-if="index == 0 && (banner.category_id == category.id || banner.category_id == null)"><img :src="`/images/banners/medium/${banner.image}`" class="navbar-banner"></router-link>
                                </div>
                                </div>
                                <div class="col-1">
                                    <ul>
                                        <li class="title">Të rejat</li>
                                        <li><a href="">22-08-2022</a></li>
                                        <li><a href="">21-08-2022</a></li>
                                        <li><a href="">20-08-2022</a></li>
                                        <li><a href="">19-08-2022</a></li>
                                        <li><a href="" class="all">Shiko të gjitha ›</a></li>
                                    </ul>
                                </div>
                                <div class="col-3 px-0">
                                    <ul class="subcategories-area" :class="{ subcategoriesFemra: category.name === 'FEMRA'}">
                                        <li v-for="(child_category, child_index) in category.children" :key="child_index">
                                            <router-link
                                                :to="{ name:'product.by.category', params: {slug: child_category.slug } }" class="title">{{ child_category.name }}
                                            </router-link>
                                            <div class="subcategories" v-if="child_category.children.length > 0">
                                                <router-link v-for="(children_category, cat_index) in child_category.children.slice(0, 4)" :key="cat_index" :to="{ name:'product.by.category', params: {slug: children_category.slug } }" >
                                                    <p class="category-name">{{children_category.name}}</p>
                                                </router-link>
                                                <router-link :to="{ name: 'product.by.category', params: { slug: child_category.slug } }" class="all">Shiko të gjitha ›</router-link>
                                            </div>
                                            <br v-else>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-2 px-0">
                                    <ul v-if="category.name === 'FEMRA' || category.name === 'MESHKUJ'" class="koleksione">
                                        <li class="title">KOLEKSIONE NË KLAUDIOFASHION</li>
                                        <li v-for="collection in collections.slice(0, 6)" :key="collection.id" class="mb-1">
                                            <a href="`${collection.slug}`" style="text-transform: uppercase;">{{ collection.name }}</a>
                                        </li>
                                        <hr style="width:85%; background: #F8F8FA; height: 0.5px;" />
                                    </ul>
                                    
                                </div>
                                <div class="col-3 last-col">
                                    <div v-for="(banner, index) in banners" :key="index">
                                        <a href="`${banner.link}`" v-if="(index == 1)"><img :src="`/images/banners/medium/${banner.image}`" class="navbar-banner"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="search ms-auto me-0"><input class="search-bar" type="text" placeholder="Kërko këtu"><img class="magnifying" src="/images/loop.png"></div>
        </nav>
    </div>
    <button @click="visible = !visible" v-if="visible" class="close-menu"><img :src="close"></button>
    <div class="menu-mobile" v-if="visible">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <ul class="menu-ul">
                        <li v-for="(category, i) in categories" :key="i" class="d-flex justify-content-start" :class="{active: category.id === selectedId}">
                            <router-link v-if="category.icon" :to="{ name:'product.by.category', params: {slug: category.slug } }" @click="visible = !visible"><div class="category-icon"><img :src="`/backend/assets/images/products/category/icons/${category.icon}`" alt=""></div></router-link>
                            <router-link :to="{ name:'product.by.category', params: {slug: category.slug } }" @click="visible = !visible"><p class="category-title">{{category.name}}</p></router-link>
                            <p class="arrow" @click="isActive(category.id)">›</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="submenu" v-for="(cat, i) in categories"  :key="i" :class="{active: cat.id === selectedId}" >
        <div class="d-flex first-row">
            <button @click="disActive(cat.id)"><img :src="back"></button>
            <p class="submenu-name">{{ cat.name }}</p>
            <button></button>
        </div>
        <div class="submenu-content">
            <div id="navbarIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#navbarIndicators" v-for="(slider, index) in sliders"
                            :key="index" :class="{active: index === 0}" :data-bs-slide-to="`${index}`" aria-current="true" aria-label="Slide 1">
                    </button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item" v-for="(slider, index) in sliders" :key="index" :class="{active: index === 0}" :data-bs-slide-to="`${index}`">
                        <a><img class="d-block w-100" v-bind:src="`/images/banners/large/${slider.bg_image}`" alt="First slide"></a>
                    </div>
                </div>
            </div>
            <div class="subcategory-area" v-for="(firstChild, x) in cat.children" :key="x">
                <p class="category-name" v-if="firstChild.children.length > 0"><router-link :to="{ name:'product.by.category', params: {slug: firstChild.slug } }"  @click="visible = !visible, disActive(cat.id)"> {{ firstChild.name }}</router-link></p>
                <p class="category-name" v-else><router-link :to="{ name:'product.by.category', params: {slug: firstChild.slug } }" @click="visible = !visible, disActive(cat.id)"> {{ firstChild.name }}</router-link></p>
                <div class="subcategories" v-if="firstChild.children.length > 0">
                    <router-link v-for="(secondChild, y) in firstChild.children" :to="{ name:'product.by.category', params: {slug: secondChild.slug } }" :key="y" @click="visible = !visible, disActive(cat.id)">
                        <div class="category-icon"><img :src="`/backend/assets/images/products/category/icons/${secondChild.icon}`" alt=""></div>
                        <p class="category-name">{{secondChild.name}}</p>
                    </router-link>
                </div>
                <div class="subcategories" v-else>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import heart from "/images/heart.gif"
import navbarBanner from "/images/navbar-banner.webp"
import logo from "../assets/halsalogo.svg"
import usericon from "../assets/user-icon.svg"
import shoppingbag from "../assets/shopping-bag.svg"
import wishlist from "../assets/heart.png"
import menu from "../assets/hamburger.png"
import close from "../assets/close.png"
import back from "../assets/chevron.png"
import home from "../assets/home.png"
import customerService from "../assets/customer-support.png"
import ModalView from "./dashboard-components/ModalView.vue"
import { useCartStore } from "../stores/Cart";
import { useRouter } from "vue-router";
import { useStore } from 'vuex'

export default {
    components: {
        ModalView,
    },
    data: function () {
        return {
            heart: heart,
            logo: logo,
            usericon: usericon,
            shoppingbag: shoppingbag,
            wishlist: wishlist,
            navbarBanner: navbarBanner,
            menu: menu,
            visible: false,
            close: close,
            back: back,
            home: home,
            customerService: customerService,
            categories: [],
            sliders:[],
            collections: [],
            selectedId: "",
        }
    },
    mounted(){
        this.getCategories();
        this.getBanners();
        this.getCollections();
    },
    methods: {
        getCategories(){
            this.loading = true;
            this.axios.get('/api/v1/all-categories').then((response) =>{
                this.loading = false;
                this.categories = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getBanners(){
            this.loading = true;
            this.axios.get('/api/v1/menu-banners').then((response) => {
                this.loading = false;
                this.banners = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getCollections() {
            this.loading = true;
            this.axios.get('/api/v1/collections').then((response) => {
                this.loading = false;
                this.collections = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        isActive(id) {
            this.selectedId = id;
        },
        disActive(id) {
            this.selectedId = 0;
        }
    },
    setup() {
        const cartStore = useCartStore()

        const router = useRouter();
        const store = useStore();

        function logout(){
            store.dispatch('removeToken');
            // localStorage.removeItem('token');
            router.push({name: 'home'})
        }
        return { cartStore, logout }
    },
}
</script>
<style>

nav .nav-links:hover, .nav-links:focus  {
border-bottom:2px solid black;
}
.cart-container {
    position: absolute;
    overflow: hidden;
    background-color: #fff;
    width: 150px;
    top: 70px !important;
    right: 0;
    max-height: 800px;
    margin-left: auto;
    z-index: 250;
    padding-bottom: 10px;
    box-shadow: -2px 7px 8px -4px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: -2px 7px 8px -4px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: -2px 7px 8px -4px rgba(0, 0, 0, 0.1);
}
.cart-container.profile-cart {
    height: 150px;
}
.cart-container ul hr {
    margin: 0;
}
.cart-container ul {
    list-style-type: none;
    padding: 5px 10px;
    text-align: left;
}
.cart-container ul li {
    padding:5px 0px;
    font-family: 'Rubik', sans-serif;
}
.cart-container ul li.user-name {
    font-weight: 500;
}
.cart-container ul li a {
    margin-left:0;
    padding:0;
}
aside.cart-container {
     display: none;
 }
.to-cart {
    height: 70px;
    display:flex;
    justify-content: center;
    align-items: center;
    position:relative;
}
body {
    width:100vw;
    overflow-x:hidden;
}
.overflow-menu {
    display: none;
    width:100vw;
    overflow:hidden;
}
.overflow-menu .navbar-nav {
    display: -webkit-box !important;
    background: #fff;
    overflow-x: auto;
    overflow-y: hidden;
    border-bottom:1px solid #F8F8FA;
}
.gif {
    height:20px;
    margin-top: -2px;
}
.first-col, .last-col {
    position:relative;
}
.first-col {
    text-align: right;
}
.first-col a::after {
    position: absolute;
    content: " ";
    height: 280px;
    width:1px;
    background: rgba(0, 0, 0, .1);
    right:0;
    top:15px;
}
.last-col a::before {
    position: absolute;
    content: " ";
    height: 280px;
    width: 1px;
    background: rgba(0, 0, 0, .1);
    left: 0;
    top: 15px;
}
@media(min-width:901px) {
    .menu-mobile, .bottom-icons {
        display:none !important;
    }
    .to-cart.link-cart:hover>aside.cart-cart,
    .to-user.to-cart:hover>aside.profile-cart {
        display: block !important;
    }
    .icons a:hover {
        background: #fff;
    }
    .icons a {
        padding: 0px 15px;
        position: relative;
    }
}
.menu-toggle {
    display:none;
}
.main {
    position: relative;
}
a {
    text-decoration: none !important;
}
.header {
    position:absolute;
    z-index:100;
    top:0;
    left:0;
}
.top-bar{
    width:100vw;
    height:45px;
    background-color:#000;
    vertical-align: middle;
    padding:.5% 5%;
}
.top-bar a, .top-bar a:hover {
    text-decoration: none;
    color:#fff;
}
.top-bar a h4 {
    font-size:1.2rem;
    font-family: 'Muli';
    font-weight:600;
    margin-bottom: 0;
}
.logo-bar {
    background-color: #F8F8FA;
    height:80px;
    padding:.5% 5% 0%;
}
.logo-bar .row {
    align-items: center;
}
.logo-bar .logo, .logo-bar .logo img {
    width:200px;
    height: auto;
    object-fit: cover;
}
.logo-bar h4 {
    color:#020202;
    font-weight: bold;
    font-family: 'Muli Bold', sans-serif;
    font-size: 1.8rem;
}
.logo-bar a{
    color: #666;
}
.logo-bar a:hover {
    color: #020202;
}
.navbar .search-bar {
    height: 40px;
    background-color: #f5f5f5;
    width:300px;
    padding:0% 4%;
    color:#B3B3B3;
    box-shadow: none !important;
    border:none;
    font-family: 'Muli Bold', sans-serif;
    font-size:.9rem;
    outline:none;
}
.navbar .search {
    position:relative;
}
.navbar .search .magnifying{
    position:absolute;
    right:4%;
    top:18px;
    width:15px;
    height:auto;
    color:#020202;
}
.navbar {
    align-items:center;
}
.icons a img {
    height:22px;
    width:auto;
}
.icons a span {
    font-family: 'Muli', sans-serif;
    font-size:1rem;
    font-weight:600;
    position:absolute !important;
    right:5px;
    top:15px;
    color:#020202;

}
.icons a .cart-span {
    font-family: 'Muli', sans-serif;
    font-size: 8px;
    font-weight:600;
    position:absolute !important;
    right:5px;
    top:15px;
    color: #fff;
    background: #D31621;
    width: 12px !important;
    height: 12px !important;
    display:flex;
    justify-content: center;
    align-items: center;
    border: 1px solid transparent;
    border-radius: 50%;    
}
nav.navbar, .first-nav {
    height:54px;
    background-color:#fff;
}
.navbar ul {
    background-color: #fff;
}
.icons button {
    border:0;
    background: transparent !important;
}
.navbar ul {
    padding: 0;
}
.navbar {
    box-shadow: -2px 7px 8px -4px rgba(0,0,0,0.1);
    -webkit-box-shadow: -2px 7px 8px -4px rgba(0,0,0,0.1);
    -moz-box-shadow: -2px 7px 8px -4px rgba(0,0,0,0.1);
    z-index:201;
    padding-top:0;
    padding-bottom:0;
    padding-left: 80px;
    padding-right: 80px;
}
.navbar .nav-item {
    padding: 1% 0%;
    border-bottom: 2px solid transparent;
}
.navbar-nav {
    display: flex !important;
    justify-content: center;
    flex-direction: row !important;
    align-items: center !important;
}
.nav-item, a.nav-link {
    color:#020202;
    font-size: 0.9rem;
    font-family: 'Muli' ,Arial,Helvetica,sans-serif!important;
    font-weight: normal;
    text-transform: uppercase;
    letter-spacing: -1px;
    width: max-content;
}
.nav-item:hover {
    border-bottom:2px solid #020202;
}
.nav-item.active .nav-link{
    color:#D31621 !important;
}
.subnav {
    display:none;
    padding:20px 150px !important;
    border-top: 1px solid #F8F8FA;
}
.nav-item:hover > .subnav {
    display:block;
    position:absolute;
    top:51px;
    left:0;
    right:0;
    z-index:200;
    width:100vw;
    height:350px;
    background: #fff;
}
.subnav .subcategories-area {
    display:flex;
    flex-direction: column;
    flex-wrap:wrap;
    height:320px;
}
.subnav .subcategories-area li, .subnav .subcategories-area li .category-name{
    text-transform: capitalize !important;
    max-width: 145px !important;
    word-break: normal !important;
}
.subnav ul {
    list-style-type: none;
}
.subnav ul li {
    font-family: 'Muli', sans-serif;
    font-size:0.8rem;
}
.subnav ul li.title, .subnav ul li a.title {
    font-weight:800;
    margin-bottom:0.9rem;
    color:#020202;
    text-transform: capitalize !important;
}
.subnav ul li a.all{
    margin-top:1rem;
    font-size: 0.7rem;
    font-weight: 400;
    margin-bottom: 1.5rem;
    color: #020202;
}
.subnav ul li a {
    font-weight:300;
    color:#020202;
    text-transform: capitalize;
}
.subnav .navbar-banner {
    width:230px;
    height:300px;
    object-fit:fill;
}
@media(max-width:1800px) {
    .subnav {
        padding:20px 200px !important;
    }
}
@media(max-width:1300px) {
    .subnav {
        padding:20px 150px !important;
    }
    .subnav ul li {
        font-size:0.9rem;
    }
}
@media(max-width:1150px) {
    .logo-bar {
        padding: .5% 4%;
    }
    .icons a img {
        height:18px;
        width:auto;
    }
    .logo-bar .logo {
        width:130px;
    }
    .logo-bar .search-bar {
        margin-top:8%;
    }
    .logo-bar .search .mdi-magnify{
        top:16px;
    }
    .subnav ul li {
        font-size:0.9rem;
    }
}
@media(max-width:900px) {
    .icons a .cart-span {
        font-size: 8px;
        color: #fff;
        background: #D31621;
        width: 12px !important;
        height: 12px !important;
        display:flex;
        justify-content: center;
        align-items: center;
        border: 1px solid transparent;
        border-radius: 50%;
        right: -10px;
        top: 15px;
    }
    .overflow-menu {
        display: block;
    }
    .top-bar a h4 {
        font-size:0.9rem;
    }
    .top-bar{
        padding:2.5% 2.5%;
    }
    .logo-bar {
        border-bottom:0.8px solid #e5e5e5;
        background: #fff;
    }
    .logo-bar .search-bar, .logo-bar .search .mdi-magnify, .logo-bar .first p, .navbar {
        display:none !important;
    }
    .logo-bar .col-3.third {
        display: block !important;
    }
    .logo-bar .logo img {
        width:150px;
        margin-top:5%;
    }
    .menu-toggle {
        display:block;
        width:20px;
    }
    .menu-toggle img {
        width:20px;
    }
    .menu-mobile {
        width:60vw;
        background:#fff;
        position:fixed;
        z-index:200;
        height:100vh;
        overflow-y: auto;
        top:0;
    }
    .close-menu {
        position:absolute;
        left:60vw;
        top:0;
        border:0;
        width:50px;
        height:50px;
        background: #000;
        z-index:200;
    }
    .close-menu img {
        width:20px;
        height:20px;
    }

    .menu-mobile button img, .submenu.active button img {
        width:10px;
    }
    .menu-mobile .category-icon, .submenu.active .subcategory-area .category-name .category-icon {
        width:45px;
        height:45px;
        border:1px solid #b3b3b3;
        border-radius: 50%;
        text-align: center;
        -webkit-box-shadow: 0px 0px 5px -1px #f5f5f5;
        box-shadow: 0px 0px 5px -1px #f5f5f5;
    }
    .menu-mobile ul {
        margin-top:60px;
    }
    .menu-mobile li {
        margin-bottom:20px;
    }
    .menu-mobile .category-icon img, .submenu.active .subcategory-area .category-name .category-icon img {
        width: auto;
        height:25px;
        margin-top:6px;
    }
    .submenu.active .subcategory-area .category-name.d-flex {
        align-items: center;
    }
    .submenu.active .subcategory-area .category-name.d-flex p  {
        margin-bottom:0;
        margin-left:10px;
        text-transform:uppercase;
    }
    .submenu.active .subcategory-area p.category-name a {
        text-transform: uppercase;
        color: #020202;
        font-family: 'Rubik', sans-serif;
        font-weight: 600;
    }
    .menu-mobile p.category-title {
        font-family: 'Muli', sans-serif;
        font-size:0.9rem;
        font-weight:400;
        margin-left:10px;
        margin-top: 10px;
        text-transform: uppercase;
        color: #020202;
    }
    .menu-mobile p.arrow {
        margin-left:auto;
        margin-right:0;
        font-size:1.4rem;
        font-family: 'Muli', sans-serif;
    }
    .bottom-icons {
        position: fixed;
        bottom:0;
        width:100%;
        border-top:1px solid #b3b3b3;
        padding:12px 0px;
        z-index:200;
        background: #fff;
    }
    .bottom-icons .single-icon {
        width:25%;
        text-align:center;
    }
    .logo-bar {
        padding: .5% 2%;
    }
    .menu-ul {
        padding-left:0;
    }
    .menu-ul .arrow a {
        color:#020202;
    }
    .submenu.active {
        display: block;
        position:fixed;
        z-index:500;
        background: #fff;
        top:0;
        bottom:0;
        left:0;
        right:0;
        height:100vh;
        width:80vw;
        overflow-y: auto;
    }
    .submenu.active .first-row {
        justify-content:space-between;
        height:40px;
        border-bottom:1px solid #e5e5e5;
        align-items: center;
    }
    .submenu.active .submenu-name {
        font-weight:bold;
        margin-bottom:0;
        text-transform: uppercase;
        font-family: 'Muli', sans-serif;
    }
    .submenu.active button {
        background: transparent;
        border:0;
        width:25px;
        height:25px;
    }
    .submenu.active .carousel-indicators button {
        background-color: #fff;
    }
    .submenu.active .submenu-content{
        padding:10px;
    }
    .submenu.active .subcategory-area {
        padding: 20px 0px;
    }
    .subcategory-area .subcategories {
        display:flex;
        flex-wrap: wrap;
        justify-content:start;
    }
    .subcategory-area .subcategories a {
        width: calc(100%/3);
    }
    .submenu.active .category-icon img {
        width: auto;
        height:75px;
        margin-top:6px;
        object-fit: scale-down;
        align-self: center;
    }
    .submenu.active .category-icon {
        width:85px;
        height:85px;
        border:0;
        border-radius: 0;
        text-align: center;
    }
    .submenu.active .category-name {
        line-height: 0.8rem;
    }
    .submenu.active a {
        text-align:center;
    }
    .submenu.active .submenu-content .carousel-inner, .submenu.active .submenu-content .carousel-inner .carousel-item img {
        height:150px;
    }
    .submenu.active .subcategory-area {
        border-bottom: 1px solid #e5e5e5;
    }
    .icons span {
        font-size:0.7rem;
    }
}
.submenu {
    display:none;
}
.category-name {
    color: #000;
    margin-bottom:0;
}
</style>
