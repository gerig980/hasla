<script type="text/javascript">
    $(document).ready(function() {
        $('.add-btn').on('click', function(){
            var id            =  $(this).attr('product-id');
            var product_price =  $('.price-product-'+id).attr('price-product');
            var product_image =  $('.image-product-'+id).attr('image-product');
            var product_name  =  $('.name-product-'+id).attr('name-product');
            
            if(id){
                if($('.product_'+ id).length === 0){
                    
                    $('#display-product').append('<tr class="product_'+id+'">'
                        +'<td>'
                            +'<div class="avatar-md bg-light rounded p-1">'
                                +'<img src="/images/admin_products/small/'+product_image+'" alt="" class="img-fluid d-block">'
                                +'<input type="hidden" name="product_id[]" value="'+id+'">'
                            + '</div>'
                        +'</td>'
                        +'<td>'
                            +'<h5 class="fs-14"><a href="apps-ecommerce-product-details.html" class="text-dark">'+product_name+'</a></h5>'
                        +'</td>'
                        +'<td>'
                            +'<div class="number">'
                                +'<span id="minus" class="minus'+id+'" style="width:20px;height:20px;background:#f2f2f2;border-radius:4px;padding:0px 5px 0px 5px;border:1px solid #ddd;display: inline-block;vertical-align: middle;text-align: center;">-</span>'
                                +'<input type="number" name="quantity[]" value="1" class="qty" id="qty-'+id+'" readonly>'
                                +'<span class="plus'+id+'" style="width:20px;height:20px;background:#f2f2f2;border-radius:4px;padding:0px 5px 0px 5px;border:1px solid #ddd;display: inline-block;vertical-align: middle;text-align: center;">+</span>'
                            +'</div>'
                        +'</td>'
                        +'<td class="text-end prices-td">'
                            +'<p class="text-muted mb-0 fs-10">ALL '+product_price+' x <span id="qty_'+id+'" class="quantity">1</span><input type="hidden" name="qty[]" class="quantity'+id+'"></p>'
                            +'<p id="price_prod_'+id+'" class="price_prod">ALL '+product_price+'</p>'
                            +'<input type="hidden" class="total_amount priceProd" name="price[]" id="sub_total-'+id+'" value="'+product_price+'">'
                        +'</td>'
                        +'<td class="text-end">'
                            +'<a href="javascript:void(0)" id="delete'+id+'" style="">'
                                +'<img  class="rotateimg45" src="/backend/assets/images/layouts/x.png" style="width:14px;"/>'
                            +'</a>'
                        +'</td>'
                        +'</tr>'
                    );
                }
                $('#delete'+id).on('click', function () {   
                    $('.product_'+id).remove();  
                    $('.calculate').click();
                });
                $('.calculate').click();
                $(document).ready(function() {
                    
                    $('.minus'+id).click(function () {
                        var $input = $(this).parent().find('input');
                        var count = parseInt($input.val()) - 1;
                        count = count < 1 ? 1 : count;
                        $input.val(count);
                        $input.change();
                        $('#qty_'+id).text(count);
                        $('.quantity'+id).val($('#qty_'+id).text());
                        $('#price_prod_'+id).text('ALL '+count * product_price);
                        $('#sub_total-'+id).val(count * product_price);
                        $('.calculate').click();
                    });
    
                    $('.plus'+id).click(function () {
                        var $input = $(this).parent().find('input');
                        $input.val(parseInt($input.val()) + 1);
                        $input.change();
                        $('#qty_'+id).text(parseInt($input.val()));
                        $('.quantity'+id).val($('#qty_'+id).text());
                        $('#price_prod_'+id).text('ALL '+parseInt($input.val()) * product_price);
                        $('#sub_total-'+id).val(parseInt($input.val()) * product_price);
                        $('.calculate').click();
                    });
                });
    
                
            }
            
        });
    }); 
    //get the product-variation
    $(document).ready(function() {
        $('.add-btn-variation').on('click', function(){
            var id                  = $(this).attr('variation-product-id');
            var product_id          = $(this).attr('product_id');
            var price_product       = $('.product-price-'+id).attr('product-price');
            var image_product       = $('.product-image-'+id).attr('product-image');
            var name_product        = $('.product-name-'+id).attr('product-name');
            var variant_product_id  = $('.product-variant-'+id).attr('product-variant');
            var color_product_id    = $('.product-color-'+id).attr('product-color');
            var color_product       = $('.product-color-'+id).attr('p-color-name');
            var variant_product     = $('.product-variant-'+id).attr('p-variant-name');
            if(id){
                if($('.variation_product_'+ id).length === 0){
                    $('#display-product').append('<tr class="variation_product_'+id+'">'
                        +'<td>'
                            +'<div class="avatar-md bg-light rounded p-1">'
                                +'<img src="/images/admin_variant_images/'+image_product+'" alt="" class="img-fluid d-block">'
                                +'<input type="hidden" name="variation[]" value="'+id+'">'
                                +'<input type="hidden" name="product_id[]" value="'+product_id+'">'
                            + '</div>'
                        +'</td>'
                        +'<td>'
                            +'<h5 class="fs-14"><a href="apps-ecommerce-product-details.html" class="text-dark">'+name_product+'</a></h5>'
                            +'<span class="badge badge-outline-dark">'+variant_product+'</span>'
                            +' <span class="badge badge-outline-dark">'+color_product+'</span>'
                        +'</td>'
                        +'<td>'
                            +'<div class="number">'
                                +'<span class="Minus'+id+'" style="width:20px;height:20px;background:#f2f2f2;border-radius:4px;padding:0px 5px 0px 5px;border:1px solid #ddd;display: inline-block;vertical-align: middle;text-align: center;">-</span>'
                                +'<input type="number" name="quantity[]" value="1" readonly>'
                                +'<span class="Plus'+id+'" style="width:20px;height:20px;background:#f2f2f2;border-radius:4px;padding:0px 5px 0px 5px;border:1px solid #ddd;display: inline-block;vertical-align: middle;text-align: center;">+</span>'
                            +'</div>'
                        +'</td>'
                        +'<td class="text-end">'
                            +'<p class="text-muted mb-0 fs-10">ALL '+price_product+' x <span id="quantity_'+id+'">1</span><input type="hidden" name="qty[]" class="quantity'+id+'"></p>'
                            +'<p id="price_'+id+'" class="price_prod">ALL '+price_product+'</p>'
                            +'<input type="hidden" name="price[]" class="sub priceProd" id="sub-total-'+id+'" value="'+price_product+'">'
                        +'</td>'
                        +'<td class="text-end">'
                            +'<a href="javascript:void(0)" id="delete'+id+'" style="">'
                                +'<img  class="rotateimg45" src="/backend/assets/images/layouts/x.png" style="width:14px;"/>'
                            +'</a>'
                        +'</td>'
                        +'</tr>'
                    );
                    
                }
                $('#delete'+id).on('click', function () {   
                    $('.variation_product_'+id).remove();  
                    $('.calculate').click();
                });
                $('.calculate').click();
                $(document).ready(function() {
                    $('.Minus'+id).click(function () {
                        var $input = $(this).parent().find('input');
                        var count = parseInt($input.val()) - 1;
                        count = count < 1 ? 1 : count;
                        $input.val(count);
                        $input.change();
                        $('#quantity_'+id).text(count);
                        $('.quantity'+id).val($('#quantity_'+id).text());
                        $('#price_'+id).text('ALL '+count * price_product);
                        $('#sub-total-'+id).val(count * price_product);
                        $('.calculate').click();
                    });
                    $('.Plus'+id).click(function () {
                        var $input = $(this).parent().find('input');
                        $input.val(parseInt($input.val()) + 1);
                        $input.change();
                        $('#quantity_'+id).text(parseInt($input.val()));
                        $('.quantity'+id).val($('#quantity_'+id).text());
                        $('#price_'+id).text('ALL '+parseInt($input.val()) * price_product);
                        $('#sub-total-'+id).val(parseInt($input.val()) * price_product);
                        $('.calculate').click();
                    });
                });
            }
        });
    });
    var tax = 0;
    var shipping = 0;
    var coupon = 0;
    $('.calculate').on('click', function(){
        var total = 0;
        $('.priceProd').each(function(){
            var amount = $(this).val() - 0;
            total += amount;
        });
        $('.subtotal').val(total);
        $('.tax').change(function() {
            var amount = $(this).val() - 0;
            tax = amount;
            if(tax == 20){
                tax = 1/6;
            }
            $('.calculate').click();
        });
        
        $('.shipping').change(function() {
            var amount = $(this).val() - 0;
            shipping = amount;
            $('.calculate').click();
        });
        
        $('.coupon').change(function() {
            $('.coupon_code').val($(this).find(':selected').attr('coupon_code'));
            var discount_type = $(this).find(':selected').attr('discount_type');
            if (discount_type === 'percent') {
                var amount = $(this).val();
                couponInt = parseInt(amount);
                coupon = (couponInt/100)*total;
            }else {
                var amount = $(this).val();
                coupon = amount;
            }
            console.log(discount_type);
            $('.calculate').click();
        });
        var grandTotal = parseInt(total+ (tax*total) + parseInt(shipping) - (coupon));
        $('.grandTotal').text(grandTotal);
        $('.grandTotal-input').val(grandTotal);
        $('.coupon_amount').val(coupon);
        
        return false;
    });

    //get address by customer

    $(document).ready(function() {
        $('#add-client').css('display', 'block');
        $('#icon').css('display', 'none');
        $('select[name="category_id"]').on('change', function(){
            if($(this).val() != '') {
                $('#add-client').css('display', 'none');
                $('#icon').css('display', 'block');
            } else {
                $('#add-client').css('display', 'block');
                $('#icon').css('display', 'none');
            }
            var APP_URL = {!! json_encode(url('/app')) !!}
            var id = $(this).val();
            var i;
            if(id){
                $.ajax({
                    url: APP_URL +'/pos/address-by-customer/' +id,  
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('#guest-form').hide();
                        $('#check_address').show();
                        if (data.length != 0){
                            text = " ";
                            for (i=0;i<data.length;i++) {
                                text += "<input class='form-check-input' type='radio' name='address' id='checkAddress-"+data[i]['id']+"' value='"+data[i]['id']+"'>";
                                text += "<label class='form-check-label' for='checkAddress-"+data[i]['id']+"'>";
                                text += "<p><span>Adresa: "+data[i]['address']+"<br>";
                                text += "<span>Shteti: "+data[i].countries['name']+"</span><br>";
                                text += "<span>Qyteti: "+data[i].cities['name']+"</span><br>";
                                text += "<span>Numër Telefoni: "+data[i].customers['phone']+"</span>";
                                text += "</p></label></input><br>";
                            }
                            $('#check_address').html(text);

                            $('#client_adress').val() = parseInt(sessionStorage.getItem("checked_id"));
                        }else{
                            $('#check_address').html("Nuk gjendet adresë për këtë Klient!"); 
                        }
                    },
                    });
            }else{
                $('#guest-form').show();
                $('#check_address').hide();
                console.log('error');
            }
        });
        
    });


    $(document).ready(function(){
        $("button[name='getAdress']").click(function(){
            var radioValue = $("input[name='address']:checked").val();
            $("#address_id").val(radioValue);
            var phone = $("input[name='mobile']").val();
            if(radioValue){
                console.log(radioValue);
                localStorage.setItem("checked_id", radioValue);
                $('modal').hide();
                var x = localStorage.getItem("checked_id");
                document.getElementById("client_ad").value = x;
            }
            if(phone){

                $(".success-text").css("display", "block");
            }
        });
    });

    
    
</script>