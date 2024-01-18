<template>
    <div class="single-product-body">
        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <p class="breadcrumbs"><a href="/">Home</a> / <a :href="`/category/${product.category_slug}`"> {{
        product.category_name
}}</a> / <a>{{ product.name }}</a></p>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div id="vue-slider" class="single-product-slider">
                            <div class="pictures" v-if="selectedImages.length > 0">
                                <div v-for="(picture, index) in selectedImages" :key="index" class="pictures-single">
                                    <img :src="`../images/admin_variant_images/${picture}`"
                                        @click="Picturethumbnail = picture, product.image_path = product.small_path" />
                                </div>
                            </div>
                            <div class="pictures" v-else>
                                <div v-for="(picture, index) in product.images" :key="index" class="pictures-single">
                                    <img v-if="index == 0" :src="`../images/admin_products/medium/${picture}`"
                                        @click="product.thumbnail = picture, product.image_path = '../images/admin_products/medium/'" />
                                    <img v-else :src="`../images/product_gallery/${picture}`"
                                        @click="product.thumbnail = picture, product.image_path = '../images/product_gallery/'" />
                                </div>
                            </div>
                            <div class="main-picture-area">

                                <div class="picture" v-if="selectedImages.length > 0">
                                    <img :src="(product.small_path + Picturethumbnail)" />
                                </div>
                                <div class="picture" v-else>
                                    <img :src="product.image_path + product.thumbnail" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="product-description">
                            <p class="product-name"> {{ product.name }}</p>
                            <!-- <div class="rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div> -->
                            <p class="availability">Gjendja:
                                <span v-if="this.productStock > 0">Në Stok</span>
                                <span v-else>Jashtë stok</span>
                            </p>
                            <p class="availability">SKU:
                                <span v-if="product.has_variant == 1">{{ this.productSku }}</span>
                                <span v-else>{{ product.sku }}</span>
                            </p>
                            <div class="price">
                                <p class="new-price">{{ this.productPrice }} Lekë</p>
                                <p class="old-price" v-if="this.oldPrice !== ''">{{ this.oldPrice }} Lekë</p>
                                <div class="percentage" v-if="this.special_discount != ''">
                                    <p>-{{ this.special_discount }}%</p>
                                </div>
                            </div>
                            <div class="flash-sale" v-if="this.hasFlashsale != 0">
                                <div class="name"><img :src="flash">
                                    <p>Ulje e shpejtë</p>
                                </div>
                                <div class="countdown">
                                    <p>Mbaron për</p>
                                    <p class="countdown-time">
                                        <vue-countdown
                                            :time="new Date(this.FlashSaleEnd) - new Date(this.FlashSaleStart)"
                                            v-slot="{ days, hours, minutes, seconds }">
                                            <span v-if="days > 0">{{ days }}</span>:<span>{{ hours }}</span>:<span>{{
        minutes
}}</span>:<span>{{
        seconds
}}</span>
                                        </vue-countdown>
                                    </p>
                                    <a :href="`../flash-sale/${this.FlashSaleUrl}`" style="color: #000;">›</a>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div v-if="this.productColorCount !== 0">
                                <div class="attribute-info">
                                    <p class="attribute-title">Ngjyra:</p>
                                    <p class="attribute-option" v-html='selectedPattern'></p>
                                </div>
                                <div class="patterns">
                                    <div class="background" v-for="(color, index) in getUniques" :key="index"
                                        :class="{ active: color.color_name === selectedPattern }"
                                        @click="activePattern(color.color_name), productColor(color.color_id, color.color_code), changePictures(color.color_images), changeMainPicture(color.color_images)">
                                        <div :style="`background:${color.color_code}`" class="background-color"></div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="this.productSizeCount !== 0">
                                <div class="attribute-info">
                                    <p class="attribute-title">Masa:</p>
                                </div>
                                <div class="sizes">
                                    <div class="size-box" v-for="(size, index) in product.sizes" :key="index"
                                        :style="{ cursor: this.availableColorSizeStyle(size.id) }"
                                        :class="{ active: size.value === selectedSize }"
                                        @click="isActive(size.value), productSize(size.id, size.value)">
                                        <p>{{ size.value }}</p>
                                    </div>
                                </div>
                                <div class="size-guide accordion" id="size">
                                    <div class="accordion-item" v-if="product.size_guide !== ''">
                                        <h2 class="accordion-header" id="headingGuide">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseGuide"
                                                aria-expanded="false" aria-controls="collapseGuide"><img
                                                    :src="sizeIcon">
                                                <a>Udhëzues për masën</a>
                                            </button>
                                        </h2>
                                        <div id="collapseGuide" class="accordion-collapse collapse"
                                            aria-labelledby="headingGuide" data-bs-parent="#size">
                                            <div class="accordion-body">
                                                <div class="size-guide-table">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Masa</th>
                                                                <th>Shpatulla</th>
                                                                <th>Gjatësia</th>
                                                                <th>Mëngët</th>
                                                                <th>Busti</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="product_size in product.size_guide"
                                                                :key="product_size.guide_id">
                                                                <td class="size-slang">{{ product_size.size }}</td>
                                                                <td>{{ product_size.shoulder }}</td>
                                                                <td>{{ product_size.length_tops }}</td>
                                                                <td>{{ product_size.sleeve_length }}</td>
                                                                <td>{{ product_size.bust }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="add-to-cart" @click="addToCart">SHTO NË SHPORTË</button>
                            <div class="shipping-information">
                                <div class="delivery"><img :src="delivery"></div>
                                <p><span>Dërgesa</span><br>Dërgesa kudo në Shqipëri 300 lekë. Transport edhe në Kosovë
                                    vetëm 3€.</p>
                            </div>
                            <div class="shipping-information">
                                <div class="delivery"><img :src="returnpolicy"></div>
                                <p><span>Politikat e kthimit të produktit</span><br><a href="">Mësoni më shumë</a></p>
                            </div>
                            <div class="accordion" id="description">
                                <div class="accordion-item" v-if="product.filter_attribute_id">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            Përshkrimi
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#description">
                                        <div class="accordion-body">
                                            <table>
                                                <tbody>
                                                    <tr v-for="(description, index) in product.filter_attribute_id"
                                                        :key="index">
                                                        <th>{{ description.attribute_name }}:</th>
                                                        <td>{{ description.attribute_value }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <p class="reviews-title">Reçensione Klientësh (115)</p>
                    <div class="reviews-overview">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <p class="overview-title">Vlerësimi Mesatar</p>
                                    <div class="rating-overview">
                                        <div class="rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <p class="rating-value">3.0</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <p class="overview-title">A ju rrinin mirë?</p>
                                    <div class="progress-bar">
                                        <p>Të vogla</p>
                                        <div class="shell">
                                            <div class="bar" :style="{ width: progressVogla + '%' }">
                                            </div>
                                        </div>
                                        <p>{{ progressVogla }}%</p>
                                    </div>
                                    <div class="progress-bar">
                                        <p>Fiks</p>
                                        <div class="shell">
                                            <div class="bar" :style="{ width: progressFiks + '%' }">
                                            </div>
                                        </div>
                                        <p>{{ progressFiks }}%</p>
                                    </div>
                                    <div class="progress-bar">
                                        <p>Të mëdha</p>
                                        <div class="shell">
                                            <div class="bar" :style="{ width: progressMedha + '%' }">
                                            </div>
                                        </div>
                                        <p>{{ progressMedha }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-0">
                        <div class="filter-reviews">
                            <p class="all-reviews">Gjithe Recensionet (200)</p>
                            <div class="filter">
                                <p>Vlerësimet</p>
                                <select name="stars">
                                    <option value="all-stars">Të gjitha</option>
                                    <option value="5">5 yje</option>
                                    <option value="4">4 yje</option>
                                    <option value="3">3 yje</option>
                                    <option value="2">2 yje</option>
                                    <option value="1">1 yje</option>
                                </select>
                            </div>
                            <div class="filter">
                                <p>Ngjyra</p>
                                <select name="stars">
                                    <option value="all-colors">Të gjitha ngjyrat</option>
                                    <option value="kuqe"></option>
                                    <option value="zeze"></option>
                                </select>
                            </div>
                            <div class="filter">
                                <p>Masa</p>
                                <select name="stars">
                                    <option value="all-sizes">Të gjitha</option>
                                    <option value="small">S</option>
                                    <option value="medium">M</option>
                                    <option value="large">L</option>
                                    <option value="extralarge">XL</option>
                                </select>
                            </div>
                            <div class="filter">
                                <p>Renditja</p>
                                <select name="stars">
                                    <option value="recommend">Rekomanduar</option>
                                    <option value="newest">Më të rejat</option>
                                    <option value="oldest">Më të vjetrat</option>
                                </select>
                            </div>
                        </div>
                        <hr class="review-line" />
                        <ReviewList />
                    </div>
                </div> -->
                <div class="row single-last-banner">
                    <div class="col p-0" v-if="productCollections.length === 1">
                        <img v-for="collection in product.collections" :key="collection.id"
                            :src="`../images/collections/banner/${collection.image}`" alt="{{ collection.name }}"
                            class="last-banner-img">
                    </div>
                    <div class="col-6 mb-2" v-else v-for="collection in productCollections.slice(0, 2)"
                        :key="collection.id">
                        <img :src="`../images/collections/banner/${collection.image}`" alt="{{ collection.name }}"
                            class="last-banner-img">
                    </div>
                </div>
                <div class="row">
                    <div class="col p-0">
                        <p class="related-title">Klientëve u kanë pëlqyer edhe këto</p>
                        <div class="container-fluid p-0">
                            <div class="row related">
                                <div class="col-sm-6 col-md-3" v-for="related in product.up_selling_products"
                                    :key="related.relatedId">
                                    <div class="product-card">
                                        <img :src="`../images/admin_products/medium/${related.thumbnail}`" />
                                        <p class="product-name">{{ related.name }}</p>
                                        <p class="price">{{ related.price }} Lekë</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col text-center">
                                    <button class="view-more">Më Shumë</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="single-product-mobile">
        <div class="container-fluid p-0">
            <div class="row p-0 m-0 w-100">
                <div class="col p-0 single-slider">
                    <swiper class="carousel__item swiper" :space-between="0"
                        :breakpoints="swiperSingleOptions.breakpoints" v-if="selectedImages.length > 0">
                        <swiper-slide class="product-img swiper" v-for="(picture, index) in selectedImages"
                            :key="index">
                            <img :src="`../images/admin_variant_images/${picture}`" alt=""
                                class="img-fluid mainImage" />
                        </swiper-slide>
                    </swiper>
                    <swiper class="carousel__item swiper" :space-between="0"
                        :breakpoints="swiperSingleOptions.breakpoints" v-else>
                        <swiper-slide class="product-img swiper" v-for="(picture, index) in product.images"
                            :key="index">
                            <img :src="`../images/product_gallery/${picture}`" alt="" class="img-fluid mainImage" />
                        </swiper-slide>
                    </swiper>

                    <div class="flash-sale" v-if="this.hasFlashsale != 0">
                        <div class="name"><img :src="flash">
                            <p>Ulje e shpejtë</p>
                        </div>
                        <div class="countdown">
                            <p>Mbaron për</p>
                            <p class="countdown-time">
                                <vue-countdown :time="new Date(this.FlashSaleEnd) - new Date(this.FlashSaleStart)"
                                    v-slot="{ days, hours, minutes, seconds }">
                                    <span v-if="days > 0">{{ days }}</span>:<span>{{ hours }}</span>:<span>{{ minutes
}}</span>:<span>{{ seconds }}</span>
                                </vue-countdown>
                            </p>
                            <a :href="`../flash-sale/${this.FlashSaleUrl}`" style="color: #000;">›</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row details">
                <div class="col px-4">
                    <p class="product-name">{{ product.name }}</p>
                    <p class="availability">SKU:
                        <span v-if="product.has_variant == 1">{{ this.productSku }}</span>
                        <span v-else>{{ product.sku }}</span>
                    </p>
                    <div class="price">
                        <p class="new-price">{{ this.productPrice }} Lekë</p>
                        <p class="old-price" v-if="this.oldPrice !== ''">{{ this.oldPrice }} Lekë</p>
                        <div class="percentage" v-if="this.special_discount != ''">
                            <p>-{{ this.special_discount }}%</p>
                        </div>
                    </div>
                    <!-- <div class="d-flex">
                        <div class="rating ml-auto">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p class="ml-1 mr-1 rating-number">(14)</p>
                    </div> -->
                    <div v-if="this.productColorCount !== 0">
                        <div class="attribute-info">
                            <p class="attribute-title">Ngjyra:</p>
                            <p class="attribute-option" v-html='selectedPattern'></p>
                        </div>
                        <div class="patterns">
                            <div class="background" v-for="(color, index) in getUniques" :key="index"
                                :class="{ active: color.color_name === selectedPattern }" :data-index="index"
                                @click="activePattern(color.color_name), productColor(color.color_id, color.color_code), changePictures(color.color_images), changeMainPicture(color.color_images)">
                                <div :style="`background:${color.color_code}`" class="background-color"></div>
                            </div>
                        </div>
                    </div>

                    <div v-if="this.productSizeCount !== 0">
                        <div class="attribute-info">
                            <p class="attribute-title">Masa</p>
                        </div>
                        <div class="sizes">
                            <div class="size-box" v-for="(size, index) in product.sizes" :key="index"
                                :style="{ cursor: this.availableColorSizeStyle(size.id) }"
                                :class="{ active: size.value === selectedSize }"
                                @click="isActive(size.value), productSize(size.id, size.value)">
                                <p>{{ size.value }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shippings">
                <div class="col">
                    <div class="shipping-information">
                        <div class="delivery"><img :src="delivery"></div>
                        <p><span>Dërgesa</span><br>Dërgesa kudo në Shqipëri 300 lekë. Transport edhe në Kosovë vetëm 3€.
                        </p>
                    </div>
                    <hr />
                    <div class="shipping-information">
                        <div class="delivery"><img :src="returnpolicy"></div>
                        <p><span>Politikat e kthimit të produktit</span><br><a href="">Mësoni më shumë</a></p>
                    </div>
                </div>
            </div>
            <!-- <div class="row promotion">
                <div class="col-12">
                    <div class="promotion-link">
                        <p>Në Promocion</p>
                        <a href="">›</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="promotion-name">
                        <img :src="tag">
                        <p>ulje të shpejta</p>
                    </div>
                </div>
            </div> -->
            <div class="row description-size">
                <div class="col-12">
                    <div class="description">
                        <div class="accordion w-100" id="description1">
                            <div class="accordion-item" v-if="product.filter_attribute_id">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Përshkrimi
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#description1">
                                    <div class="accordion-body">
                                        <table>
                                            <tbody>
                                                <tr v-for="(description, index) in product.filter_attribute_id"
                                                    :key="index">
                                                    <th>{{ description.attribute_name }}:</th>
                                                    <td>{{ description.attribute_value }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="size">
                        <a class="first" @click="visibleGuide = !visibleGuide; scrollToTop();">Udhëzime për masën</a>
                        <a class="last" @click="visibleGuide = !visibleGuide; scrollToTop();">›</a>
                    </div>
                </div>
            </div>
            <div class="row collection" v-if="productCollections.length > 0">
                <div class="col-12" v-for="collection in productCollections.slice(0, 2)" :key="collection.id">
                    <a class="d-flex justify-content-start" :href="`../collection/${collection.slug}`">
                        <img :src="`../images/collections/icon/${collection.icon}`">
                        <p><span>{{ collection.name }}</span><br>
                            {{ collection.description }}</p>
                    </a>
                </div>
            </div>
            <!-- <div class="row reviews-mobile">
                <div class="col-12">
                    <p class="title">Reçensione (50)</p>
                    <div class="review-details">
                        <div class="rating-overview">
                            <p class="rating-value">3.0</p>
                            <div class="rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <p class="overview-title">A ju rrinin mirë?</p>
                        <div class="progress-bar">
                            <p>Të vogla</p>
                            <div class="shell">
                                <div class="bar" :style="{ width: progressVogla + '%' }">
                                </div>
                            </div>
                            <p>{{ progressVogla }}%</p>
                        </div>
                        <div class="progress-bar">
                            <p>Fiks</p>
                            <div class="shell">
                                <div class="bar" :style="{ width: progressFiks + '%' }">
                                </div>
                            </div>
                            <p>{{ progressFiks }}%</p>
                        </div>
                        <div class="progress-bar">
                            <p>Të mëdha</p>
                            <div class="shell">
                                <div class="bar" :style="{ width: progressMedha + '%' }">
                                </div>
                            </div>
                            <p>{{ progressMedha }}%</p>
                        </div>
                    </div>
                    <table class="display" width="100%">
                        <tbody>
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <p>Adela</p>

                                    <div class="rating d-flex ml-2">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div>
                                    <p>Lorem ipsum dolor sit amet,consectetur adipiscing elit.Proin augue risus, lobortis ultricevelit non, accumsan condimentum est. Ut orci tortor, pharetra a est vitae, facilisis luctus ante. Ut vitae dapibus leo.</p>
                                    <div class="questions">
                                        <p><span>Si të rrinin:</span> Fiks</p>
                                        <p><span>Ngjyra:</span> E zezë</p>
                                        <p><span>Masa:</span> Medium</p>
                                    </div>
                                </div>
                                <div class="like"><button class="like-button">&nbsp;</button>
                                    <p>Vlefshme (9)</p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="see-more">Të gjitha ›</button>
                </div>
            </div> -->
            <div class="row banner-collection">
                <div class="col p-0" v-if="productCollections.length === 1">
                    <img v-for="collection in product.collections" :key="collection.id"
                        :src="`../images/collections/banner/${collection.image}`" alt="{{ collection.name }}">
                </div>
                <div class="col-12 mb-2" v-else v-for="collection in productCollections.slice(0, 2)"
                    :key="collection.id">
                    <img :src="`../images/collections/banner/${collection.image}`" alt="{{ collection.name }}">
                </div>
            </div>
            <div class="row related-products">
                <div class="col-12">
                    <p class="title">Ju mund të pëlqeni</p>
                    <!-- <div class="filter-categories">
                        <p class="related-category">T-shirt për Femra</p>
                        <p class="related-category">Kapele Verore</p>
                        <p class="related-category">Çanta Femrash</p>
                        <p class="related-category">Çorape Femrash</p>
                    </div> -->
                </div>
                <div class="col-6" v-for="related in product.up_selling_products" :key="related.id">
                    <div class="product-card">
                        <img :src="`../images/admin_products/medium/${related.thumbnail}`" />
                        <p class="product-name">{{ related.name }}</p>
                        <p class="price">{{ related.price }} Lekë</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-icons single-product text-center">
            <button @click="addToCart">SHTO NË SHPORTË</button>
        </div>
        <div class="size-guide-modal" v-if="visibleGuide">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <p @click="visibleGuide = !visibleGuide; checkModalFalse();">‹</p>
                    </div>
                    <div class="col-6 text-center">
                        <p class="title">Guida e masave</p>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="divider"></div>
                <div class="size-guide-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Masa</th>
                                <th>Shpatulla</th>
                                <th>Gjatësia</th>
                                <th>Mëngët</th>
                                <th>Busti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product_size in product.size_guide" :key="product_size.guide_id">
                                <td class="size-slang">{{ product_size.size }}</td>
                                <td>{{ product_size.shoulder }}</td>
                                <td>{{ product_size.length_tops }}</td>
                                <td>{{ product_size.sleeve_length }}</td>
                                <td>{{ product_size.bust }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="size-guide-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id
                    pretium purus. Curabitur tempus sodales suscipit.</p>
            </div>
        </div>
    </div>
</template>

<script>
import bannerone from "../assets/banners/first-slide.jpg"
import sizeIcon from "../assets/size-guide-icon.png"
import delivery from "../assets/delivery.png"
import returnpolicy from "../assets/privacy.png"
import ReviewList from "./single-product-components/ReviewList.vue"
import flash from "../assets/rrufe.png"
import tag from "../assets/product-tag.png"
import VueCountdown from '@chenfengyuan/vue-countdown';
import yellowFlash from "../assets/yellow-flash.png";
import ChooseAttributes from "./single-product-components/ChooseAttributes.vue";
import addbagModal from "./single-product-components/addbagModal.vue";
import swal from "sweetalert2"
import axios from "axios"
import { Swiper, SwiperSlide /* rest swiper/vue API... */ } from "swiper/vue";
import "swiper/css";
import { useCartStore } from '../stores/Cart';
import { useToast } from "vue-toastification";
export default {
    components: {
        ReviewList,
        VueCountdown,
        addbagModal,
        ChooseAttributes,
        Swiper,
        SwiperSlide
    },
    data() {
        const now = new Date();
        const newYear = new Date(now.getFullYear() + 1, 0, 1);
        return {
            swiperSingleOptions: {
                breakpoints: {
                    320: { slidesPerView: 1.1, spaceBetween: 5 },
                    1000: { slidesPerView: 5, spaceBetween: 30 },
                },
            },
            productCollections: [],
            time: newYear - now,
            selectedSize: "",
            selectedPattern: "",
            sizeIcon: sizeIcon,
            delivery: delivery,
            returnpolicy: returnpolicy,
            progressVogla: 20,
            progressFiks: 65,
            progressMedha: 15,
            flash: flash,
            yellowFlash: yellowFlash,
            tag: tag,
            bannerone: bannerone,
            visibleGuide: false,
            AttributesModal: false,
            Picturethumbnail: '',
            addbagModal: false,
            loading: false,
            productColors: [],
            has_variant: false,
            productColorId: 0,
            productColorCode: null,
            productSizes: [],
            productSizeId: 0,
            productSizeValue: null,
            productStock: 0,
            oldPrice: '',
            hasFlashsale: '',
            productPrice: '',
            productVariantId: 0,
            product: [],
            selectedImages: [],
            special_discount: '',
            productSku: '',
            availableColorSize: [],
        }
    },
    mounted() {
        this.details();
    },
    methods: {
        checkModal() {
            document.querySelector("body").style.overflow = "hidden";
        },
        checkModalFalse() {
            document.querySelector("body").style.overflow = "inherit";
        },
        scrollToTop() {
            window.scrollTo(0, 0);
            document.querySelector("body").style.overflow = "hidden";
        },
        isActive(value) {
            this.selectedSize = value;
        },
        activePattern(name) {
            this.selectedPattern = name;
        },
        changeMainPicture(selectedImages) {
            this.Picturethumbnail = selectedImages[0];
        },
        changePictures(patternImages) {
            this.selectedImages = patternImages;
        },
        addToCart() {
            if (this.checkProductVariant() && this.checkProductStock() && this.checkDuplicateCart() && this.availableColorSizeCheck(this.productSizeId)) {
                this.cartStore.addItem(this.cartItem());
                this.toast.success(this.product.name + " u shtua ne karte.");
            }
        },
        cartItem() {
            return {
                id: this.product.form.product_id,
                name: this.product.name,
                price: this.productPrice,
                old_price: this.oldPrice,
                quantity: this.product.form.quantity,
                variant: this.productVariantId,
                stock: this.productStock,
                image: this.product.image_path + this.product.thumbnail,
                colorId: this.productColorId,
                colorCode: this.productColorCode,
                sizeId: this.productSizeId,
                sizeValue: this.productSizeValue,
            };
        },
        checkDuplicateCart() {
            let shouldSkip = true;
            if (this.cartStore.items.length > 0) {
                this.cartStore.items.forEach((v) => {
                    if (v.id === this.product.form.product_id && v.colorId === this.productColorId && v.sizeId === this.productSizeId) {
                        this.toast.error('Ky ' + this.product.name + ' tashmë është shtuar ne karte.');
                        return shouldSkip = false;
                    }
                });
                return shouldSkip;
            } else {
                return shouldSkip;
            }
        },
        async productColor(colorId, colorCode) {
            this.productColorId = colorId;
            this.productColorCode = colorCode;

            await this.axios.post('/api/v1/available-color-size', {
                product_id: this.$route.params.slug, color_id: colorId
            }).then((response) => {
                this.availableColorSize = response.data.data;
                this.productVariant();
            }).catch((error) => {
                console.log(error);
            });

        },
        availableColorSizeStyle(size_id) {
            if (Number(this.availableColorSize.length) !== 0) {
                return this.availableColorSize.includes(size_id) ? 'pointer' : 'not-allowed';
            } else {
                return 'pointer';
            }
        },
        availableColorSizeCheck(size_id) {
            let shouldSkip = true;
            if (Number(this.availableColorSize.length) !== 0 && !(this.availableColorSize.includes(size_id))) {
                this.toast.error('Sorry! this variant is not available right now.');
                shouldSkip = false;
            }
            return shouldSkip;
        },
        productSize(sizeId, sizeValue) {
            if (this.availableColorSizeCheck(sizeId)) {
                this.productSizeId = sizeId;
                this.productSizeValue = sizeValue;
                this.productVariant();
            }
        },
        productVariant() {
            let shouldSkip = false;
            if (this.checkProductVariant() && this.availableColorSizeCheck(this.productSizeId)) {
                this.getProductCurrentStock();
                shouldSkip = true;
            }
            return shouldSkip;
        },
        checkProductVariant() {
            let shouldSkip = true;
            if (this.productColorCount !== 0 && !this.productColorId) {
                // this.toast.warning('Select color');
                return shouldSkip = false;
            } else if (this.productSizeCount !== 0 && !this.productSizeId) {
                // this.toast.warning('Select size');
                return shouldSkip = false;
            } else {
                return shouldSkip;
            }
        },
        checkProductStock() {
            let shouldSkip = true;
            if (this.productStock < 1) {
                this.toast.error('Na vjen keq që nuk ka magazinë.');
                shouldSkip = false;
            }
            return shouldSkip;
        },
        fetchProductStock() {
            return new Promise((resolve, reject) => {
                this.axios.post('/api/v1/check-product-stock', {
                    product_id: this.$route.params.slug, color_id: this.productColorId, size_id: this.productSizeId
                }).then((response) => { resolve(response.data); }).catch((error) => { reject(error); });
            });
        },
        async getProductCurrentStock() {
            await this.fetchProductStock().then((response) => {
                this.productVariantId = response.variant,
                    this.productStock = response.stock,
                    this.productPrice = response.price,
                    this.oldPrice = response.old_price,
                    this.hasFlashsale = response.has_flashsale,
                    this.special_discount = response.percentage,
                    this.productSku = response.sku,
                    this.FlashSaleStart = response.flashsale_startdate,
                    this.FlashSaleEnd = response.flashsale_enddate,
                    this.FlashSaleUrl = response.flashsale_url,
                    this.checkProductStock()
            }).catch((error) => { console.log(error) });
        },
        details() {
            this.loading = true;
            this.axios.get('/api/v1/product-details/' + this.$route.params.slug).then((response) => {
                this.loading = false;
                document.title = response.data.data.name;
                this.product = response.data.data;
                this.has_variant = response.data.data.has_variant;
                this.productColors = response.data.data.colors;
                this.productSizes = response.data.data.sizes;
                this.productCollections = response.data.data.collections;
                this.productStock = response.data.data.current_stock;

                if (this.productColorCount > 0) {
                    this.productColorId = this.productColors[0].id;
                    this.productColorCode = this.productColors[0].code;
                }
                if (this.productSizeCount > 0) {
                    this.productSizeId = this.productSizes[0].id;
                    this.productSizeValue = this.productSizes[0].value;
                }
                if (this.productColorCount > 0 || this.productSizeCount > 0) {
                    this.getProductCurrentStock();
                }

                if (this.has_variant === true) {
                    this.selectedPattern = response.data.data.product_stock[0].color_name;
                    this.selectedImages = response.data.data.product_stock[0].color_images;
                    this.selectedSize = response.data.data.sizes[0].value;
                    this.Picturethumbnail = this.selectedImages[0];
                    this.productColor(response.data.data.product_stock[0].color_id, response.data.data.product_stock[0].color_code);
                    this.productSize(response.data.data.sizes[0].id, response.data.data.sizes[0].value);
                    // if (response.data.data.discounted_price !== '') {
                    //     this.productPrice = response.data.data.price;
                    //     this.oldPrice = response.data.data.old_price;
                    // } else {
                    //     this.productPrice = response.data.data.price;
                    //     this.oldPrice = '';
                    // }
                } else {
                    if (response.data.data.discounted_price !== '') {
                        this.productPrice = response.data.data.discounted_price;
                        this.oldPrice = response.data.data.price;
                        this.hasFlashsale = response.data.data.has_flashsale;
                        this.special_discount = response.data.data.special_discount;
                    } else {
                        this.productPrice = response.data.data.price;
                        this.oldPrice = '';
                        this.special_discount = '';
                    }
                }
            }).catch((error) => {
                this.loading = false;
            })
        },
    },
    computed: {
        // rows() {
        //     return this.items.length
        // },
        productColorCount() {
            return Number(this.productColors.length);
        },
        productSizeCount() {
            return Number(this.productSizes.length);
        },
        getUniques() {
            let tempArray = [];
            for (let item of this.product.product_stock) {
                (tempItem => {
                    if (!(tempItem.length > 0 && tempItem.find(x => x.color_id === item.color_id))) tempArray.push(item);
                })(tempArray.filter(x => x.color_name === item.color_name))
            }
            return tempArray;
        }
    },
    setup() {
        const toast = useToast();
        const cartStore = useCartStore();
        return { cartStore, toast }
    },
}
</script>
<style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");

@keyframes slideUp {
    0% {
        transform: translateY(100%);
        opacity: 1;
    }

    100% {
        transform: translateY(35%);
        opacity: 1;
    }
}

.single-last-banner {
    margin: 20px 0px;
}

.single-last-banner .last-banner-img {
    width: 100%;
    height: 350px;
    object-fit: cover;
}

.size-guide-table table {
    margin-top: 10px;
}

.size-guide-table table th,
.size-guide-table .size-slang {
    font-weight: 800;
    background: #f5f5f5;
}

.size-guide-table {
    font-size: 0.9rem;
    font-family: 'Muli', sans-serif;
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
}

.size-guide-table table td,
.size-guide-table table th {
    width: 100%;
    border: 1px solid #e5e5e5;
}

.single-product-mobile .add-bag-modal .swiper-backface-hidden .swiper-slide {
    width: 107.5px !important;
    margin-right: 7px !important;
}

.single-product-mobile .add-bag-modal .carousel__item img {
    width: 107px;
    height: 176px;
    -o-object-fit: cover;
    object-fit: cover;
}

.single-product-mobile {
    overflow-x: hidden;
}

.add-bag-modal {
    top: 35vh;
    height: 65vh;
    width: 100vw;
    background: #fff;
    position: absolute;
    left: 0;
    right: 0;
    z-index: 300;
    animation-name: slideUp;
    animation-duration: .3s;
    animation-timing-function: linear;
}

.single-product-mobile .add-bag-modal .patterns .background {
    margin-bottom: 5px;
}

.product-description .patterns .background.active,
.single-product-mobile .patterns .background.active {
    border: 1px solid #020202 !important;
    border-radius: 50%;
    width: 25px;
    height: 25px;
}

.single-product-slider {
    display: flex;
    justify-content: start;
}

.picture {
    margin-left: 10px;
}

.main-picture-area,
.main-picture-area .picture,
.main-picture-area .picture img {
    width: 100%;
    height: 800px;
    object-fit: cover;
    object-position: 0% 50%;
}

.pictures img {
    width: 100%;
    height: 70px;
    object-fit: cover !important;
    object-position: 50% 50%;
}

.pictures {
    width: 60px;
    display: flex;
    flex-direction: column;
    height: 600px;
}

.pictures-single {
    margin-bottom: 10px;
    cursor: pointer;
}

.pictures-single.active {
    padding: 2px;
    border: 1px solid #020202;
}

p {
    font-family: 'Muli', sans-serif;
}

.single-product-body {
    padding: 210px 80px 0px;
}

.single-product-body .breadcrumbs {
    color: #7A7A7A;
    text-transform: capitalize;
    font-size: 1rem;
}

.product-name {
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    color: #020202;
    font-weight: 400;
    line-height: 1rem;
    margin-bottom: 0.5rem;
}

.rating {
    margin-bottom: 0.4rem;
}

.rating .fa-star {
    font-size: 1.4rem;
    margin-right: 5px;
    color: #D9D9D9;
}

.rating .fa-star.checked {
    color: #EECD1D;
}

.sku,
.availability {
    font-weight: 400;
    color: #7A7A7A;
    margin-bottom: 0.2rem;
}

.availability {
    font-size: 0.9rem;
}

.price {
    display: flex;
    justify-content: start;
}

.price .new-price {
    font-size: 1.4rem;
    font-weight: 800;
    color: #D31621;
    font-family: 'Muli Bold', sans-serif;
}

.price .old-price {
    font-size: 0.9rem;
    color: #929292;
    text-decoration: line-through;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    margin-left: 5px;
    margin-top: 6px;
}

.price .percentage {
    color: #fff;
    font-family: 'Rubik', sans-serif;
    margin-left: 10px;
    height: 1.2rem;
    width: 40px;
    background: #000;
    margin-top: 7px;
    padding: 0px 4px;
}

.price .percentage p {
    font-size: 0.8rem;
    font-size: 400;
}

hr {
    margin-top: 0;
}

.attribute-info,
.sizes,
.patterns,
.size-guide,
.rating-overview {
    display: flex;
    flex-wrap: wrap;
    justify-content: start;
}

.shipping-information {
    display: flex;
    flex-wrap: nowrap;
    justify-content: start;
}

.attribute-info .attribute-title {
    font-size: 1.2rem;
    font-weight: 800;
    margin-right: 10px;
}

.attribute-info .attribute-option {
    font-size: 1rem;
    margin-top: 0.2rem;
}

.product-description .patterns {
    margin-bottom: 1rem;
}

.product-description .patterns .background {
    cursor: pointer;
    width: 25px;
    height: 25px;
    object-fit: cover;
    border-radius: 50%;
    text-align: center;
    padding: 0;
    margin-right: 10px;
    -webkit-box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
    box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 12%);
}

.sizes .size-box {
    min-width: 25px;
    padding: 0px 2px;
    height: 25px;
    text-align: center;
    font-size: 0.9rem;
    margin-right: 10px;
    border: 1px solid #E0E0E0;
    cursor: pointer;
}

.sizes .size-box.active {
    border: 1px solid #020202;
}

.size-guide {
    margin: 1rem 0rem;
}

.size-guide img {
    height: 15px;
    margin-top: 3px;
}

.size-guide a {
    color: #535D9A !important;
    font-size: 0.8rem;
    font-weight: 400;
    margin-left: 10px;
    cursor: pointer;
}

.add-to-cart {
    height: 50px;
    width: 250px;
    background: #020202;
    color: #fff;
    font-family: 'Muli', sans-serif;
    font-size: 1.1rem;
}

.shipping-information {
    background: #F4F4F4;
    margin-top: 1rem;
    padding: 10px 15px;
    margin-bottom: 1rem;
}

.shipping-information img {
    width: 20px;
    height: auto;
    margin-right: 10px;
}

.shipping-information span {
    font-family: 'Muli', sans-serif;
    font-size: 0.9rem;
    font-weight: 800;
    color: #020202;
}

.shipping-information p,
.shipping-information a {
    font-size: 0.9rem;
    font-weight: 400;
    color: #767676;
    margin-bottom: 0;
}

#description .accordion-button.collapsed::after {
    background-image: url('../assets/plus.png') !important;
}

#description .accordion-button:not(.collapsed)::after {
    background-image: url('../assets/remove.png') !important;
}

#description .accordion-button:not(.collapsed)::after,
#description .accordion-button.collapsed::after {
    width: 10px !important;
    height: 10px !important;
    background-size: 10px !important;
}

#description .accordion-button {
    padding: 0px !important;
}

#description .accordion-body {
    margin-top: 1rem;
    padding-left: 0px;
}

