<template>
    <NavbarView />
    <section id="user">
        <div class="container">
            <p class="breadcrumbs"><a href="#"> Home </a>/ Profili im</p>
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="profile-title">Profili im</h2>
                    <div class="nav flex-row flex-md-column align-items-start nav-pills me-md-3" id="v-pills-tab"
                        role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" 
                        type="button" role="tab" :href="`/user-profile`">Të dhënat</a>
                        <a class="nav-link" id="v-pills-profile-tab"
                            type="button" role="tab" :href="`/user-profile`">Adresa</a>
                        <a class="nav-link" id="v-pills-messages-tab"
                            type="button" role="tab" :href="`/user-profile`">Porositë</a>
                        <a class="nav-link" id="v-pills-settings-tab" :href="`/user-profile`"
                            type="button" role="tab">Kujdesi ndaj
                            klientit</a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="thankyou-page">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <img :src="check" alt="success" class="success-img">
                                        <p class="success-message">Verifikimi i email u krye me sukses.</p>
                                        <p class="details">Mund të vazhdoni shopping në dyqanin tonë.</p>
                                        <p class="title">Ju Falemnderit!</p>
                                        <a href="/" class="back-homepage">Kthehu në Homepage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <FooterView />
</template>
<script>
import NavbarView from './NavbarView.vue';
import FooterView from './FooterView.vue';
import check from "../assets/check-mark.png";
import logo from "../assets/logo-klaudio.svg";


export default {
    components: {
        NavbarView,
        FooterView
    },
    data() {
        return {
            check: check,
            logo: logo,
        }
    }
}
</script>
<script setup>

</script>
<style scoped>
#orderModal .total {
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    color: #020202;
}

#orderModal .modal-header {
    border-bottom: 0px;
    padding-top: 0;
    padding-bottom: 0;
}

#user #orderModal .modal-dialog {
    max-width: 1000px;
}

#orderModal .modal-dialog .modal-content {
    border-radius: 0;
    padding: 40px;
}

#orderModal .shopping-bag .title {
    margin-top: 0px;
    margin-bottom: 10px;
}

#orderModal .products-row {
    border: 1px solid #e5e5e5;
    margin-top: 10px;
    padding: 40px;
}

.bag-products .bag-product {
    width: calc(100% / 5) !important;
    padding: 0 5px;
    margin-right: 6px !important;
}

.bag-product .bag-product-name {
    font-size: 12px;
    text-align: start;
    color: #767676;
    text-overflow: ellipsis;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
}

.bag-product-price {
    text-align: start;
    font-size: 15px;
    font-weight: 500;
}

.modal-trigger {
    text-decoration: underline !important;
    cursor: pointer;
}

#user .customer-care {
    color: #939393;
    width: 80%;
}

.nav-pills .nav-link.active {
    background-color: unset !important;
}

.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    background-color: unset !important;
}

#user {
    padding-top: 240px;
    padding-bottom: 40px;
}

#user .container .col-lg-3 {
    border: 1px solid #fff;
    border-right: 1px solid gainsboro;
    background-color: #fff;
    padding: 17px;
}

#user .container .col-lg-9 {
    border: 1px solid #fff;
    background-color: #fff;
    padding: 25px;
}

#user .breadcrumbs,
#user .breadcrumbs a {
    font-size: 0.7rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    color: #666;
}

#user .container h3 {
    font-family: 'Muli', sans-serif;
    font-weight: bold;
    font-size: 30px;
}

#user h2 {
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    font-size: 1.1rem;
}

#user .container .nav1 {
    display: flex;
    flex-direction: column;
}

#user .nav-link {
    font-family: 'Muli', sans-serif;
    font-weight: 600;
    font-size: 1rem;
    color: #666;
    text-decoration: none;
    transition: all .2s;
    padding: 10px 0px;
}

#user .container .nav-link:hover {
    font-family: 'Muli', sans-serif;
    font-weight: 600;
    font-size: 1.1rem;
    color: #000;
    text-decoration: none;
}

