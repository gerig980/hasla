<template>
<section id="user">
    <div class="container">
        <p class="breadcrumbs"><a href="#"> Home </a>/ Profili im</p>
        <div class="row">
            <div class="col-lg-3">
                <h2 class="profile-title">Profili im</h2>
                <div class="nav flex-row flex-md-column align-items-start nav-pills me-md-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#profili" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Të dhënat</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#adresa" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Adresa</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#porosite" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Porositë</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#klientit" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Kujdesi ndaj klientit</button>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="profili" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h2 class="text-left">Informacion</h2>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <form action="#" >
                                    <label for="email">Email:</label><br>
                                    <input type="email" name="email" :value="user_data.email" readonly><br>
                                    <label for="username">Username:</label><br>
                                    <input type="text" name="username" :value="user_data.username" autocomplete="off"><br>
                                    <label for="password">Password:</label><br>
                                    <input type="password" name="password" autocomplete="off"><br>
                                    <button type="submit" class="submit">Ruaj</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="adresa" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h2 class="text-left">Adresa ime</h2>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div>
                                    <button type="button" class="btn shto-adrese user-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Shto Adresë</button>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div v-for="(userAdd, index) in user_data.addresses" :key="index"  class="col col-md-6">
                                                <div class="adresa">
                                                    <p class="name">{{ user_data.name }}</p>
                                                    <p class="address-details">{{ user_data.phone }}</p>
                                                    <p class="address-details">{{ userAdd.address }}</p>
                                                    <p class="address-details">{{ userAdd.city }}, {{ userAdd.country }}</p>
                                                    <form><input type="hidden" name="address_id" id="address_id" :value="userAdd.id"><a class="delete-anchertag" v-on:click="deleteAddress(); this.address_id = userAdd.id">Delete</a></form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Shto Adresë</h5>
                                                    <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <form v-on:submit.prevent="addAddress">
                                                        <div class="row">
                                                            <div class="col-lg-6 text-left">
                                                                <select name="country_id" v-model="form.country_id" class="form-control" @change="getCities" required>
                                                                    <option  value="" disabled selected>*Shteti</option>
                                                                    <option v-for="(country, index) in countries" :key="index" :value="country.id">{{ country.name }}</option>
                                                                </select>
                                                                <input type="hidden" name="user_id" v-model="form.user_id">
                                                            </div>
                                                            <div class="col-lg-6 text-left">
                                                                <select name="city_id" v-model="form.city_id" class="form-control" required>
                                                                    <option  value="" disabled selected>*Qyteti</option>
                                                                    <option v-for="(city, index) in cities" :key="index" :value="city.id" :cost="city.cost">{{ city.name }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-2">
                                                            <div class="col-lg-12 text-left">
                                                                <input type="text" name="address" placeholder="*Adresa" v-model="form.address"><br>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 text-left">
                                                                <input type="text" name="other_phone" placeholder="*Numër Telefoni" v-model="form.other_phone" required><br>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="submit">Ruaj adresë</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="porosite" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h2 class="text-left">Porositë sipas statusit</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-md-9 col-lg-10">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link nav-link2 active" id="derguar-tab" data-bs-toggle="tab" data-bs-target="#derguar" type="button" role="tab" aria-controls="derguar" aria-selected="true">Të dërguara</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link nav-link2" id="konfirmuar-tab" data-bs-toggle="tab" data-bs-target="#konfirmuar" type="button" role="tab" aria-controls="konfirmuar" aria-selected="false">Konfirmuar</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link nav-link2" id="dorezuar-tab" data-bs-toggle="tab" data-bs-target="#dorezuar" type="button" role="tab" aria-controls="dorezuar" aria-selected="false">Dorëzuar</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div id="derguar" class="tab-pane show active" role="tabpanel">
                                                <div class="row mt-4" v-for="order in orders" :key="order.id">
                                                    <div class="col-md-12" v-if="(order.order_status_id == 2 || order.order_status_id == 1)">
                                                        <div class="statusi">
                                                            <h6>Totali i porosisë: {{ order.grant_total }} Lekë</h6>
                                                            <h6>Statusi: <span class="btn btn-sm btn-outline-success">Dërguar</span></h6>
                                                            <a class="modal-trigger" @click="printDocument($event)" :data-orderId="order.id">Detajet e porosisë</a>
                                                        </div>
                                                    </div>
                                                    <div :id="`divToPrint${order.id}`" style="display:none;">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="border:0px;"><img style="max-width:180px;max-height:40px;" :src="logo"></td>
                                                                                <td style="border:0px; margin-left:300px;">
                                                                                    <p style="margin-bottom:0;font-size:14px;">Kodi i Porosisë: <span
                                                                                            style="font-weight:bold;">{{ order.order_code }}</span></p>
                                                                                    <p style="margin-bottom:0;font-size:14px;">Data: <span style="font-weight:bold;">{{ new
                                                                                            Date(order.created_at).toLocaleDateString() }}</span></p>
                                                                                    <p style="margin-bottom:0;font-size:14px;">Adresa: <span style="font-weight:bold;">{{
                                                                                            order.address }} <br> {{ order.city }}, {{ order.country }}</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr style="background-color:#f5f5f5; border:1px solid transparent;" />
                                                                    <div class="products p-2">
                                                                        <table class="table table-borderless" style="margin-right: 0; margin-left: 20px;">
                                                                            <tbody>
                                                                                <tr class="add" style="background-color:#fafafa;">
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        #</td>
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        Detajet e Produktit</td>
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        Çmimi x Sasia</td>
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        Total</td>
                                                                                </tr>
                                                                                <span style="display:none;">{{ productsTotal = 0 }}</span>
                                                                                <tr class="content" v-for="(details, index) in order.order_details" :key="index">
                                                                                    <td style="border:0px">{{ index + 1 }}</td>
                                                                                    <td style="border:0px">
                                                                                        <div class="product-details" style="margin-right:300px;">
                                                                                            <span style="font-weight:bold;">{{ details.product }}</span> -
                                                                                            <span style="color: #888; font-size:12px;">{{ details.color[0] }}&nbsp;</span>
                                                                                            <span style="color: #888; font-size:12px;">{{ details.size[0] }}</span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td style="border:0px">{{ details.quantity }} x <span
                                                                                            style="font-weight:bold; font-size:14px;">{{ details.price }} Lekë</span></td>
                                                                                    <td class="text-center" style="border:0px;">{{ details.quantity*details.price }} Lekë
                                                                                        <span style="display:none;">{{ productsTotal = productsTotal + details.quantity *
                                                                                            details.price }}</span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr />
                                                    
                                                                    <div>
                                                                        <table class="table table-borderless" style="margin-right: 0; margin-left: 450px;">
                                                                            <tbody>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Totali i Produkteve:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">{{ productsTotal }} Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Posta Shipping:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">{{ order.shipping_charges }}
                                                                                        Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Vlerë Kuponi:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">- {{ order.coupon_amount }}
                                                                                        Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Totali i faturës:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px; font-weight:bold;">{{
                                                                                        order.grant_total }} Lekë</td>
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
                                            <input type="hidden" id="user_id" :value="userId">
                                            <div id="konfirmuar" class="tab-pane fade" role="tabpanel">
                                                <div class="row mt-4" v-for="order in orders" :key="order.id">
                                                    <div class="col-md-12" v-if="(order.order_status_id == 4)">
                                                        <div class="statusi">
                                                            <h6>Totali i porosisë: {{ order.grant_total }} Lekë</h6>
                                                            <h6>Statusi: <span class="btn btn-sm btn-outline-primary">Konfirmuar</span></h6>
                                                            <a class="modal-trigger" @click="printDocument($event)" :data-orderId="order.id">Detajet e porosisë</a>
                                                        </div>
                                                    </div>
                                                    <div :id="`divToPrint${order.id}`" style="display:none;">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="border:0px;"><img style="max-width:180px;max-height:40px;" :src="logo"></td>
                                                                                <td style="border:0px; margin-left:300px;">
                                                                                    <p style="margin-bottom:0;font-size:14px;">Kodi i Porosisë: <span
                                                                                            style="font-weight:bold;">{{ order.order_code }}</span></p>
                                                                                    <p style="margin-bottom:0;font-size:14px;">Data: <span style="font-weight:bold;">{{ new
                                                                                            Date(order.created_at).toLocaleDateString() }}</span></p>
                                                                                    <p style="margin-bottom:0;font-size:14px;">Adresa: <span style="font-weight:bold;">{{
                                                                                            order.address }} <br> {{ order.city }}, {{ order.country }}</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr style="background-color:#f5f5f5; border:1px solid transparent;" />
                                                                    <div class="products p-2">
                                                                        <table class="table table-borderless" style="margin-right: 0; margin-left: 20px;">
                                                                            <tbody>
                                                                                <tr class="add" style="background-color:#fafafa;">
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        #</td>
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        Detajet e Produktit</td>
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        Çmimi x Sasia</td>
                                                                                    <td
                                                                                        style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">
                                                                                        Total</td>
                                                                                </tr>
                                                                                <span style="display:none;">{{ productsTotal = 0 }}</span>
                                                                                <tr class="content" v-for="(details, index) in order.order_details" :key="index">
                                                                                    <td style="border:0px">{{ index + 1 }}</td>
                                                                                    <td style="border:0px">
                                                                                        <div class="product-details" style="margin-right:300px;">
                                                                                            <span style="font-weight:bold;">{{ details.product }}</span> -
                                                                                            <span style="color: #888; font-size:12px;">{{ details.color[0] }}&nbsp;</span>
                                                                                            <span style="color: #888; font-size:12px;">{{ details.size[0] }}</span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td style="border:0px">{{ details.quantity }} x <span
                                                                                            style="font-weight:bold; font-size:14px;">{{ details.price }} Lekë</span></td>
                                                                                    <td class="text-center" style="border:0px;">{{ details.quantity*details.price }} Lekë
                                                                                        <span style="display:none;">{{ productsTotal = productsTotal + details.quantity *
                                                                                            details.price }}</span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr />
                                                    
                                                                    <div>
                                                                        <table class="table table-borderless" style="margin-right: 0; margin-left: 450px;">
                                                                            <tbody>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Totali i Produkteve:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">{{ productsTotal }} Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Posta Shipping:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">{{ order.shipping_charges }}
                                                                                        Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Vlerë Kuponi:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">- {{ order.coupon_amount }}
                                                                                        Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Totali i faturës:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px; font-weight:bold;">{{
                                                                                        order.grant_total }} Lekë</td>
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
                                            <div id="dorezuar" class="tab-pane fade" role="tabpanel">
                                                <div class="row mt-4" v-for="order in orders" :key="order.id">
                                                    <div class="col-md-12" v-if="(order.order_status_id == 6)">
                                                        <div class="statusi">
                                                            <h6>Totali i porosisë: {{ order.grant_total }} Lekë</h6>
                                                            <h6>Statusi: <span class="btn btn-sm btn-outline-info">Dorëzuar</span></h6>
                                                            <a class="modal-trigger" @click="printDocument($event)" :data-orderId="order.id">Detajet e porosisë</a>
                                                        </div>
                                                    </div>
                                                    <div :id="`divToPrint${order.id}`" style="display:none;">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="border:0px;"><img style="max-width:180px;max-height:40px;" :src="logo"></td>
                                                                                <td style="border:0px; margin-left:300px;">
                                                                                    <p style="margin-bottom:0;font-size:14px;">Kodi i Porosisë: <span style="font-weight:bold;">{{ order.order_code }}</span></p>
                                                                                    <p style="margin-bottom:0;font-size:14px;">Data: <span style="font-weight:bold;">{{ new Date(order.created_at).toLocaleDateString() }}</span></p>
                                                                                    <p style="margin-bottom:0;font-size:14px;">Adresa: <span style="font-weight:bold;">{{ order.address }} <br> {{ order.city }}, {{ order.country }}</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr style="background-color:#f5f5f5; border:1px solid transparent;"/>
                                                                    <div class="products p-2">
                                                                        <table class="table table-borderless" style="margin-right: 0; margin-left: 20px;">
                                                                            <tbody>
                                                                                <tr class="add" style="background-color:#fafafa;">
                                                                                    <td style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">#</td>
                                                                                    <td style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">Detajet e Produktit</td>
                                                                                    <td style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">Çmimi x Sasia</td>
                                                                                    <td style="border:0.5px solid #f5f5f5;background-color:#fafafa; padding-top:10px; padding-bottom:10px;">Total</td>
                                                                                </tr>
                                                                                <span style="display:none;">{{ productsTotal = 0 }}</span>
                                                                                <tr class="content" v-for="(details, index) in order.order_details" :key="index">
                                                                                    <td style="border:0px">{{ index + 1 }}</td>
                                                                                    <td style="border:0px">
                                                                                        <div class="product-details" style="margin-right:300px;">
                                                                                            <span style="font-weight:bold;">{{ details.product }}</span> - 
                                                                                            <span style="color: #888; font-size:12px;">{{ details.color[0] }}&nbsp;</span>
                                                                                            <span style="color: #888; font-size:12px;">{{ details.size[0] }}</span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td style="border:0px">{{ details.quantity }} x <span style="font-weight:bold; font-size:14px;">{{ details.price }} Lekë</span></td>
                                                                                    <td class="text-center" style="border:0px;">{{ details.quantity*details.price }} Lekë <span style="display:none;">{{ productsTotal = productsTotal + details.quantity * details.price }}</span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr />

                                                                    <div>
                                                                        <table class="table table-borderless" style="margin-right: 0; margin-left: 450px;">
                                                                            <tbody>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Totali i Produkteve:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">{{ productsTotal }} Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Posta Shipping:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">{{ order.shipping_charges }} Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Vlerë Kuponi:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px;">- {{ order.coupon_amount }} Lekë</td>
                                                                                </tr>
                                                                                <tr class="add">
                                                                                    <td style="border:0px; font-size:14px;">Totali i faturës:</td>
                                                                                    <td style="text-align:right; border:0px; font-size:14px; font-weight:bold;">{{ order.grant_total }} Lekë</td>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="klientit" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <h2 class="text-left">Kujdesi ndaj klientit</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="customer-care">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem saepe cum
                                    suscipit ratione error obcaecati eos voluptatibus totam sit. Vel eveniet
                                    fugit tenetur reiciendis dolorum ratione debitis fugiat voluptas, sapiente
                                    in blanditiis, soluta dolores eius minus magni impedit autem dolorem quasi
                                    assumenda deleniti distinctio harum delectus? Atque ipsa tenetur quos,
                                    ratione provident est. Assumenda est, quisquam aspernatur rerum doloribus
                                    expedita! Eveniet molestias impedit eius repellendus nam maxime, aliquam
                                    dolore aperiam quos perferendis tempore nulla excepturi odit. Exercitationem
                                    deserunt tempore assumenda aliquam, quaerat at est a ipsa earum! Labore
                                    repellendus dolorem eaque obcaecati vel, assumenda ducimus temporibus veniam
                                    minima facere iusto aliquam omnis non voluptatum earum itaque architecto
                                    perferendis nulla pariatur nam quam fuga rerum nisi. Animi temporibus
                                    nesciunt libero repellat, voluptates debitis, quasi sequi maxime fugit
                                    blanditiis obcaecati optio molestias delectus qui fugiat nihil facilis
                                    cupiditate neque? Dignissimos in blanditiis vel saepe. Maiores cupiditate
                                    modi delectus quisquam! Molestias qui voluptatum voluptatem voluptate
                                    sapiente! Temporibus veritatis optio quae odit, quod enim voluptas, illum
                                    consequatur ullam quam sed asperiores, obcaecati nihil eius sit minus quia
                                    ipsum reprehenderit. Eveniet quisquam doloribus possimus a alias eius nemo
                                    blanditiis consequuntur ex mollitia qui repudiandae quasi ducimus corporis
                                    rerum fugit beatae facilis tempore, architecto cum. Perferendis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<BottomIcons/>
