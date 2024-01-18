jQuery(function ($) {
    "use strict";

    $(".input-group-append.barcode").on("click", function () {
        getBarcode(13, $(this).parent('.input-group').find('input'));
    });

    function getBarcode(length = 13, input) {
        var barcode_key = "";
        var string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        for (var i = 0; i < length; i++)
        barcode_key += string.charAt(Math.floor(Math.random() * string.length));

        input.val(barcode_key);
    }

    $(document).ready(function () {
        $('.variant-product').on('click', function () {
            if ($(this).is(':checked')) {
                $('.without-variant').addClass('d-none');
                $('.with-variant').removeClass('d-none');
            } else {
                $('.without-variant').removeClass('d-none');
                $('.with-variant').addClass('d-none');
            }
        });
    });

    $(document).on('change', '.variant', function (e) {
        var form = $('#variant');
        var url = form.attr('data-form');
        getVariant(form, url);
    });


    function getVariant(form, url) {
        $.ajax({
            type: "post",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form.serialize(), // serializes the form's elements.
            dataType: 'html',
            success: function (data) {
                $('.variant-table').html(data);
            },
            error: function (data) {
            }
        });
    }

    $(document).on('change', '.attribute-sets', function (e) {
        var form = $('#variant');
        var url = $(this).attr('data-url');
       
        $.ajax({
            type: "post",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form.serialize(), // serializes the form's elements.
            dataType: 'html',
            success: function (response) {
                $('.attribute-values').html(response);
                $('.js-example-basic-multiple').select2();

                getVariant($('#variant'), form.attr('data-form'));
            },
            error: function (data) {
            }
        });
    });

    $(document).ready(function() {
        $("#couponType").on("change", function () {
            if($(this).val() === "product_base") {
                $("#div_product_base").removeClass("d-none");
                $("#div_invoice_base").addClass("d-none");
            }else if ($(this).val() === "invoice_base") {
                $("#div_product_base").addClass("d-none");
                $("#div_invoice_base").removeClass("d-none");
            }
        });
    });

    
});