<template>
<div class="footer">
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-lg-2 order-sm-4 order-lg-1">
            <div class="logo-footer">
                <img :src="logo" />
            </div>
        </div>
        <div class="col-sm-4 col-lg-2 order-sm-1 order-lg-2">
            <ul>
                <li class="title">Rreth Kompanisë</li>
                <li><a href="/whoweare">Kush jemi</a></li>
                <li><a href="/whoweare">Dyqani fizik</a></li>
                <li><a href="/terms">Termat dhe Kushtet</a></li>
            </ul>
        </div>
        <div class="col-sm-4 col-lg-2 order-sm-2 order-lg-3">
            <ul>
                <li class="title">Shërbimi i Klientit</li>
                <li><a href="/transport">Transporti</a></li>
                <li><a href="/payment">Pagesat</a></li>
                <li><a href="/buy">Si të blej</a></li>
                <li><a href="/faq">FAQ</a></li>
            </ul>
        </div>
        <div class="col-sm-4 col-lg-2 order-sm-3 order-lg-4">
            <ul>
                <li class="title">Llogaria ime</li>
                <li><a href="/user-profile">Profili im </a></li>
                <li><a href="/user-profile">Porositë e mia</a></li>
                <li><a href="/user-profile">Adresat e mia</a></li>
            </ul>
        </div>
        <div class="col-sm-6 col-lg-4 pr-0 order-sm-5 order-lg-5">
            <div class="subscribe">
                <p class="title">Regjistrohu për produktet dhe ofertat më të fundit</p>
                <!-- <form action="post" class="d-flex justify-content-start">
                    <input type="text" placeholder="Adresa e email">
                    <button class="self-align-center">Regjistrohu</button>
                </form> -->
                <!-- Begin Mailchimp Signup Form -->
                <div id="mc_embed_signup">
                    <form action="https://klaudiofashion.us21.list-manage.com/subscribe/post?u=f77e8714914493a12e036a2bc&amp;id=3be3f74345&amp;f_id=0079d3e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self">
                        <div id="mc_embed_signup_scroll" class="d-flex">  	
                <div class="mc-field-group">
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL"  placeholder="Adresa e email" required>
                    <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
                </div>
                    <div id="mce-responses" class="clear foot">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>	<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f77e8714914493a12e036a2bc_3be3f74345" tabindex="-1" value=""></div>
                        <div class="optionalParent">
                            <div class="clear foot">
                                <input type="submit" value="REGJISTROHU" name="subscribe" id="mc-embedded-subscribe" class="button">
                            </div>
                        </div>
                    </div>
                </form>
                </div>

                <!--End mc_embed_signup-->

            </div>
            <div class="d-flex justify-conent-start socials">
                <p class="title">Na gjeni në:</p>
                <a href="https://www.instagram.com/klaudiofashionoutlet/?hl=en"><img :src="instagram"/></a>
                <a href="https://www.facebook.com/pages/category/clothing-store/Klaudio-Fashion-884212234982309/"><img :src="facebook"/></a>
                <a href=""><img :src="ytube"/></a>
            </div>
        </div>
    </div>
    <hr class="horizontal-line" />
    <div class="row">
        <div class="col-12 text-center">
            <p class="copyright">©2022 KLAUDIO Fashion All Rights Reserved &nbsp &nbsp Made with ❤️ by Big Media Expert</p>  
            <div class="d-flex justify-content-center links">
                <a href="">Privacy Center</a>
                <a href="">Privacy & Cookie Policy</a>
                <a href="">Manage Cookies</a>
                <a href="">Terms & Conditions</a>
                <a href="" class="last">Copyright Notice</a>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="mobile-footer">
    <div class="container-fluid">

        <div class="logo-footer ">
            <img :src="logo" />
        </div>

        <div id="footer-mobile-col1">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Rreth Kompanisë
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#description">
                    <div class="accordion-body">
                        <ul class="ps-0">
                            <li><a href="/whoweare">Kush jemi</a></li>
                            <li><a href="/whoweare">Dyqani fizik</a></li>
                            <li><a href="/terms">Termat dhe Kushtet</a></li>
                        
                        </ul>
                    </div>
                </div>

            </div>
            <div id="footer-mobile-col1" style="width:100%;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Shërbimi i Klientit
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#description">
                        <div class="accordion-body">
                            <ul class="ps-0">
                                <li><a href="/transport">Transporti</a></li>
                                <li><a href="/payment">Pagesat</a></li>
                                <li><a href="/buy">Si të blej</a></li>
                                <li><a href="/faq">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer-mobile-col1" style="width:100%;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Llogaria ime
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#description">
                        <div class="accordion-body">
                            <ul class="ps-0">
                                <li><a href="/user-profile">Profili im </a></li>
                                <li><a href="/user-profile">Porositë e mia</a></li>
                                <li><a href="/user-profile">Adresat e mia</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="horizontal-line" />
        <div class="col-sm-6 col-lg-4 pr-0 order-sm-5 order-lg-5">
            <div class="subscribe">
                <p class="title">Regjistrohu për produktet dhe ofertat më të fundit</p>
                <!-- Begin Mailchimp Signup Form -->
                <div id="mc_embed_signup">
	<form action="https://klaudiofashion.us21.list-manage.com/subscribe/post?u=f77e8714914493a12e036a2bc&amp;id=3be3f74345&amp;f_id=0079d3e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self">
    	<div id="mc_embed_signup_scroll" class="d-flex">  	