#user .nav-link2 {
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    font-size: 0.8rem;
    color: #666;
    text-decoration: none;
    background: transparent;
    border: 0;
    padding-right: 10px;
}

#user .container .nav-link2:hover,
#user .nav-link2.active {
    font-size: 0.8rem !important;
    border-bottom: 1px solid #020202 !important;
}

#user label {
    color: #666;
    font-family: 'Muli', sans-serif;
    font-weight: 400;
}

#user input {
    width: 50%;
    border: 1px solid #E5E5E5;
    height: 39px;
    outline: none;
    color: #020202;
    margin: 0 0 15px;
    padding: 0px 10px;
}

#user input:hover {
    border-color: #222;
}

#user input:focus {
    border-color: #222;
}

#user .nav-item:hover {
    border: 0;
}

#user .submit {
    background-color: #222222;
    color: #fff;
    height: 44px;
    margin: 21px 0 13px;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    text-transform: uppercase;
    width: 20%;
    border: 0;
    box-shadow: none;
}

#user .submit:hover {
    background-color: #666;
    cursor: pointer;
    box-shadow: none;
    border: 0;
}

#user .user-btn {
    border: 0;
    border-radius: 0;
    text-transform: uppercase;
    background-color: #222222;
    color: #fff;
    height: 44px;
    margin-bottom: 10px;
    padding: 0 21px;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
}

#user .user-btn:hover {
    border: 0;
    background-color: #666;
    cursor: pointer;
}

#user .user-btn:focus {
    outline: 0;
}

#user .adresa {
    position: relative;
    border: 1px solid #e5e5e5;
    padding: 20px;
    margin-top: 10px;
    transition: all 0.4s;
}

#user .adresa .name {
    font-size: 1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    margin-bottom: 0;
    color: #959595;
}

#user .adresa .address-details {
    margin-bottom: 0;
    font-size: 0.8rem;
    color: #959595;
}

#user .adresa:hover {
    border: 1px solid #020202;
    transition: all 0.4s;
}

#user .adresa a {
    font-size: 0.8rem;
    display: flex;
    justify-content: end;
}

#user .container .nav2 li a {
    border: 0;
    color: #fff !important;
    padding: 9px 12px;
    font-family: 'Muli', sans-serif;
    font-weight: bold;
}

#user .statusi {
    width: 50%;
    border: 1px solid #e5e5e5;
    padding: 20px 20px 9px;
    margin: 7px 0 15px;
    transition: all 0.4s;
}

#user .statusi:hover {
    border: 1px solid #020202;
    transition: all 0.4s;
}

.active {
    color: #000 !important;
}

#user #adresa .modal-dialog input {
    width: 100% !important;
}

#user #adresa .modal-dialog .submit {
    width: 35% !important;
}

#user .modal-dialog {
    max-width: 500px;
}

.bag-product .main-details {
    position: relative;
}

.bag-product-quantity {
    line-height: 26px;
    background-color: rgba(255, 255, 255, 0.9);
    bottom: 0;
    text-align: center;
    font-size: 13px;
    color: #222;
    font-weight: 500;
    position: absolute;
    width: 100%;
}

