<template>
    <div>
        <section class="all-products-intro">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="filters-mobile">
                            <div class="dropdown">
                                <button class="filter-button dropdown-toggle" id="dropdownRenditja"
                                    data-bs-toggle="dropdown" aria-expanded="false">Renditja</button>
                                <ul class="filter-dropdown-menu dropdown-menu" aria-labelledby="dropdownRenditja">
                                    <li><a class="dropdown-item" @change="sortTable($event)"
                                            :selected="selected === 'priceAsc'">Çmimi -
                                            nga më i ulëti tek më i larti</a></li>
                                    <li><a class="dropdown-item" @change="sortTable($event)"
                                            :selected="selected === 'priceDesc'">Çmimi -
                                            nga më i larti tek më i ulëti</a></li>
                                </ul>
                            </div>
                            <div class="dropdown" v-for="(attributeFilter, y) in attributesFilter" :key="y">
                                <button class="filter-button dropdown-toggle" id="`dropdown${attributeFilter.id}`"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ attributeFilter.name }}</button>
                                <ul class="filter-dropdown-menu dropdown-menu"
                                    aria-labelledby="`dropdown${attributeFilter.id}`">
                                    <li v-for="(attributeFilterValue, z) in attributeFilter.filterAttributeValues"
                                        :key="z">
                                        <input type="checkbox" :value="attributeFilterValue.id"
                                            v-model="attributesFilterArray" />
                                        <label>{{ attributeFilterValue.value }}</label>
                                    </li>
                                </ul>
                            </div>
                            <a class="filter-button" @click="showFilter = !showFilter; checkModal();">Filtra <img
                                    :src="filter" class="filter-icon"></a>
                        </div>
                        <p class="breadcrumbs"><a href="/">home</a> / <span v-html="breadcrumbs"></span></p>
                    </div>
                </div>
                <div class="row tags-row" v-if="categoryTags">
                    <div class="col-12">
                        <p class="page-title">Koleksioni i ri</p>
                        <div class="d-flex justify-content-start">
                            <button class="category-button" @click="activeTag = ''" :class="{ 'active': activeTag === '' }">Të Gjitha</button>
                            <button v-for="(uniqueTag, index) in categoryTags" :key="index"
                                @click="activeTag = uniqueTag.name"
                                :class="{ 'active': activeTag === uniqueTag.name }">{{ uniqueTag.name }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="filter-products">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-right p-0">
                        <div class="sort d-md-flex justify-content-end">
                            <label>Rendit sipas:</label>
                            <select name="" @change="sortTable($event)" v-model="key">
                                <option disabled value="">Përzgjidhni renditjen</option>
                                <option value="priceAsc" :selected="selected === 'priceAsc'"> Çmimi - nga më i ulëti
                                </option>
                                <option value="priceDesc" :selected="selected === 'priceDesc'"> Çmimi - nga më i larti
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row pt-0 pt-md-4">
                    <div class="col-sm-12 col-md-2">
                        <div class="filters">
                            <button class="remove-filters" @click="removeFilters()">Fshi të gjitha ({{
                                    categoriesArray.length +
                                    attributesFilterArray.length + sizes.length + colorsAttributes.length
                            }})</button>
                            <div class="accordion" id="accordionFilter">
                                <div class="accordion-item"> <!-- Categories -->
                                    <h2 class="accordion-header" id="headingCategory">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseCategory" aria-expanded="true"
                                            aria-controls="collapseCategory">Kategoria</button>
                                    </h2>
                                    <div id="collapseCategory" class="accordion-collapse collapse show"
                                        aria-labelledby="headingCategory" data-bs-parent="#accordionFilter">
                                        <div class="accordion-body">
                                            <ul>
                                                <li class="align-self-center" v-for="(category, i) in categories"
                                                    :key="i">
                                                    <div class="d-flex justify-content-start align-items-baseline">
                                                        <router-link :to="`/category/${category.slug}`">
                                                            <input type="checkbox" checked="true"
                                                                v-if="$route.params.slug === category.slug && this.checked == true"
                                                                :value="category.id" class="parentCategory"
                                                                @click="checked = true" />
                                                            <input type="checkbox" v-else :value="category.id"
                                                                class="parentCategory" @click="checked = true" />
                                                        </router-link>
                                                        <div class="accordion w-100" :id="`accordion${category.id}`">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    :id="`heading${category.id}`">
                                                                    <button
                                                                        class="accordion-button first-child collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        :data-bs-target="`#collapse${category.id}`"
                                                                        aria-expanded="false"
                                                                        :aria-controls="`#collapse${category.id}`">{{
                                                                                category.name
                                                                        }}</button>
                                                                </h2>
                                                                <div :id="`collapse${category.id}`"
                                                                    class="accordion-collapse collapse"
                                                                    :aria-labelledby="`heading${category.id}`"
                                                                    :data-bs-parent="`#accordion${category.id}`">
                                                                    <div class="accordion-body">
                                                                        <ul>
                                                                            <li class="align-self-center"
                                                                                v-for="(firstChild, j) in category.children"
                                                                                :key="j">
                                                                                <div
                                                                                    class="d-flex justify-content-start">
                                                                                    <input type="checkbox"
                                                                                        :value="firstChild.id"
                                                                                        v-model="categoriesArray"
                                                                                        @click="uncheckParent()" id="secondParent"/>
                                                                                    <div class="accordion w-100"
                                                                                        :id="`accordion${firstChild.id}`">
                                                                                        <div class="accordion-item">
                                                                                            <h2 class="accordion-header"
                                                                                                :id="`heading${firstChild.id}`">
                                                                                                <button
                                                                                                    class="accordion-button second-child collapsed"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="collapse"
                                                                                                    :data-bs-target="`#collapse${firstChild.id}`"
                                                                                                    aria-expanded="false"
                                                                                                    :aria-controls="`collapse${firstChild.id}`">{{
                                                                                                            firstChild.name
                                                                                                    }}</button>
                                                                                            </h2>
                                                                                            <div :id="`collapse${firstChild.id}`"
                                                                                                class="accordion-collapse collapse"
                                                                                                :aria-labelledby="`heading${firstChild.id}`"
                                                                                                :data-bs-parent="`#accordionExample${firstChild.id}`">
                                                                                                <div
                                                                                                    class="accordion-body">
                                                                                                    <ul>
                                                                                                        <li class="align-self-center"
                                                                                                            v-for="(secondChild, j) in firstChild.children"
                                                                                                            :key="j">
                                                                                                            <div
                                                                                                                class="d-flex justify-content-start">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    :value="secondChild.id"
                                                                                                                    v-model="categoriesArray" @click="uncheckSecondParent()" />
                                                                                                                <label>{{
                                                                                                                        secondChild.name
                                                                                                                }}</label>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item" v-for="(attributeFilter, y) in attributesFilter" :key="y">
                                    <!-- Material, Style -->
                                    <h2 class="accordion-header" :id="`headingTwo_${attributeFilter.id}`">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            :data-bs-target="`#collapseTwo_${attributeFilter.id}`" aria-expanded="true"
                                            :aria-controls="`collapseTwo_${attributeFilter.id}`">{{ attributeFilter.name
                                            }}</button>
                                    </h2>
                                    <div :id="`collapseTwo_${attributeFilter.id}`"
                                        class="accordion-collapse collapse show"
                                        :aria-labelledby="`headingTwo_${attributeFilter.id}`"
                                        data-bs-parent="#accordionFilter">
                                        <div class="accordion-body">
                                            <ul>
                                                <li class="align-self-center"
                                                    v-for="(attributeFilterValue, z) in attributeFilter.filterAttributeValues"
                                                    :key="z">
                                                    <div class="d-flex justify-content-start">
                                                        <input type="checkbox" :value="attributeFilterValue.id"
                                                            v-model="attributesFilterArray" /><label>{{
                                                                    attributeFilterValue.value
                                                            }}</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item" v-for="(attribute, c) in attributes" :key="c"> <!-- size -->
                                    <h2 class="accordion-header" :id="`headingFour_${attribute.id}`">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            :data-bs-target="`#collapseFour_${attribute.id}`" aria-expanded="true"
                                            :aria-controls="`collapseThree_${attribute.id}`">{{ attribute.name
                                            }}</button>
                                    </h2>
                                    <div :id="`collapseFour_${attribute.id}`" class="accordion-collapse collapse show"
                                        :aria-labelledby="`headingFour_${attribute.id}`"
                                        data-bs-parent="#accordionFilter">
                                        <div class="accordion-body">
                                            <ul class=" accordion-body-ul">
                                                <li class="align-self-center accordion-body-li"
                                                    v-for="(attributeValue, c) in attribute.values" :key="c">
                                                    <div class="d-flex justify-content-start">
                                                        <input type="checkbox" v-model="sizes"
                                                            :value="attributeValue.id" /><label>{{
                                                                    attributeValue.value
                                                            }}</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item"> <!-- colors -->
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseSix" aria-expanded="true"
                                            aria-controls="collapseThree">Ngyrat</button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse show"
                                        aria-labelledby="headingSix" data-bs-parent="#accordionFilter">
                                        <div class="accordion-body">
                                            <ul class=" accordion-body-ul">
                                                <li class="align-self-center accordion-body-li" v-for="(color, c) in colors" :key="c">
                                                    <div class="d-flex justify-content-start">
                                                        <input type="checkbox" v-model="colorsAttributes"
                                                            :value="color.id" /><label>{{ color.name
                                                            }}</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <PriceRange /> -->
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-10 p-0">
                        <div class="container-fluid">
                            <div class="row" v-if="products && products.length > 0">
                                <router-link class="product-card" v-for="(product, index) in computedProducts"
                                    :key="index" :to="`/product/${product.id}`">
                                    <!-- <img v-bind:src="product.thumbnail_path + product.thumbnail" alt="" class="product-image"> -->
                                    <div style="display:none;"> {{ thumbnail = product.thumbnail }} </div>
                                    <img :src="product.thumbnail_path + product.thumbnail" :alt="product.name"
                                        class="img-fluid" />
                                    <p class="product-name">{{ product.name }} </p>
                                    <p class="price">{{ product.price }} lekë</p>
                                    <div class="d-flex justify-content-start patterns" v-if="product.colors.length > 1">
                                        <div class="background" v-for="(stock, ind) in product.product_stocks"
                                            :key="ind">
                                            <div :style="`background:${stock.color_code}`" class="background-color"
                                                v-on:mouseover="product.thumbnail = stock.color_images[0], product.thumbnail_path = product.stocks_path">
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="filters-page" v-if="showFilter">
            <div class="d-flex first-row">
                <button @click="showFilter = !showFilter; checkModalFalse();" class="back"><img :src="back"></button>
            </div>
            <div class="filters-list">
                <button class="remove-filters" @click="removeFilters()">Fshi të gjitha ({{ categoriesArray.length +
                        attributesFilterArray.length + sizes.length + colorsAttributes.length
                }})</button>
                <div class="accordion" id="accordionFilter">
                    <div class="accordion-item"> <!-- Categories -->
                        <h2 class="accordion-header" id="headingCategory">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseCategory" aria-expanded="true"
                                aria-controls="collapseCategory">Kategoria</button>
                        </h2>
                        <div id="collapseCategory" class="accordion-collapse collapse show"
                            aria-labelledby="headingCategory" data-bs-parent="#accordionFilter">
                            <div class="accordion-body">
                                <ul>
                                    <li class="align-self-center" v-for="(category, i) in categories" :key="i">
                                        <div class="d-flex justify-content-start align-items-baseline">
                                            <router-link :to="`/category/${category.slug}`">
                                                <input type="checkbox" :value="category.id" class="parentCategory"
                                                    @click="showFilter = !showFilter; checkModalFalse();" />
                                            </router-link>
                                            <div class="accordion w-100" :id="`accordion${category.id}`">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" :id="`heading${category.id}`">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            :data-bs-target="`#collapse${category.id}`"
                                                            aria-expanded="false"
                                                            :aria-controls="`#collapse${category.id}`">{{ category.name
                                                            }}</button>
                                                    </h2>
                                                    <div :id="`collapse${category.id}`"
                                                        class="accordion-collapse collapse"
                                                        :aria-labelledby="`heading${category.id}`"
                                                        :data-bs-parent="`#accordion${category.id}`">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li class="align-self-center"
                                                                    v-for="(firstChild, j) in category.children"
                                                                    :key="j">
                                                                    <div class="d-flex justify-content-start">
                                                                        <input type="checkbox" :value="firstChild.id"
                                                                            v-model="categoriesArray" />
                                                                        <div class="accordion w-100"
                                                                            :id="`accordion${firstChild.id}`">
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header"
                                                                                    :id="`heading${firstChild.id}`">
                                                                                    <button
                                                                                        class="accordion-button collapsed"
                                                                                        type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        :data-bs-target="`#collapse${firstChild.id}`"
                                                                                        aria-expanded="false"
                                                                                        :aria-controls="`collapse${firstChild.id}`">{{
                                                                                                firstChild.name
                                                                                        }}</button>
                                                                                </h2>
                                                                                <div :id="`collapse${firstChild.id}`"
                                                                                    class="accordion-collapse collapse"
                                                                                    :aria-labelledby="`heading${firstChild.id}`"
                                                                                    :data-bs-parent="`#accordionExample${firstChild.id}`">
                                                                                    <div class="accordion-body">
                                                                                        <ul>
                                                                                            <li class="align-self-center"
                                                                                                v-for="(secondChild, j) in firstChild.children"
                                                                                                :key="j">
                                                                                                <div
                                                                                                    class="d-flex justify-content-start">
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        :value="secondChild.id"
                                                                                                        v-model="categoriesArray" />
                                                                                                    <label>{{
                                                                                                            secondChild.name
                                                                                                    }}</label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" v-for="(attributeFilter, y) in attributesFilter" :key="y">
                        <!-- Material, Style -->
                        <h2 class="accordion-header" :id="`headingTwo_${attributeFilter.id}`">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                :data-bs-target="`#collapseTwo_${attributeFilter.id}`" aria-expanded="true"
                                :aria-controls="`collapseTwo_${attributeFilter.id}`">{{ attributeFilter.name }}</button>
                        </h2>
                        <div :id="`collapseTwo_${attributeFilter.id}`" class="accordion-collapse collapse show"
                            :aria-labelledby="`headingTwo_${attributeFilter.id}`" data-bs-parent="#accordionFilter">
                            <div class="accordion-body">
                                <ul>
                                    <li class="align-self-center"
                                        v-for="(attributeFilterValue, z) in attributeFilter.filterAttributeValues"
                                        :key="z">
                                        <div class="d-flex justify-content-start">
                                            <input type="checkbox" :value="attributeFilterValue.id"
                                                v-model="attributesFilterArray" /><label>{{ attributeFilterValue.value
                                                }}</label>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" v-for="(attribute, c) in attributes" :key="c"> <!-- size -->
                        <h2 class="accordion-header" :id="`headingFour_${attribute.id}`">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                :data-bs-target="`#collapseFour_${attribute.id}`" aria-expanded="true"
                                :aria-controls="`collapseFour_${attribute.id}`">{{ attribute.name }}</button>
                        </h2>
                        <div :id="`collapseFour_${attribute.id}`" class="accordion-collapse collapse show"
                            :aria-labelledby="`headingFour_${attribute.id}`" data-bs-parent="#accordionFilter">
                            <div class="accordion-body">
                                <ul>
                                    <li class="align-self-center" v-for="(attributeValue, c) in attribute.values"
                                        :key="c">
                                        <div class="d-flex justify-content-start">
                                            <input type="checkbox" v-model="sizes"
                                                :value="attributeValue.id" /><label>{{ attributeValue.value
                                                }}</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item"> <!-- colors -->
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="true"
                                aria-controls="collapseSix">Ngyrat</button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix"
                            data-bs-parent="#accordionFilter">
                            <div class="accordion-body">
                                <ul>
                                    <li class="align-self-center" v-for="(color, c) in colors" :key="c">
                                        <div class="d-flex justify-content-start">
                                            <input type="checkbox" v-model="colorsAttributes"
                                                :value="color.id" /><label>{{ color.name
                                                }}</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <BottomIcons />
    </div>
</template>
<script>
import PriceRange from "./all-products-components/PriceRange.vue";
import right from "../assets/Polygon2.png"
import BottomIcons from "./dashboard-components/BottomIcons.vue";
import back from "../assets/chevron.png";
import filter from "../assets/filter.png";
export default {
    components: {
        PriceRange,
        BottomIcons
    },
    el: "#app",
    data() {
        return {
            selected: '',
            filter: filter,
            back: back,
            sort: '',
            key: '',
            right: right,
            showSort: false,
            showFilter: false,
            showMaterial: false,
            showStyle: false,
            categoriesArray: [],
            colorsAttributes: [],
            keyword: "",
            sizes: [],
            sortByPrice: "price",
            sortByPriceReverse: "price",
            sortBy: "name",
            loading: false,
            products: [],
            categories: [],
            attributesFilter: [],
            attributesFilterArray: [],
            attributes: [],
            colors: [],
            breadcrumbs: null,
            activeTag: '',
            categoryTags: '',
            checked: true,
        }
    },
    watch: {
        $route(to, from) {
            let self = this;
            self.categoryProducts();
        }
    },
    computed: {
        computedProducts() {
            const includesAny = (arr, values) => values.some(v => arr.includes(v));
            return this.products.filter((item) => {
                return (
                    (this.attributesFilterArray.length === 0 || includesAny(this.attributesFilterArray, item.filter_attribute_id)) &&
                    (this.categoriesArray.length === 0 || (this.categoriesArray.includes(item.category.id) && this.categoriesArray.includes(item.category.parent_id)) || 
                        this.categoriesArray.includes(item.category.id)) &&
                    (this.sizes.length === 0 || includesAny(this.sizes, item.selected_variants_ids)) &&
                    (this.activeTag === '' || item.tags.includes(this.activeTag)) &&
                    (this.colorsAttributes.length === 0 || includesAny(this.colorsAttributes, item.colors_attributes))
                );
            });
        },
    },
    mounted() {
        this.getCategories();
        this.getFilterAttribute();
        this.getAttribute();
        this.getColor();
        this.categoryProducts();
    },
    methods: {
        uncheckSecondParent() {
            document.getElementById('secondParent').removeAttribute('checked');
        },
        uncheckParent() {
            this.checked = false;
        },
        checkModal() {
            document.querySelector("body").style.overflow = "hidden";
        },
        checkModalFalse() {
            document.querySelector("body").style.overflow = "inherit";
        },
        categoryProducts() {
            document.querySelector(".overflow-menu").style.display = "none";
            this.loading = true;
            this.axios.get('/api/v1/category/products/' + this.$route.params.slug).then((response) => {
                this.loading = false;
                this.products = response.data.categoryProducts;
                this.breadcrumbs = response.data.categoryDetails.breadcrumbs;
                document.title = response.data.categoryDetails.catDetails.name;
                if (response.data.uniqueTags) {
                    this.categoryTags = response.data.uniqueTags;
                }
            }).catch((error) => {
                this.loading = false;
            })
        },
        removeFilters() {
            this.categoriesArray.length = 0;
            this.attributesFilterArray.length = 0;
        },
        getFilterAttribute() {
            this.loading = true;
            this.axios.get('/api/v1/filter-attributes').then((response) => {
                this.loading = false;
                this.attributesFilter = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getAttribute() {
            this.loading = true;
            this.axios.get('/api/v1/attributes').then((response) => {
                this.loading = false;
                this.attributes = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getColor() {
            this.loading = true;
            this.axios.get('/api/v1/colors').then((response) => {
                this.loading = false;
                this.colors = response.data.data;
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
        sortTable(event) {
            if (event.target.value == 'priceAsc') {
                var key = 'price';
                var direction = 'asc';
                this.sort = `${key} > ${direction}`
                if (direction === 'asc') {
                    this.products.sort((a, b) => a[key] > b[key] ? 1 : -1)
                } else {
                    this.products.sort((a, b) => a[key] < b[key] ? 1 : -1)
                }
            } else if (event.target.value == 'priceDesc') {
                this.sort = `${key} > ${direction}`
                if (direction === 'desc') {
                    this.products.sort((a, b) => a[key] < b[key] ? 1 : -1)
                } else {
                    this.products.sort((a, b) => a[key] < b[key] ? 1 : -1)
                }
            }
        }
    }
};
</script>
<style>
.tags-row button.active {
    border: 1px solid #020202 !important;
    position: relative;
    color: #020202;
}

.tags-row button.active::before {
    content: '';
    font-size: 0.6rem;
    color: #fff;
    width: 0;
    height: 0;
    border: 20px solid transparent;
    border-right: 0;
    border-top: 20px solid #000;
    position: absolute;
    top: 0;
    right: 0;
}

.tags-row button.active::after {
    content: '\00D7';
    position: absolute;
    color: #fff;
    top: -3px;
    font-weight: 200;
    font-size: 0.8rem;
    right: 2px;
}

.filters-mobile {
    display: none !important;
}

.all-products-intro {
    padding: 210px 80px 0px;
}

.breadcrumbs a {
    text-transform: uppercase;
    font-family: 'Muli', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 1px;
    color: #020202;
}

.tags-row {
    background-color: #f5f5f5;
    padding: 20px;
}

.tags-row .page-title {
    font-family: 'Rubik', sans-serif;
    font-weight: 800;
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

.tags-row button {
    background-color: #fff;
    padding: 5px 10px;
    font-size: 0.8rem;
    font-family: 'Muli', sans-serif;
    font-weight: normal;
    margin-right: 20px;
    border: 1px solid #b3b3b3;
    color: #666;
}

.tags-row button:hover {
    border: 1px solid #020202;
}

.filter-products {
    padding: 40px 80px;
}

::-webkit-scrollbar {
    width: 5px;
}

::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: #b3b3b3;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #b3b3b3;
}

.remove-filters {
    background-color: #f5f5f5;
    padding: 10px 20px;
    color: #020202;
    border: 1px solid #020202;
    width: 100%;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    font-size: 1rem;
}

.accordion-item {
    background: #fff;
    border: 0px !important;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
    font-size: 0.9rem;
}

.accordion-item .accordion-button {
    background-color: transparent !important;
    color: #020202 !important;
    border: 0px !important;
    box-shadow: none !important;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    font-size: 0.9rem;
}

.accordion-item ul {
    list-style-type: none;
    padding: 0;
}

.accordion-body {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    margin-bottom: 10px;
}
.accordion-body-ul{
    display:flex;
    flex-wrap: wrap;
}
.accordion-body-li{
    width:33.3%;
}
.accordion-item ul li input,
.filter-dropdown-menu input {
    -webkit-appearance: none;
    margin-right: 10px;
    background-color: #fafafa;
    border: 1px solid #B3B3B3;
    border-radius: 50%;
    width: 13px;
    height: 13px;
}

.accordion-item ul li input:checked,
.filter-dropdown-menu input:checked {
    background-color: #020202;
}

.accordion-item ul li button {
    margin-top: -3px;
}

.accordion-item ul li label {
    margin-top: -5px;
    font-size: 0.8rem;
    font-weight: 400;
}

.accordion-item ul li .accordion-body ul {
    margin-top: 15px;
}

.accordion-item ul li {
    margin-bottom: 5px;
}

.sort label {
    font-family: 'Muli', sans-serif;
    font-size: 0.8rem;
    font-weight: 400;
    margin-top: 7px;
    margin-right: 15px;
}

.sort select {
    height: 40px;
    background: transparent;
    border: 1px solid #b3b3b3;
    color: #020202;
    font-size: 0.8rem;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
    padding: 5px 10px;
}

.sort select:focus {
    border: 1px solid #020202;
    border-radius: 0;
    outline: none;
}

.product-card {
    margin-bottom: 20px;
}

.product-card img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    object-position: 50% 0%;
}

.product-card .product-name {
    font-size: 0.9rem;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
    margin-bottom: 0;
    color: #767676;
    height: 1.4rem;
    width: 100%;
    word-break: normal;
    overflow: hidden;
    text-transform: capitalize;
    padding-top:6px;
}
.product-card .product-name:hover {
    color: #000000;
}
.product-card .price {
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 800;
    margin-bottom: 0;
    color: #020202;
}

.product-card .patterns .background {
    cursor: pointer;
    width: 25px;
    height: 25px;
    object-fit: cover;
    border: 1px solid #020202;
    border-radius: 50%;
    text-align: center;
    padding: 0;
    margin-right: 10px;
    -webkit-box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
    box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
    margin-bottom: 5px;
}

.product-card .patterns .background img {
    width: 23px;
    height: 23px;
    object-fit: cover;
    border: 2px solid #fff;
    border-radius: 50%;
    vertical-align: baseline;
}

.product-card {
    width: 20% !important;
}

@media(max-width:1800px) {
    .all-products-intro {
        padding: 190px 60px 0px;
    }

    .filter-products {
        padding: 40px 60px;
    }

    .product-card img {
        height: 300px;
    }

    .product-card {
        width: 25% !important;
        margin-bottom: 20px;
    }
}

@media(max-width:1600px) {
    .all-products-intro {
        padding: 190px 40px 0px;
    }

    .filter-products {
        padding: 40px;
    }
}

@media(max-width:1400px) {
    .all-products-intro {
        padding: 190px 30px 0px;
    }

    .filter-products {
        padding: 30px;
    }

    .remove-filters {
        padding: 5px 10px;
    }

    .accordion-button,
    .accordion-body {
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin-bottom: 0;
    }

    .product-card img {
        height: 280px;
    }
}

.accordion-item .accordion-button.first-child,
.accordion-item .accordion-button.second-child {
    font-weight: 400;
}

@media(max-width:1200px) {
    .accordion-item ul li label {
        font-size: 0.8rem;
        margin-left: -6px;
        margin-top: -3px;
    }

    .accordion-item .accordion-button {
        font-size: 0.9rem;
    }

    .product-card img {
        height: 220px !important;
    }

    .product-card {
        width: 33% !important;
        margin-bottom: 20px;
    }
}

@media(max-width:1000px) {
    .mobile-footer {
        padding-bottom: 40px;
    }

    .all-products-intro {
        padding: 125px 0px 0px;
    }

    .all-products-intro .breadcrumbs {
        margin-bottom: 0;
    }

    .filter-products .col-md-2,
    .tags-row,
    .sort {
        display: none !important;
    }

    .product-card {
        width: 50% !important;
        margin-bottom: 20px;
    }

    .product-card .col-md-10 {
        padding: 0;
    }

    .product-card img.product-image {
        height: 220px !important;
    }

    .all-products-intro .col-12 {
        padding: 0;
    }

    .filters-mobile {
        display: flex !important;
        position: relative;
        border-bottom: 1px solid #f5f5f5;
        padding: 10px;
        justify-content: space-between;
        background: #fff;
    }

    .filters-page button.back {
        background: transparent;
        border: 0;
        width: 25px;
        height: 25px;
    }

    .filters-page {
        width: 100vw;
        height: 100vh;
        overflow-y: auto;
        overflow-x: hidden;
        background: #fff;
        z-index: 200;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 10px;
    }

    .filters-list {
        margin-top: 20px;
    }

    .filter-products {
        padding: 20px 0px;
    }

    .filter-button.show {
        font-weight: 500 !important;
    }

    .filter-button .filter-icon {
        width: 13px;
    }

    .dropdown-item {
        padding-left: 0;
    }

    .filter-dropdown-menu {
        width: 100vw;
        position: absolute;
        top: 45px;
        left: 0;
        right: 0;
        z-index: 150;
        border-radius: 0;
        padding-left: 10px;
        background: #fff;
    }

    .filter-dropdown-menu ul {
        list-style-type: none;
        text-align: left;
        font-family: 'Rubik', sans-serif;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 0;
    }

    .breadcrumbs {
        padding: 5px 10px;
    }

    .filter-dropdown-menu ul a {
        color: #020202;
    }

    .filter-dropdown-menu ul li {
        height: 35px;
        border-bottom: 1px solid #f5f5f5;
        padding: 5px 15px;
    }

    .filters-mobile .filter-button {
        text-align: center;
        color: #020202;
        font-family: 'Rubik', sans-serif;
        font-size: 0.9rem;
        font-weight: 300;
        border: 0;
        background: transparent;
        align-items: center;
        display: flex;
    }

    .filters-page .remove-filters {
        font-weight: 500;
    }

    .filters-page .accordion-item .accordion-button,
    .filters-mobile .filter-dropdown-menu ul li {
        font-weight: 300;
    }
}

.filters li .accordion-button,
.filters li .accordion-body,
.filters-page li .accordion-button,
.filters-page li .accordion-body {
    padding: 0 !important;
}

.filters .accordion-button.collapsed::after,
.filters-page .accordion-button.collapsed::after {
    background-image: url('../assets/plus.png') !important;
}

.filters .accordion-button:not(.collapsed)::after,
.filters-page .accordion-button:not(.collapsed)::after {
    background-image: url('../assets/remove.png') !important;
    opacity: 1;
}

.filters .accordion-button:not(.collapsed)::after,
.filters .accordion-button.collapsed::after,
.filters-list .accordion-button:not(.collapsed)::after,
.filters-list .accordion-button.collapsed::after {
    width: 7px !important;
    height: 7px !important;
    background-size: 7px !important;
}
</style>