#description .accordion-body table {
    border: none;
}

#description .accordion-body table td {
    padding-left: 50px;
    padding-top: 5px;
    padding-bottom: 5px;
    text-transform: capitalize;
}

.reviews-title {
    font-size: 1.4rem;
    font-weight: 800;
    letter-spacing: -1px;
    margin-top: 40px !important;
}

.reviews-overview {
    background: #F4F4F4;
    padding: 40px 40px !important;
}

.reviews-overview .overview-title {
    font-weight: 600;
    font-size: 1rem;
}

.rating-value {
    font-size: 1.4rem;
    font-weight: 800;
    margin-left: 10px;
    margin-top: -7px;
}

.progress-bar {
    display: flex;
    flex-direction: row !important;
    justify-content: start !important;
}

.shell {
    height: 10px;
    width: 250px;
    border: 0.2px solid transparent;
    background: #E7E7E7;
    border-radius: 13px;
    margin-right: 10px;
}

.bar {
    background: #000;
    height: 10px;
    width: 15px;
    border-radius: 13px;
}

.progress-bar p {
    font-size: 0.7em;
    color: #020202;
    font-weight: 400;
    line-height: 0.5rem;
    width: 100px;
    text-align: left;
}

.filter-reviews {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 40px;
}

.filter-reviews .filter {
    display: flex;
    align-self: center;
    align-items: center;
}