@media (max-width: 900px) {
    .bag-product-quantity {
        font-size: 0.7rem;
        line-height: 1.4rem;
    }

    #user #orderModal .main-details,
    #user #orderModal .main-details .img-fluid {
        border: 1px solid transparent;
        border-radius: 8px;
    }

    .bag-product-price {
        font-size: 0.7rem;
        font-weight: 200;
        font-family: 'Rubik', sans-serif;
    }

    .bag-product .bag-product-name {
        word-break: normal;
        max-height: 2.1rem;
        text-overflow: ellipsis;
        width: calc(100% - 30px);
        white-space: normal;
        overflow: hidden;
    }

    #user #orderModal .modal-header {
        background: #fff;
    }

    #user #orderModal .modal-content {
        background: #f5f5f5;
    }

    #user #orderModal .products-row {
        padding: 10px;
        border: 0;
        background: #fff;
    }

    #user #orderModal .row.bg-grey {
        padding-left: 10px;
        padding-right: 10px;
    }

    #user #orderModal .row.bg-grey .col {
        background: #f5f5f5;
        border: 1px solid transparent;
        border-radius: 8px;
        padding: 3px 10px;
    }

    #user #orderModal .row.bg-grey .total {
        font-family: 'Muli', sans-serif;
        font-weight: 200;
        font-size: 0.7rem;
        margin-bottom: 0;
        color: #222222;
    }

    #user #orderModal .container-fluid:last-child {
        background: #fff;
    }

    .bag-product .main-details {
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .main-details .img-fluid {
        width: 80px;
        height: auto;
    }

    #orderModal .modal-dialog .modal-content {
        padding: 0px;
    }

    #orderModal .products-row {
        padding: 5px;
    }

    #orderModal .products-row .bag-product {
        display: flex;
        flex-direction: row;
        justify-content: start;
    }

    #user .customer-care {
        width: 100%;
        font-size: 0.7rem;
    }

    .profile-title {
        display: none;
    }

    #user input {
        width: 100%;
    }

    #user .submit {
        width: 50%;
    }

    #user .container h3 {
        font-family: 'Muli', sans-serif;
        font-weight: bold;
        font-size: 1.2rem;
        text-align: center;
    }

    #user .container .nav-link {
        font-size: 16px;
    }

    #user .container .nav-link:hover {
        font-size: 17px;
    }

    #user .adresa,
    #user .statusi {
        width: 100%;
    }

    #user {
        padding-top: 180px;
    }

    #user .container .nav-link {
        font-weight: 300;
        font-size: 0.8rem;
        padding: 0 9px;
    }

    #user .nav-link.active,
    #user .container .nav-link:hover {
        border-bottom: 1px solid #020202;
        border-radius: 0;
        font-size: 0.8rem;
        color: #020202;
        font-weight: 500;
    }
}

input::-webkit-input-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

input:-moz-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

input::-moz-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

input:-ms-input-placeholder {
    color: #767676;
    position: absolute;
    top: 10px;
    font-size: 0.9rem;
}

input:focus::-webkit-input-placeholder {
    top: 0;
    font-size: 0.7rem;
    -webkit-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}

input:focus:-moz-placeholder {
    top: 0;
    font-size: 0.7rem;
    -moz-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}

input:focus::-moz-placeholder {
    top: 0;
    font-size: 0.7rem;
    -moz-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}

input:focus:-ms-input-placeholder {
    top: 0;
    font-size: 0.7rem;
    -ms-transition: top 0.2s, font-size 0.2s;
    transition: top 0.2s, font-size 0.2s;
}
.logo-bar {
    height: inherit;
    background: transparent;
    border-bottom: 1px solid #e5e5e5;
}

.logo-bar a {
    text-transform: uppercase;
    font-size: 0.8rem;
}

.logo-bar a span {
    border-top: 4px solid transparent;
    border-left: 4px solid #999;
    border-bottom: 4px solid transparent;
    margin-top: 5px;
}

.icons a .span-arrow {
    top: 0px;
}

@media(max-width: 900px) {
    .icons a .span-arrow {
        top: 15px !important;
    }

    .thankyou-page {
        padding: 60px 20px !important;
    }
}

.logo-bar img {
    width: 150px;
}

.thankyou-page {
    padding: 60px;
}

.success-img {
    width: 100px;
    height: auto;
}

.success-message {
    margin-top: 30px;
    font-family: 'Rubik', sans-serif;
    font-weight: 600;
    font-size: 1.2rem;
}

.title {
    font-size: 1.2rem;
}

.icon {
    font-size: 32px;
    font-weight: bold;
    letter-spacing: 32px;
    position: relative;
}

.back-homepage {
    padding: 10px 20px;
    background: #020202;
    border: 1px solid #020202;
    font-family: 'Rubik', sans-serif;
    font-size: 1rem;
    color: #fff;
}

.back-homepage:hover {
    background: #D31621;
}
</style>