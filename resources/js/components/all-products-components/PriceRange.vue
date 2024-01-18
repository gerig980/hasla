<template>
    <div class="range-slider">
    <span class="left" @change="slider"><input v-model.number="minPrice" readonly/></span>
    <input @change="slider" v-model.number="minPrice" min="100" max="10000" step="500" type="range" />
    
    <span class="right" @change="slider"><input  v-model.number="maxPrice" readonly/></span>
    <input @change="slider" v-model.number="maxPrice" min="100" max="10000" step="500" type="range" />
    
    <svg width="100%" height="24">
        <line></line>
    </svg>
  </div>
</template>
<script>
export default { 
    data() { 
    return {
    minPrice: "500",
    maxPrice: "50000",
    minValue: "500"
  }
  },
  methods: {
    slider: function() {
      if (this.minPrice > this.maxPrice) {
        var tmp = this.maxPrice;
        this.maxPrice = this.minPrice;
        this.minPrice = tmp;
      }
    }
  }
}
</script>
<style>
.range-slider {
  width: 250px;
  margin: auto;
  text-align: center;
  position: relative;
  height: 50px;
}

.range-slider svg,
.range-slider input[type=range] {
  position: absolute;
  left: 0;
  bottom: 0;
}
input[type=range] {
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]:focus::-webkit-slider-runnable-track, input[type=range]:focus::-ms-fill-lower, input[type=range]:focus::-ms-fill-upper  {
  background: #b3b3b3;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 3px;
  cursor: pointer;
  background: #020202;
  border-radius: 18px !important;
  border: 1px solid transparent;
}
input[type=range]::-moz-range-runnable-track {
  width: 100%;
  height: 3px;
  cursor: pointer;
  background: #020202;
  border-radius: 18px !important;
  border: 1px solid transparent;
}
input[type=range]::-ms-runnable-track {
  width: 100%;
  height: 3px;
  cursor: pointer;
  background: #020202;
  border-radius: 18px !important;
  border: 1px solid transparent;
}

input[type=range]::-webkit-slider-thumb {
  z-index: 2;
  width:15px;
  height:15px;
  position: relative;
  border:1px solid transparent;
  background-color: #020202 !important;
  margin-top: -7px;
}
input[type=range]::-moz-range-thumb {
    z-index: 2;
  width:15px;
  height:15px;
  position: relative;
  border:1px solid transparent;
  background-color: #020202 !important;
  margin-top: -7px;
}
input[type=range]::-ms-thumb {
    z-index: 2;
  width:15px;
  height:15px;
  border:1px solid transparent;
  position: relative;
  background-color: #020202 !important;
  margin-top: -7px;
}
.left {
    position: absolute;
    bottom:10px;
    left:0;
}
.right {
    position: absolute;
    bottom:10px;
    right:0;
    width:40px;
}
@media(max-width:1800px) {
  .range-slider {
  width: 220px;
}
}
@media(max-width:1600px) {
  .range-slider {
  width: 200px;
}
}
@media(max-width:1400px) {
  .range-slider {
  width: 160px;
}
}
@media(max-width:1200px) {
  .range-slider {
  width: 140px;
}
}
</style>