.filter-reviews .all-reviews {
    font-size: 1.2rem;
    margin-bottom: 0;
    font-weight: 800;
}

.filter-reviews .filter select {
    height: 40px;
    margin-left: 10px;
    border: 1px solid #020202;
    border-radius: 0px;
    font-weight: 600;
    padding: 0px 25px;
    -moz-appearance: inherit;
    -webkit-appearance: inherit;
    background-image: url('../assets/chevron-down.png');
    appearance: inherit;
    background-repeat: no-repeat;
    background-position: right .7em top 55%, 0 0;
}

.filter-reviews .filter p {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0;
}

.review-line {
    background-color: #E0E0E0;
    color: #E0E0E0;
    height: 3px;
    border: 0.3px solid transparent;
    border-radius: 18px;
}

.related .product-card {
    width: 100% !important;
    margin-bottom: 20px;
}

.related-title {
    margin-top: 40px;
    font-size: 1.4rem;
    font-weight: 800;
}

.product-card img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    object-position: 50% 0%;
}

.product-card .product-name {
    font-size: 0.9rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    margin-bottom: 0;
    color: #767676;
    height: 1.4rem;
    width: 100%;
    word-break: normal;
    overflow: hidden;
}



.view-more {
    height: 50px;
    padding: 0px 30px;
    background-color: #D31621;
    color: #fff;
    font-weight: 600;
    font-family: 'Muli', sans-serif;
    text-transform: uppercase;
    margin-bottom: 40px;
    margin-top: 20px;
    font-size: 1.4rem;
    border: 0;
}