<div class="mc-field-group">
    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL"  placeholder="Adresa e email" required>
    <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
</div>
    <div id="mce-responses" class="clear foot">
   	 <div class="response" id="mce-error-response" style="display:none"></div>
   	 <div class="response" id="mce-success-response" style="display:none"></div>
    </div>	<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f77e8714914493a12e036a2bc_3be3f74345" tabindex="-1" value=""></div>
    	<div class="optionalParent">
        	<div class="clear foot">
            	<input type="submit" value="REGJISTROHU" name="subscribe" id="mc-embedded-subscribe" class="button">
        	</div>
    	</div>
	</div>
</form>
</div>

<!--End mc_embed_signup-->

            </div>
            <hr class="horizontal-line" />
            <div class="socials text-center">
                <p class="title">Na gjeni në:</p>
                <a href="https://www.instagram.com/klaudiofashionoutlet/?hl=en"><img :src="instagram"/></a>
                <a href="https://www.facebook.com/pages/category/clothing-store/Klaudio-Fashion-884212234982309/"><img :src="facebook"/></a>
                <a href=""><img :src="ytube"/></a>
            </div>
        </div>
        <hr class="horizontal-line" />
        <div class="row">
            <div class="col-12 text-center">
              
                <div class="d-flex flex-column justify-content-end text-start links">
                    <a href="" class="policy-doc">Privacy Center <span>›</span></a>
                    <a href="" class="policy-doc">Privacy & Cookie Policy <span>›</span></a>
                    <a href="" class="policy-doc">Manage Cookies <span>›</span> </a>
                    <a href="" class="policy-doc">Terms & Conditions <span>›</span> </a>
                    <a href="" class="policy-doc last">Copyright Notice <span>›</span></a>
                </div>
                <hr class="horizontal-line" />
                <p class="copyright">©2022 KLAUDIO Fashion All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
</template>


<script>
import logo from "../assets/logo-klaudio.png"
import facebook from "../assets/facebook.svg"
import instagram from "../assets/instagram.svg"
import ytube from "../assets/ytube.svg"

export default {
  data: function () {
    return {
      logo: logo,
      facebook: facebook,
      instagram: instagram,
      ytube: ytube
    }
  }
}
</script>
<style>

