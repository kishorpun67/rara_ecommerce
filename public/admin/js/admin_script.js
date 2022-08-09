$(document).ready(function() {



    // update brand status 
    $(".updateBannerStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var banner_id = $(this).attr("banner_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-banner-status',
            data: {
                status: status,
                banner_id: banner_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#banner-" + banner_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                } else if (response['status'] == 1) {
                    $("#banner-" + banner_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });
    // update brand status 
    $(".updateBrandStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr("brand_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-brand-status',
            data: {
                status: status,
                brand_id: brand_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#brand-" + brand_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                } else if (response['status'] == 1) {
                    $("#brand-" + brand_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });


    // update category status 
    $(".updateCategoryStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-category-status',
            data: {
                status: status,
                category_id: category_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#category-" + category_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                } else if (response['status'] == 1) {
                    $("#category-" + category_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // update product status 
    $(".updateProductStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var product_id = $(this).attr("product_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-product-status',
            data: {
                status: status,
                product_id: product_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#product-" + product_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                } else if (response['status'] == 1) {
                    $("#product-" + product_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // update testimonial status 
    $(".updateTestimonialStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var testimonial_id = $(this).attr("testimonial_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-testimonial-status',
            data: {
                status: status,
                testimonial_id: testimonial_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#testimonial-" + testimonial_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                } else if (response['status'] == 1) {
                    $("#testimonial-" + testimonial_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // update coupen status 
    $(".updateCoupenStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var coupen_id = $(this).attr("coupen_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-coupen-status',
            data: {
                status: status,
                coupen_id: coupen_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#coupen-" + coupen_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                } else if (response['status'] == 1) {
                    $("#coupen-" + coupen_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });
    // add field for product attribute 
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div  style="padding-top:5px;"><input type="text" name="sku[]" id="sku" placeholder="SKU" value=""/><input type="text" name="size[]" id="size" placeholder="Size" value=""  style="margin-left:3px;"/><input type="number" name="price[]" id="price" placeholder="Price Rs."value="" style="margin-left:5px;"/><input type="number" name="stock[]" id="stock" placeholder="Stock" value="" style="margin-left:4px;"/><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});