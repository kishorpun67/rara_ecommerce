$(document).ready(function() {
    // alert('Please wait...');
    // select sort by product
    $("#sort").change(function() {
        var sort = $("#sort").val();
        var url = $("#url").val();
        // console.log(url);
        // return;
        // alert(url);
        var fabricClass = 'fabric';
        var brand = 'brand';
        var sleeveClass = 'sleeve';
        var patternClass = 'pattern';
        var pattern = get_filter(patternClass);
        var minPrice = $("#min_price").val();
        var maxPrice = $("#max_price").val();
        var sleeve = get_filter(sleeveClass);
        var fabric = get_filter(fabricClass);
        var brand = get_filter(brand);

        if (sort === "" && url === "") {
            return false;
        }
        // this.form.submit();
        // alert(sort);
        $.ajax({
            type: 'get',
            url: 'products/',
            data: {
                fabric: fabric,
                sort: sort,
                url: url,
                brand: brand,
                sleeve: sleeve,
                minPrice: minPrice,
                maxPrice: maxPrice,
                pattern: pattern,

            },
            success: function(response) {
                // alert(response);
                $("#ajax_products").html(response);

            },
            error: function() {
                alert('error');
            }
        });
    });
    $("#price_range").click(function() {
        var url = $("#url").val();
        var fabricClass = 'fabric';
        var brand = 'brand';
        var sleeveClass = 'sleeve';
        var patternClass = 'pattern';
        var pattern = get_filter(patternClass);
        var minPrice = $("#min_price").val();
        var maxPrice = $("#max_price").val();
        var sleeve = get_filter(sleeveClass);
        var fabric = get_filter(fabricClass);
        var brand = get_filter(brand);
        var sort = $("#sort option:selected").val();
        $.ajax({
            type: 'get',
            url: 'products/',
            data: {
                fabric: fabric,
                sort: sort,
                url: url,
                brand: brand,
                sleeve: sleeve,
                minPrice: minPrice,
                maxPrice: maxPrice,
                pattern: pattern,
            },
            success: function(response) {
                $("#ajax_products").html(response);
            },
            error: function() {
                alert('error');
            }
        });
    });
    // filter for sleeve
    $(".sleeve").on('click', function() {
        var url = $("#url").val();
        var fabricClass = 'fabric';
        var brand = 'brand';
        var sleeveClass = 'sleeve';
        var patternClass = 'pattern';
        var pattern = get_filter(patternClass);
        var minPrice = $("#min_price").val();
        var maxPrice = $("#max_price").val();
        var sleeve = get_filter(sleeveClass);
        var fabric = get_filter(fabricClass);
        var brand = get_filter(brand);
        var sort = $("#sort option:selected").val();
        $.ajax({
            type: 'get',
            url: 'products/',
            data: {
                fabric: fabric,
                sort: sort,
                url: url,
                brand: brand,
                sleeve: sleeve,
                minPrice: minPrice,
                maxPrice: maxPrice,
                pattern: pattern,
            },
            success: function(response) {
                $("#ajax_products").html(response);
            },
            error: function() {
                alert('error');
            }
        });
    });


    // filter for fabric
    $(".fabric").on('click', function() {
        var url = $("#url").val();
        var fabricClass = 'fabric';
        var brand = 'brand';
        var sleeveClass = 'sleeve';
        var patternClass = 'pattern';
        var pattern = get_filter(patternClass);
        var minPrice = $("#min_price").val();
        var maxPrice = $("#max_price").val();
        var sleeve = get_filter(sleeveClass);
        var fabric = get_filter(fabricClass);
        var brand = get_filter(brand);

        var sort = $("#sort option:selected").val();
        $.ajax({
            type: 'get',
            url: 'products/',
            data: {
                fabric: fabric,
                sort: sort,
                url: url,
                brand: brand,
                sleeve: sleeve,
                minPrice: minPrice,
                maxPrice: maxPrice,
                pattern: pattern,
            },
            success: function(response) {
                // alert(response);
                $("#ajax_products").html(response);

            },
            error: function() {
                alert('error');
            }
        });
    });

    // filter for fabric
    $(".pattern").on('click', function() {
        var url = $("#url").val();
        var fabricClass = 'fabric';
        var brand = 'brand';
        var sleeveClass = 'sleeve';
        var patternClass = 'pattern';
        var pattern = get_filter(patternClass);
        var minPrice = $("#min_price").val();
        var maxPrice = $("#max_price").val();
        var sleeve = get_filter(sleeveClass);
        var fabric = get_filter(fabricClass);
        var brand = get_filter(brand);
        var sort = $("#sort option:selected").val();
        $.ajax({
            type: 'get',
            url: 'products/',
            data: {
                fabric: fabric,
                sort: sort,
                url: url,
                brand: brand,
                sleeve: sleeve,
                minPrice: minPrice,
                maxPrice: maxPrice,
                pattern: pattern,
            },
            success: function(response) {
                // alert(response);
                $("#ajax_products").html(response);

            },
            error: function() {
                alert('error');
            }
        });
    });

    // filter for fabric
    $(".brand").on('click', function() {
        var url = $("#url").val();
        var fabricClass = 'fabric';
        var brand = 'brand';
        var sleeveClass = 'sleeve';
        var patternClass = 'pattern';
        var pattern = get_filter(patternClass);
        var minPrice = $("#min_price").val();
        var maxPrice = $("#max_price").val();
        var sleeve = get_filter(sleeveClass);
        var fabric = get_filter(fabricClass);
        var brand = get_filter(brand);
        var sort = $("#sort option:selected").val();
        $.ajax({
            type: 'get',
            url: '',
            data: {
                fabric: fabric,
                sort: sort,
                url: url,
                brand: brand,
                sleeve: sleeve,
                minPrice: minPrice,
                maxPrice: maxPrice,
                pattern: pattern,
            },
            success: function(response) {
                // alert(response);
                $("#ajax_products").html(response);

            },
            error: function() {
                alert('error');
            }
        });
    });

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }
    $(".getSizePrice").change(function() {
        // alert("Please select");
        var sizeId = $(this).val();
        $.ajax({
            type: 'get',
            url: '/product-item-price',
            data: {
                sizeId: sizeId
            },
            success: function(response) {
                console.log(response);
                $('.new-price').text(response.price);
                $('#product_price').val(response.price);
            },
            error: function() {
                alert("Error");
            }
        });
    });


    $("#ship-to-bill").on('click', function() {
        if (this.checked) {
            $("#shipping_name").val($("#name").val());
            $("#shipping_address").val($("#address").val());
            $("#shipping_city").val($("#city").val());
            $("#shipping_country").val($("#country").val());
            $("#shipping_email").val($("#email").val());
            $("#shipping_number").val($("#number").val());
        } else {
            $("#shipping_name").val('');
            $("#shipping_address").val('');
            $("#shipping_city").val('');
            $("#shipping_country").val('');
            $("#shipping_email").val('');
            $("#shipping_number").val('');
        }
    });


});

