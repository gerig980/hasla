<template>
<div class="modal attribute-modal fade" id="attributeModalpc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="container-fluid">
          <div class="row">
              <div class="col-7">
                <div id="vue-slider" class="single-product-slider" v-if="selectedImages">
                  <div class="pictures">
                      <div v-for="(picture, index) in selectedImages" :key="index" class="pictures-single">
                          <img :src="picture"  @click="changeActiveSelected(index)"/>
                      </div>
                  </div>
                  <div  class="main-picture-area">
                      <div class="picture">
                      <img :src="activePic"/>
                  </div>
                  </div>
                </div>
              </div>
              <div class="col-5">
                <div class="product-description">
                  <p class="product-name"> SHEIN Maglietta corta con grafica lettera monospalla color block impunture </p>
                  <div class="rating">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                  </div>
                  <p class="sku">SON101-KA</p>
                  <div class="price">
                      <p class="new-price">399 Lekë</p>
                      <p class="old-price">599 Lekë</p>
                      <div class="percentage"><p>-40%</p></div>
                  </div>
                  <hr>
                  <div class="attribute-info">
                      <p class="attribute-title">Ngjyra:</p>
                      <p class="attribute-option" v-html='selectedPattern'></p>
                  </div>
                  <div class="patterns">
                      <div class="background" v-for="(pattern, patternid) in patterns" :key="patternid" :class="{active: pattern.patternValue === selectedPattern}" @click="activePattern(pattern.patternValue), changePictures(pattern.patternImages)"><img  :src="pattern.patternone" :pattern="pattern"></div>
                  </div>
                  <div class="attribute-info">
                      <p class="attribute-title">Masa</p>
                  </div>
                  <div class="sizes">
                      <div class="size-box" v-for="(size, sizeid) in sizes" :key="sizeid" :class="{active: size.sizeValue === selectedSize}" @click="isActive(size.sizeValue)"><p>{{size.sizeSlang }}</p></div>
                  </div>
                  <div class="size-guide accordion" id="size">

                      <div class="accordion-item">
            <h2 class="accordion-header" id="headingGuide">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGuide" aria-expanded="false" aria-controls="collapseGuide">
                <img :src="sizeIcon" />
                <a>Udhëzues për masën</a>
              </button>
            </h2>
            <div id="collapseGuide" class="accordion-collapse collapse"  aria-labelledby="headingGuide" data-bs-parent="#size">
              <div class="accordion-body">
                <SizeGuide />
              </div>
            </div>
          </div>
                  </div>
                  <button class="add-to-cart">AZHORNO</button>
              </div>
              </div>
          </div>
       </div>
      </div>
    </div>
  </div>
</div>
<div class="modal attribute-modal fade" id="attributeModaltel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <Modal></Modal>
            </div>
            <div class="col-12">
              <div class="product-description">
                <p class="product-name"> SHEIN Maglietta corta con grafica lettera monospalla color block impunture </p>
                <div class="price">
                  <p class="new-price">399 Lekë</p>
                  <p class="old-price">599 Lekë</p>
                </div>
                <hr>
                <div class="attribute-info">
                  <p class="attribute-title">Ngjyra:</p>
                  <p class="attribute-option" v-html='selectedPattern'></p>
                </div>
                <div class="patterns">
                  <div class="background" v-for="(pattern, patternid) in patterns" :key="patternid" :class="{active: pattern.patternValue === selectedPattern}" click="activePattern(pattern.patternValue), changePictures(pattern.patternImages)">
                    <img :src="pattern.patternone" :pattern="pattern"></div>
                </div>
                <div class="attribute-info">
                  <p class="attribute-title">Masa</p>
                </div>
                <div class="sizes">
                  <div class="size-box" v-for="(size, sizeid) in sizes" :key="sizeid" :class="{active: size.sizeValue === selectedSize}" @click="isActive(size.sizeValue)">
                    <p>{{size.sizeSlang }}</p>
                  </div>
                </div>
                <div class="text-center">
                  <button class="add-to-cart">AZHORNO</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
import SizeGuide from "../single-product-components/SizeGuide.vue";
import pattern1 from "../../assets/attributes/pattern1.png";
import image1 from "/images/products/featured1.jpg";
import image2 from "/images/products/featured2.jpg";
import Modal from "../single-product-components/addbagModal.vue";

export default {
  components: { SizeGuide, Modal },
  data() {
    return {
      patterns: [
        { patternid: '1', patternone: pattern1, hoverimg: image1, patternValue: 'E kuqe', patternImages: [
        '../images/products/featured4.jpg',
        '../images/products/featured4.jpg',
        '../images/products/featured3.jpg',
        '../images/products/featured4.jpg',
        ] },
        { patternid: '2', patternone: pattern1, hoverimg: image2, patternValue: 'E zezë', patternImages: [
        '../images/products/featured1.jpg',
        '../images/products/featured1.jpg',
        '../images/products/featured3.jpg',
        '../images/products/featured1.jpg',
        ]  }
    ],
    sizes: [
        { sizeid: '1', sizeValue: 'small', sizeSlang: 'S' },
        { sizeid: '2', sizeValue: 'medium', sizeSlang: 'M' },
        { sizeid: '3', sizeValue: 'large', sizeSlang: 'L' },
        { sizeid: '4', sizeValue: 'extra large', sizeSlang: 'XL' }
    ],
    pictures: [
    '../images/products/featured1.jpg',
    '../images/products/featured2.jpg',
    '../images/products/featured3.jpg',
    '../images/products/featured4.jpg',
    ],
    selectedSize: "",
    selectedPattern: "",
    selectedImages: "",
    activePic: '../images/products/featured1.jpg',
    }
  },
  methods: {
    isActive(sizeValue) {
        this.selectedSize = sizeValue;
        },
        activePattern(patternValue) {
        this.selectedPattern = patternValue;
        },
        changePictures(patternImages) {
        this.selectedImages = patternImages;
        this.activePic = patternImages[0];
        },
        changeActivePic(index) {
        this.activePic = this.pictures[index];
        },
        changeActiveSelected(index){
            this.activePic = this.selectedImages[index];
        }
  }
}
</script>

<style scoped>
.attribute-modal .modal-content {
    border:0;
    border-radius: 0;
}
.attribute-modal .modal-header {
    border-bottom: 0;
}
.attribute-modal .modal-dialog {
  max-width: 1000px !important;
}
@media (max-width: 900px) {
  #attributeModaltel .product-name {
    margin-top: 5px;
    font-size:0.8rem;
    font-weight: 500;
  }
  #attributeModaltel .price .new-price, #attributeModaltel .attribute-info .attribute-title {
    font-size:0.9rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    margin-bottom:0;
  }
  #attributeModaltel .price .old-price {
    font-size:0.8rem;
    font-family: 'Rubik', sans-serif;
    font-weight:400;
    margin-top:0;
    margin-bottom: 0;
  }
  #attributeModaltel hr {
    margin:0;
  }
  #attributeModaltel .product-description .patterns, #attributeModaltel .sizes {
    margin-bottom: 5px;
    flex-wrap: wrap;
  }
  #attributeModaltel .modal-body {
    padding: 10px 0px;
  }
  #attributeModaltel .modal-header {
    padding-bottom:0px;
  }
  #attributeModaltel.modal {
    top: 12vh;
  }
}
</style>