@media(min-width:900px) {

    .single-product-mobile,
    .size-guide-modal {
        display: none;
    }
}

.single-product-mobile .flash-sale .name,
.single-product-body .flash-sale .name {
    display: flex;
    justify-content: start;
    height: 12px;
    align-self: center;
}

.single-product-mobile .flash-sale .name p,
.single-product-body .flash-sale .name p {
    line-height: 0.6;
    font-weight: 800;
    margin-left: 5px;
    color: #000;
}

.single-product-mobile .flash-sale .countdown,
.single-product-body .flash-sale .countdown {
    display: flex;
    align-self: center;
    height: 12px;
}

.single-product-mobile .flash-sale .countdown a,
.single-product-body .flash-sale .countdown a {
    color: #fff;
    align-self: center;
    margin-left: 5px;
    font-size: 1.4rem;
    margin-top: -5px;
}

.single-product-mobile .flash-sale .countdown p,
.single-product-body .flash-sale .countdown p {
    font-weight: 800;
    line-height: 0.6;
    color: #000;
}

.single-product-mobile .flash-sale .countdown-time,
.single-product-body .flash-sale .countdown-time {
    margin-left: 5px;
    font-weight: 800;
}

.single-product-mobile .flash-sale .countdown-time span,
.single-product-body .flash-sale .countdown-time span {
    display: flex;
    justify-content: start;
}