</template>
<script>
import $ from "jquery";
import axios from 'axios';
import imageabout1 from "../assets/about/about4.jpg";
import { useToast } from "vue-toastification";
import swal from "sweetalert2";
import BottomIcons from "./dashboard-components/BottomIcons.vue"
import pdfMake from 'pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
import htmlToPdfmake from 'html-to-pdfmake';

export default {
    props: ['orderId'],
    components: { BottomIcons },
    data() {
        return {
            logo: 'data:image/png;base64,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',
            imageabout1: imageabout1,
            user_data: [],
            countries:[],
            cities: [],
            loading: false,
            orders: [],
            form: {
                country_id: '',
                city_id: '',
                user_id: '',
                address: '',
                other_phone: '',
            },
            address_id: '',
            productsTotal: 0,
        };
    },
    mounted() {
        this.userData();
        this.getOrderByUser();
        this.getCountries();
    },
    methods: {
        printDocument(event) {
            var orderid = event.target.getAttribute('data-orderId');
            console.log(orderid);
            const pdfTable = document.getElementById('divToPrint'+orderid);
            var html = htmlToPdfmake(pdfTable.innerHTML);
            const documentDefinition = { content: html };
            pdfMake.vfs = pdfFonts.pdfMake.vfs;
            pdfMake.createPdf(documentDefinition).open();
        },
        userData() {
            this.loading = true;
            this.axios.get('/api/v1/user-addresses/'+localStorage.token).then((response) => {
                this.loading = false;
                this.user_data = response.data.data;
                this.form.user_id = response.data.data.user_id;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getOrderByUser() {
            this.loading = true;
            this.axios.get('/api/v1/user-orders/' +localStorage.token).then((response) => {
                this.loading = false;
                this.orders = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        addAddress(){
            axios.post('/api/v1/add-user-address', this.form)
                 .then((res) => {
                    if (res.data.success !== true) {
                    this.toast.error(res.data.message);
                    } else if (res.data.success === true) { 
                        $('#exampleModal').toggle();
                        $('.modal-backdrop').css('display', 'none');
                        $('body').removeClass('modal-open');
                        $('body').css('overflow-y', 'auto');
                        this.toast.success(res.data.message);
                    }
                 })
                 .catch((error) => {
                    console.log(error);
                 });
        },
        deleteAddress() {
            axios.post('/api/v1/delete-user-address', this.address_id)
                .then((res) => {
                    if (res.data.success !== true) {
                        this.toast.error(res.data.message);
                    } else if (res.data.success === true) {
                        this.toast.success(res.data.message);
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getCountries() {
            this.loading = true;
            this.axios.get('/api/v1/countries').then((response) => {
                this.loading = false;
                this.countries = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
        getCities() {
            this.loading = false;
            this.axios.get('/api/v1/cities/'+this.form.country_id).then((response) => {
                this.loading = false;
                this.cities = response.data.data;
            }).catch((error) => {
                this.loading = false;
            })
        },
    },
    setup() {
        const toast = useToast();
        return { toast };
    },
};
</script>

<style scoped>
#user .statusi a {
    font-weight: 600;
    color: #020202;
}
#orderModal .total {
    font-size:1rem;
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
    width:80%;
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
#user .breadcrumbs, #user .breadcrumbs a {
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
    border:0;
    padding-right: 10px;
}
#user .container .nav-link2:hover, #user .nav-link2.active {
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
    border:0;
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
    font-size:1rem;
    font-family: 'Rubik', sans-serif;
    font-weight: 400;
    margin-bottom:0;
    color: #959595;
}
#user .adresa .address-details {
    margin-bottom:0;
    font-size:0.8rem;
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
    max-width:500px;
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
    #user #orderModal .main-details, #user #orderModal .main-details .img-fluid {
        border: 1px solid transparent;
        border-radius: 8px;
    }
    .bag-product-price {
        font-size:0.7rem;
        font-weight:200;
        font-family: 'Rubik', sans-serif;
    }
    .bag-product .bag-product-name {
        word-break:normal;
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
        font-size:0.7rem;
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
    #user .adresa, #user .statusi {
        width: 100%;
    }
    #user {
        padding-top: 180px;
    }
    #user .container .nav-link {
        font-weight: 300;
        font-size: 0.8rem;
        padding:0 9px;
    }
    #user .nav-link.active, #user .container .nav-link:hover {
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
</style>