.mc-field-group{
    width:73%;
}
.optionalParent{
    width:27%;
}
#mc-embedded-subscribe{
    background-color: #D31621;
    color:white;
}
.mobile-footer {
    display:none;
}
.footer {
 background-color: #f5f5f5;
 padding:60px 80px 30px;
}
.footer ul {
    list-style-type: none;
    font-family: 'Muli', sans-serif;
}
.footer ul li.title {
    font-family: 'Muli', sans-serif;
    font-weight:800;
    margin-bottom:10px;
    font-size: 1.2rem;
}
.footer ul li {
    font-size: 1.1rem;
}
.footer ul li a {
    color: #474747;
}
.footer .subscribe .title, .footer .socials .title {
    font-family: 'Muli', sans-serif;
    font-weight:800;
    margin-bottom:10px;
    font-size: 1rem;
}
.footer .subscribe input {
    background: #fff;
    height:45px;
    width:100%;
    padding-left:10px;
    padding-right:10px;
    font-family: 'Muli', sans-serif;
    font-weight:400;
    box-shadow: -5px 10px 11px -1px rgba(0,0,0,0.12);
    -webkit-box-shadow: -5px 10px 11px -1px rgba(0,0,0,0.12);
    -moz-box-shadow: -5px 10px 11px -1px rgba(0,0,0,0.12);
    border:0;
}
.footer .subscribe button {
    font-family: 'Muli', sans-serif;
    font-weight:600;
    text-transform: uppercase;
    padding-left:20px;
    padding-right:20px;
    color: #fff;
    font-size: 1rem;
    border:0;
    background-color: #D31621;
    box-shadow: -5px 10px 11px -1px rgba(0,0,0,0.12);
    -webkit-box-shadow: -5px 10px 11px -1px rgba(0,0,0,0.12);
    -moz-box-shadow: -5px 10px 11px -1px rgba(0,0,0,0.12);
}
.footer .socials {
    margin-top:40px;
}
.footer .socials .title {
    margin-right:20px;
}
.footer .socials a img {
    width:22px;
    height:auto;
    margin-right:20px;
}
.horizontal-line {
    margin-top:40px;
    margin-bottom: 20px;
}
.footer .copyright {
    font-family: 'Muli', sans-serif;
    font-weight:400;
    font-size: 1.1rem;
    color: #474747;
    margin-bottom: 10px;
}
.footer .links a {
    margin-right:20px;
    color:#474747;
    font-family: 'Muli', sans-serif;
    font-weight:400;
    margin-bottom:10px;
    font-size: 1rem;
    border-right: 1px solid #474747;
    padding-right:20px;
}
.footer .links a.last {
    border-right: none !important;
}
@media(max-width:1300px) {
    .footer ul li.title {
    font-size: 1rem;
}
.footer ul li {
    font-size: 0.9rem;
}
.logo-footer, .logo-footer img {
    width:100%;
}
.footer .copyright {
    font-size: 1rem;
}
.footer .links a {
    margin-right:15px;
    font-size: 0.9rem;
    padding-right:15px;
}
}
@media(max-width:1150px) {
    .footer {
 padding:60px 50px 30px;
}
}
@media(max-width:1000px) {
  .logo-footer, .logo-footer img {
    width:70%;
}
.footer ul {
    margin-bottom:40px;
    padding-left:0;
}
.icons a {
    margin:0px 5px;
}
}
@media(max-width:900px) {
.logo-footer {
    margin-bottom:10px;
    padding-top:20px;
} 
.footer {
    padding:20px;
    margin-bottom:50px;
}
.footer .links {
    flex-wrap: wrap;
}
.footer .links a {
    margin-right:5px;
    font-size: 0.8rem;
    padding-right:5px;
}

.footer{
    display: none;
}
.mobile-footer {
background-color: #F5F5F5;
display: block;
}

.mobile-footer .logo-footer{
    display:flex;
    justify-content: center;
    margin:auto;
}
#footer-mobile-col1 {
    padding-top: 20px;
}
#footer-mobile-col1 .accordion-header {
    font-family: 'Muli', sans-serif;
    font-weight: 700;
    color: black;
}
#footer-mobile-col1 li a {
    font-family: 'Muli', sans-serif;
    font-weight: 400;
    color: #474747;
}
#footer-mobile-col1 .accordion-button.collapsed::after {
    background-image: url("../assets/plus.png") !important;
}
#footer-mobile-col1 .accordion-button:not(.collapsed)::after {
    background-image: url("../assets/remove.png") !important;
}
#footer-mobile-col1 .accordion-button:not(.collapsed)::after,
#footer-mobile-col1 .accordion-button.collapsed::after {
    width: 10px !important;
    height: 10px !important;
    background-size: 10px !important;
}
#footer-mobile-col1.accordion-button {
    padding: 0px !important;
}
#footer-mobile-col1 .accordion-body {
    margin-top: 1rem;
    padding-left: 0px;
}
#footer-mobile-col1 ul {
    text-decoration: none;
    list-style: none;
}
.links .policy-doc {
    display: flex;
    justify-content: space-between;
    color: #474747;
    font-weight: 500;
    font-family: 'Muli', sans-serif;
    font-size:16px;

}
.mobile-footer form{
  display: flex;
  flex-direction: column;
}
.mobile-footer .subscribe input {
  border:1px solid rgba(179, 179, 179, 1);
    background: #fff;
    height: 45px;
    width: 100%;
    padding-left: 10px;
    padding-right: 10px;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
    box-shadow: -5px 10px 11px -1px rgba(0, 0, 0, 0.12);
    -webkit-box-shadow: -5px 10px 11px -1px rgba(0, 0, 0, 0.12);
    -moz-box-shadow: -5px 10px 11px -1px rgba(0, 0, 0, 0.12);
}
.mobile-footer .subscribe input.placeholder {
    text-align: center;
}
.mobile-footer .subscribe button {
    font-family: 'Muli', sans-serif;
    font-weight: 600;
    text-transform: uppercase;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-top: 14px;
    color: #fff;
    font-size: 1rem;
    background-color: #D31621;
    box-shadow: -5px 10px 11px -1px rgb(0 0 0 / 12%);
    -webkit-box-shadow: -5px 10px 11px -1px rgb(0 0 0 / 12%);
    -moz-box-shadow: -5px 10px 11px -1px rgba(0, 0, 0, 0.12);
}
.mobile-footer .socials {
    margin-top: 20px;
}
.mobile-footer .socials .title {
    margin-right: 20px;
    font-family: 'Muli', sans-serif;
    font-weight: 600;
    font-size:12px;

}
.mobile-footer .socials a img {
    max-height: 22px;
    margin-right: 20px;
}
.mobile-footer .subscribe .title,
.mobile-footer .socials .title {
    font-family: 'Muli', sans-serif;
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 12px;
}
.mobile-footer  .horizontal-line {
    margin-top: 20px;
    margin-bottom: 20px;
}
.subscribe button {
    border:none;
}
#footer-mobile-col1 .accordion-item .accordion-button {
    font-weight: 500;
}
.optionalParent{
    width:40%;
}
}
.accordion-item {
    background: transparent !important;
}
</style>