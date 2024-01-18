<template>
  <div class="hero-background" :style="image">
    <div class="container">
      <div class="page-links">
        <h1>ABOUT</h1>
        <ul class="page-list">
          <li class="list-item ps-0 me-2"><a href=""> HOME </a></li>
          <li class="list-item list-item1"><a href=""> ABOUT </a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="about-us">
    <div class="container about-us-info">
      <div class="row">
        <div class="col-lg-7 col-sm-12 col-xs-12 about-us-img">
          <img :src="imageabout3" alt="" />
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12 about-us-text">
          <div class="about-us-content">
            <h3 class="short-title">ABOUT US</h3>
            <h1 class="title">Lorem, ipsum dolor consectetur elit.</h1>
            <p class="paragraph">
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some form, by
              injected humour, or randomised words which don’t look even
              slightly believable. If you are going to use a passage of Lorem
              Ipsum, you need to be sure there isn’t anything embarrassing
              hidden in the middle of text.
            </p>
            <button class="btn contact-us-btn">Contact Us</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="costumer-feedback">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main-row">
            <div class="main-title">CUSTOMER <span>FEEDBACK</span></div>
            <p class="main-paragraph">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores,
              minima?
            </p>
          </div>
        </div>
      </div>
      <div class="row costumer-carousel">
        <div class="col p-0">
          <div
            id="carouselExampleIndicatorsAbout"
            class="carousel slide"
            data-ride="carousel"
          >
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicatorsAbout" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="display: none"></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicatorsAbout"
                data-bs-slide-to="1"
                aria-label="Slide 2"
                style="display: none"
              ></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-6">
                      <div class="card-body">
                        <!-- <h5 class="card-title">Card title</h5> -->
                        <p class="card-text">
                          Lorem, ipsum dolor sit amet consectetur adipisicing
                          elit. Similique eius consequuntur nam modi sapiente
                          laboriosam!
                        </p>
                        <p class="costumer-name text-start">
                          <small class="text-muted">Klaudio Fashion</small>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <img
                        :src="imageabout1"
                        class="img-fluid w-100"
                        alt="..."
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-6">
                      <div class="card-body">
                        <!-- <h5 class="card-title">Card title</h5> -->
                        <p class="card-text">
                          Lorem, ipsum dolor sit amet consectetur adipisicing
                          elit. Similique eius consequuntur nam modi sapiente
                          laboriosam!
                        </p>
                        <p class="costumer-name text-start">
                          <small class="text-muted">Klaudio Fashion</small>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <img
                        :src="imageabout1"
                        class="img-fluid w-100"
                        alt="..."
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleIndicatorsAbout"
              data-bs-slide="prev"
            >
              <img :src="left" />
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleIndicatorsAbout"
              data-bs-slide="next"
            >
              <img :src="right" />
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="news">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="main-row">
            <div class="main-title">NEWS <span>UPDATES</span></div>
            <p class="main-paragraph">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores,
              minima?
            </p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="single-news">
            <div class="img-box">
              <img :src="imageabout2" alt="" style="width: 100%" />
            </div>
            <div class="content">
              <ul class="post-meta">
                <li class="meta-item text-start">
                  <a>
                    <i class="las la-calendar icon"></i>
                    09 Jun 2020
                  </a>
                </li>
                <li class="meta-item text-start">
                  <a>
                    <i class="las la-tag icon"></i>
                    Startup Business
                  </a>
                </li>
              </ul>
              <h4 class="blog-title text-start">
                <a>New organization are added seal there</a>
              </h4>
              <p class="info text-start">
                Was drawing natural fat respect husband. An as noisy an offer
                drawn blush place. These tried for way joy wrote...
              </p>
              <div class="btn-wrapper text-center">
                <a
                  href="https://bytesed.com/laravel/zaika/blog/new-organization-are-continually-added-and-seal-there-single"
                  class="borderless-btn"
                  >read more</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="single-news">
            <div class="img-box">
              <img :src="imageabout2" alt="" style="width: 100%" />
            </div>
            <div class="content">
              <ul class="post-meta">
                <li class="meta-item">
                  <a>
                    <i class="las la-calendar icon"></i>
                    09 Jun 2020
                  </a>
                </li>
                <li class="meta-item">
                  <a>
                    <i class="las la-tag icon"></i>
                    Startup Business
                  </a>
                </li>
              </ul>
              <h4 class="blog-title">
                <a>New organization are added seal there</a>
              </h4>
              <p class="info">
                Was drawing natural fat respect husband. An as noisy an offer
                drawn blush place. These tried for way joy wrote...
              </p>
              <div class="btn-wrapper">
                <a
                  href="https://bytesed.com/laravel/zaika/blog/new-organization-are-continually-added-and-seal-there-single"
                  class="borderless-btn"
                  >read more</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import imageabout1 from "../assets/about/about4.jpg";
import imageabout2 from "../assets/about/about1.webp";
import imageabout3 from "../assets/about/about3.jpg";
import right from "../assets/Polygon2.png";
import left from "../assets/Polygon1.png";

export default {
  data() {
    return {
      imageabout1: imageabout1,
      imageabout2: imageabout2,
      imageabout3: imageabout3,
      left: left,
      right: right,
      image: { backgroundImage: "url(https://via.placeholder.com/150)" },
    };
  },
};
</script>