function productQuantity(cart_id) {
    // alert('terst')
    // var cart_id = $(this).attr('cart_id');
    var value = $(`#cart-id-${cart_id}`).val();
    console.log(cart_id, value);


    $.ajax({
        type: 'post',
        url: '/ajax-upate-cart-quantity',
        data: {
            cart_id: cart_id,
            value: value,

        },
        success: function(response) {
            // console.log(response)

            $("#ajaxCart").html(response);
            // console.log('tst')
        },
        error: function() {
            alert("Error");
        }
    });
}

$('#show-more-content').hide();
$('#show-more').click(function() {
    // alert('ets');
    $('#show-more-content').show(300);
    $('#show-less').show();
    $('#show-more').hide();
});
$('#show-less').click(function() {
    $('#show-more-content').hide(150);
    $('#show-more').show();
    $(this).hide();
});

// $('#show-more-content').hide();
// $('#show-more').click(function() {
//     $('#show-more-content').show(300);
//     $('#show-less').show();
//     $('#show-more').hide();
// });

// $('#show-less').click(function() {
//     $('#show-more-content').hide(150);
//     $('#show-more').show();
//     $(this).hide();
// });

function rating(rating) {
    if (rating == 1) {
        $("#star-2").removeClass('fa-star');
        $("#star-3").removeClass('fa-star');
        $("#star-4").removeClass('fa-star');
        $("#star-5").removeClass('fa-star');
        $("#star-2").addClass('fa-star-o');
        $("#star-3").addClass('fa-star-o');
        $("#star-4").addClass('fa-star-o');
        $("#star-5").addClass('fa-star-o');
    }
    if (rating == 2) {
        // console.log('2')
        var className = $("#star-2").attr('class');
        if (className == "fa fa-star-o") {
            console.log('tst')
            $("#star-2").removeClass('fa-star-o');
            $("#star-2").addClass('fa-star');
        } else {
            $("#star-2").removeClass('fa-star');
            $("#star-3").removeClass('fa-star');
            $("#star-4").removeClass('fa-star');
            $("#star-5").removeClass('fa-star');
            $("#star-2").addClass('fa-star-o');
            $("#star-3").addClass('fa-star-o');
            $("#star-4").addClass('fa-star-o');
            $("#star-5").addClass('fa-star-o');
        }
    }
    if (rating == 3) {
        // console.log('2')
        var className2 = $("#star-2").attr('class');
        var className3 = $("#star-3").attr('class');
        if (className3 == "fa fa-star-o") {
            $("#star-2").removeClass('fa-star-o');
            $("#star-2").addClass('fa-star');
            $("#star-3").removeClass('fa-star-o');
            $("#star-3").addClass('fa-star');
        } else {
            $("#star-3").removeClass('fa-star');
            $("#star-3").addClass('fa-star-o');
            $("#star-4").removeClass('fa-star');
            $("#star-5").removeClass('fa-star');
            $("#star-4").addClass('fa-star-o');
            $("#star-5").addClass('fa-star-o');


        }
    }
    if (rating == 4) {
        var className4 = $("#star-4").attr('class');
        if (className4 == "fa fa-star-o") {
            // console.log('tst')
            $("#star-2").removeClass('fa-star-o');
            $("#star-2").addClass('fa-star');
            $("#star-3").removeClass('fa-star-o');
            $("#star-3").addClass('fa-star');
            $("#star-4").removeClass('fa-star-o');
            $("#star-4").addClass('fa-star');
        } else {
            $("#star-4").removeClass('fa-star');
            $("#star-5").removeClass('fa-star');
            $("#star-4").addClass('fa-star-o');
            $("#star-5").addClass('fa-star-o');
        }
    }
    if (rating == 5) {
        var className4 = $("#star-4").attr('class');
        if (className4 == "fa fa-star-o") {
            // console.log('tst')
            $("#star-2").removeClass('fa-star-o');
            $("#star-2").addClass('fa-star');
            $("#star-3").removeClass('fa-star-o');
            $("#star-3").addClass('fa-star');
            $("#star-4").removeClass('fa-star-o');
            $("#star-4").addClass('fa-star');
            $("#star-5").removeClass('fa-star-o');
            $("#star-5").addClass('fa-star');
        } else {
            $("#star-5").removeClass('fa-star');
            $("#star-5").addClass('fa-star-o');
        }
    }
    $("#rating").val(rating)

}


function deleteData(id, record) {
    // alert(id);
    swal({
            title: "Are you sure?",
            text: "You will not able to recover this record again!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it",
        },
        function() {
            window.location.href = "delete-" + record + "/" + id;
        }
    );
}