.single-product-mobile .flash-sale .countdown .countdown-time .milli,
.single-product-body .flash-sale .countdown .countdown-time .milli {
    margin-left: 5px;
    background: #000;
    color: #fff;
    font-weight: normal;
    padding: 5px 1px;
    margin-top: -5px;
}

.single-product-body .flash-sale {
    display: flex;
    flex-direction: row;
    position: relative;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 50px;
    justify-content: space-between;
    padding: 0px 20px !important;
    background-color: rgba(238, 205, 29, 0.8);
    align-content: center;
}

@media(max-width:900px) {
    .single-product-body {
        display: none;
    }

    .product-name {
        margin-top: 5px;
    }

    .single-product-mobile {
        margin-top: 160px;
    }

    .single-product-mobile .single-slider {
        position: relative;
    }

    .single-product-mobile .flash-sale {
        display: flex;
        flex-direction: row;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 50px;
        justify-content: space-between;
        padding: 0px 20px !important;
        background-color: rgba(238, 205, 29, 0.8);
        align-content: center;
    }


    .single-product-mobile .rating {
        align-self: flex-start;
        margin-top: 6px;
    }

    .rating .fa-star {
        font-size: 0.9rem !important;
    }

    .single-product-mobile .rating-number {
        font-size: 0.8rem;
        margin-top: 0.2rem;
        font-weight: 400;
    }

    .single-product-mobile .patterns .background {
        margin-right: 10px;
        margin-bottom: 20px;
    }

    .single-product-mobile .attribute-title,
    .single-product-mobile .attribute-option {
        margin-bottom: 5px;
        margin-top: 0px;
        font-size: 1rem;
    }

    .single-product-mobile .sizes {
        margin-bottom: 20px;
    }

    .single-product-mobile .shippings {
        background: #F5F5F5;
        padding: 10px 0px;
    }

    .single-product-mobile .shipping-information {
        background: #fff;
        margin-bottom: 0;
        margin-top: 0;
    }

    .single-product-mobile .price .new-price {
        font-family: 'Rubik', sans-serif;
    }

    .single-product-mobile .price .old-price {
        margin-top: 7px;
    }

    .single-product-mobile .price .percentage {
        margin-top: 9px;
    }

    .single-product-mobile .sizes .size-box {
        min-width: 40px;
        max-width: max-content;
        border-radius: 12px;
        padding: 0px 5px;
    }

    .single-product-mobile .sizes .size-box p {
        margin-bottom: 0;
    }

    .single-product-mobile .shippings hr {
        margin-bottom: 0;
        margin-top: 0;
        width: 95%;
        background: #fff;
        margin-left: 2.5%;
    }

    .single-product-mobile .promotion {
        margin: 0px 0px 10px;
        background: #fff;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .single-product-mobile .promotion .promotion-link {
        display: flex;
        justify-content: space-between;
        font-weight: 800;
        font-size: 0.9rem;
    }

    .single-product-mobile .promotion .promotion-name {
        display: flex;
        justify-content: start;
        height: 1rem;
        align-content: center;
    }

    .single-product-mobile .promotion .promotion-link a {
        color: #7a7a7a;
        font-size: 1.2rem;
        font-weight: 400;
    }

    .single-product-mobile .promotion .promotion-name img {
        align-self: center;
    }

    .single-product-mobile .promotion .promotion-name p {
        margin-left: 10px;
        align-self: center;
        margin-bottom: 0;
        color: #D31621;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .single-product-mobile {
        background: #f5f5f5;
    }

    .single-product-mobile .details {
        background: #fff;
    }

    .single-product-mobile .description-size {
        margin-bottom: 10px;
        padding-top: 20px;
        padding-bottom: 20px;
        background: #fff;
    }

    .single-product-mobile .description-size .description {
        justify-content: space-between;
        display: flex;
        font-size: 1rem;
        font-weight: 400;
    }

    .single-product-mobile .description-size .size {
        font-size: 1rem;
        font-weight: 400;
        display: flex;
        justify-content: space-between;
    }

    .single-product-mobile .description-size .size a.first {
        color: #535D9A;
        text-decoration: underline !important;
        cursor: pointer;
    }

    .single-product-mobile .description-size .size a.last,
    .single-product-mobile .description-size .description a {
        color: #7a7a7a;
        text-decoration: none !important;
        cursor: pointer;
    }

    .single-product-mobile .collection {
        background: #fff;
        padding: top 5px;
        padding-bottom: 5px;
    }

    .single-product-mobile .collection img {
        width: 70px;
        align-self: center;
    }

    .single-product-mobile .collection p span {
        font-size: 1.1rem;
        color: #000;
        font-weight: 600;
    }

    .single-product-mobile .collection p {
        margin-top: 10px;
        align-self: center;
        margin-left: 10px;
        font-size: 0.9rem;
        color: #7a7a7a;
        width: 80%;
        word-break: normal;
    }

    .bottom-icons.single-product {
        display: block;
        border: 0;
        padding: 10px;
    }

    .bottom-icons.single-product button {
        background: #000;
        color: #fff;
        padding: 15px 60px;
        font-size: 1.1rem;
        font-weight: 800;
        font-family: 'Muli', sans-serif;
        border: none;
    }

    .single-product-mobile .rating-value {
        margin-left: 0;
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .single-product-mobile .rating-overview {
        height: 1.2rem;
    }

    .single-product-mobile .rating-overview .rating {
        margin-top: -5px;
    }

    .reviews-mobile {
        background: #fff;
        margin-top: 10px !important;
        padding: 20px;
    }

    .reviews-mobile .title {
        font-size: 0.9rem;
        font-weight: 800;
    }

    .reviews-mobile .review-details {
        margin-top: 10px;
        background: #f5f5f5;
        padding: 20px 10px;
    }

    .reviews-mobile .display td {
        border: 0px;
    }

    .single-product-mobile .see-more {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        color: #7a7a7a;
        font-family: 'Muli', sans-serif;
    }

    .single-product-mobile .banner-collection {
        padding: 20px;
    }

    .single-product-mobile .banner-collection img {
        height: 120px;
        width: 100%;
        object-fit: cover;
        object-position: top 50% right 0%;
    }

    .single-product-mobile .related-products {
        padding: 20px;
        background: #fff;
    }

    .single-product-mobile .flash-sale .name img {
        width: 9px;
        height: 14px;
    }

    .single-product-mobile .related-products .title {
        font-size: 1rem;
        font-weight: 800;
    }

    .single-product-mobile .related-products .filter-categories {
        display: flex;
        width: 100%;
        overflow: auto;
        font-size: 0.9rem;
    }

    .single-product-mobile .related-products .filter-categories .related-category {
        min-width: 35%;
    }

    .single-product-mobile .related-products .filter-categories .related-category::-webkit-scrollbar {
        display: none;
    }

    .single-product-mobile .related-products .product-card {
        width: 100% !important;
        margin-bottom: 20px;
    }

    .single-product-mobile .related-products .product-card img {
        height: 260px;
    }

    .size-guide-modal {
        display: block;
        height: 100vh;
        width: 100vw;
        background: #fff;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 300;
        overflow: hidden !important;
    }

    .size-guide-modal .title {
        font-weight: 800;
    }

    .divider {
        height: 10px;
        background: #f5f5f5;
    }

    .size-guide-modal .size-guide-description {
        font-size: 0.8rem;
        color: #7a7a7a;
        font-weight: 300;
    }

    .single-product-mobile .flash-sale .countdown p {
        font-size: 0.9rem;
    }
}

.product-description .patterns .background img,
.product-description .patterns .background.active img {
    width: 23px;
    height: 23px;
    object-fit: cover;
    border: 2px solid #fff;
    border-radius: 50%;
    vertical-align: baseline !important;
}

.background-color {
    width: 23px;
    height: 23px;
    border: 2px solid #fff;
    border-radius: 50%;
}

.description-size,
.collection {
    padding: 0px 10px;
}

.single-product-mobile .collection p {
    line-height: 1.2;
}

.accordion .accordion-item {
    background: transparent;
    width: 100%;
}

.size-guide.accordion .accordion-button.collapsed::after {
    background-image: none !important;
}

.size-guide.accordion .accordion-button {
    padding: 0px !important;
}

.size-guide.accordion .accordion-body {
    margin-top: 1rem;
    padding-left: 0px;
    height: 170px;
    overflow-y: auto;
}

.back-arrow {
    font-size: 1.4rem;
}

.single-product-mobile .carousel__item img {
    width: 400px;
    height: 430px;
    object-fit: cover;
}

.single-product-mobile .carousel__prev,
.single-product-mobile .carousel__next {
    display: none;
}

.single-product-mobile .swiper-backface-hidden .swiper-slide {
    width: 341.5px !important;
    margin-right: 3px !important;
}

.single-product-mobile .swiper-backface-hidden .swiper-slide img {

    width: 340.5px !important;

}

.single-product-mobile .swiper {
    z-index: 0 !important;
    margin-left: 0 !important;
}

@media (max-width: 500px) {
    .flash-sale img {
        width: auto;
        height: auto;
        -o-object-fit: cover;
    }
}

.single-product-mobile .description .accordion-button.collapsed::after {
    background-image: url('../assets/plus.png') !important;
}

.single-product-mobile .description .accordion-button:not(.collapsed)::after {
    background-image: url('../assets/remove.png') !important;
}

.single-product-mobile .description .accordion-button.collapsed::after,
.single-product-mobile .description .accordion-button:not(.collapsed)::after {
    width: 8px !important;
    height: 8px !important;
    background-size: 8px !important;
}
</style>