<style scoped>
.page-links {
  padding: 100px 0 100px 0;
  text-align: center;
}

.page-links h1 {
  font-size: 55px;
  line-height: 70px;
  font-weight: 500;
  text-transform: uppercase;
  margin-bottom: 15px;
  color: #fff;
}

.page-links .page-list {
  padding: 0px;
  position: relative;
}

.page-links .list-item {
  display: inline-block;
  padding-left: 30px;
}

.page-links .list-item a {
  text-decoration: none;
  font-size: 18px;
  font-weight: 400;
  text-transform: uppercase;
  font-family: "Muli", sans-serif;
  color: #fff;
}

.page-links .page-list .list-item1 {
  display: inline-block;
  position: relative;
  padding-left: 30px;
  font-size: 18px;
  font-weight: 400;
  text-transform: uppercase;
}

.page-links .page-list .list-item1:after {
  position: absolute;
  left: 7px;
  top: 2px;
  font-weight: 700;
  content: "|";
  font-family: "Rubik", sans-serif;
  color: #fff;
  line-height: 20px;
}

.about-us .about-us-info {
  width: 60%;
  position: relative;
  padding-top: 100px;
  padding-bottom: 100px;
}

.about-us .about-us-text {
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}

.about-us .about-us-content {
  padding: 68px 55px 75px;
  background-color: #f2f3f5;
}

.about-us .about-us-content .short-title {
  font-family: "Muli", sans-serif;
  font-size: 20px;
  font-weight: 400;
  color: red;
  text-transform: uppercase;
}

.about-us .about-us-content .title {
  font-family: "Muli", sans-serif;
  font-size: 35px;
  font-weight: 500;
  text-transform: uppercase;
  margin: 26px 0 28px;
}

.about-us .about-us-content .paragraph {
  font-size: 16px;
  color: #7a7a7a;
  font-weight: 400;
}

.about-us .about-us-content .contact-us-btn {
  border-bottom: 2px solid red;
  border-radius: 0px;
  padding: 0 0 5px 0;
}

.about-us .about-us-content .contact-us-btn:hover {
  border-bottom: 2px solid red;
  border-top: 0;
  border-left: 0;
  border-right: 0;
  border-radius: 0px;
  padding: 0 0 5px 0;
}

.costumer-feedback {
  padding-bottom: 100px;
}

.costumer-feedback .main-row {
  margin-bottom: 35px;
}

.costumer-feedback .main-title {
  font-size: 48px;
  font-weight: 500;
  text-transform: uppercase;
  margin-top: -12px;
  margin-bottom: 12px;
  text-align: center;
}

.costumer-feedback .main-title span {
  color: #7a7a7a;
  font-weight: 400;
}

.costumer-feedback .main-paragraph {
  font-size: 16px;
  color: #7a7a7a;
  text-align: center;
  font-weight: normal;
}

.costumer-feedback .costumer-carousel {
  width: 85%;
  margin: auto;
}

.costumer-feedback .card {
  width: 70%;
  margin: auto;
  border-radius: 0;
  border: 0;
  background-color: #f2f3f5;
}

.costumer-feedback .card .card-body {
  padding: 28px 50px 37px;
}

.costumer-feedback .card .card-body .card-text {
  font-family: "Muli", sans-serif;
  font-size: 28px;
  color: #7a7a7a;
  text-transform: initial;
  margin: 100px 0 32px;
}

.costumer-feedback .card .card-body .costumer-name {
  font-family: "Muli", sans-serif;
  font-size: 18px;
  color: #333333;
  text-transform: uppercase;
  padding-left: 40px;
  position: relative;
}

.costumer-feedback .card .card-body .costumer-name:after {
  content: "";
  position: absolute;
  left: 0;
  top: 11px;
  width: 30px;
  height: 3px;
  background-color: red;
}

.news {
  padding-bottom: 100px;
}

.news .main-row {
  margin-bottom: 35px;
}

.news .main-title {
  font-size: 48px;
  font-weight: 500;
  text-transform: uppercase;
  margin-top: -12px;
  margin-bottom: 12px;
  text-align: center;
}

.news .main-title span {
  color: #7a7a7a;
  font-weight: 400;
}

.news .main-paragraph {
  font-size: 16px;
  color: #7a7a7a;
  text-align: center;
  font-weight: normal;
}

.news .content {
  background-color: #f9f9f9;
  padding: 30px 30px 36px 30px;
  margin-top: -63px;
  position: relative;
  z-index: 2;
  width: 90%;
  left: 5%;
}

.news .post-meta .meta-item {
  display: inline-block;
  font-family: "Muli", sans-serif;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  margin-right: 15px;
}

.news .blog-title {
  font-size: 24px;
  font-weight: 500;
  text-transform: uppercase;
  margin-bottom: 19px;
  -webkit-transition: all linear 0.2s;
  transition: all linear 0.2s;
}

.news .info {
  font-size: 16px;
  color: #7a7a7a;
  font-weight: normal;
  text-decoration: none;
}

.news .borderless-btn {
  border-bottom: 2px solid red;
  border-radius: 0px;
  padding: 0 0 5px 0;
  text-transform: uppercase;
  text-decoration: none !important;
  color: red;
}
</style>
