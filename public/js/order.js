var errorsSet = new Set();

// Handle Add product event
$('#add-product').on('click', function () {
    const lastProductCopy = $('.order-container').children().last().clone(true);
    $('.order-container').append(lastProductCopy);
    // console.log(lastProductCopy);

    const deleteBtns = $('.delete-product');
    // console.log(deleteBtns.length);
    if (deleteBtns.length == 0)
        $('.order-products-container').append($(`<a href="javascript:" class="delete-product btn btn-danger mb-3 col-12 col-md-6 col-lg-3 mt-3">Remove
    Delete product</a>`));
});

// Handle delete product event
$(document).on('click', '.delete-product', function () {
    $(this).parent().remove();
    const deleteBtns = $('.delete-product');
    if (deleteBtns.length == 1)
        deleteBtns.remove();
})

// Handle Date change event and Validate Date
$('#date').on('change', function dateValidation() {
    const dateInput = $('#date');
    let today = new Date();
    today.setHours(0, 0, 0, 0);
    if (new Date(dateInput.val()) == 'Invalid Date') {
        dateInput.next().css('display', 'block').text('Invalid Date');
        errorsSet.add('date');
    } else if (new Date(dateInput.val()) < today) {
        dateInput.next().css('display', 'block').text('Order date must be today or after');
        errorsSet.add('date');
    } else {
        if (errorsSet.has('date'))
            errorsSet.delete('date')
        dateInput.next().css('display', 'none');
    }
});

// Validate User
$('#user').on('change', function () {
    sendAjax(
        '/admin/checkUserFounded',
        'post',
        { user: $(this).val() },
        'JSON',
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        function (userStatus, that) {
            if (userStatus.status) {
                if (errorsSet.has('user'))
                    errorsSet.delete('user')
                $(that).next().css('display', 'none');
            } else {
                errorsSet.add('user');
                $(that).next().css('display', 'block').text('The price must be numeric and can be 1 more');
            }
        },
        this
    );
})

// Validate Department
$('#department').on('change', function () {
    sendAjax(
        '/admin/checkDepartmentFounded',
        'post',
        { department: $(this).val() },
        'JSON',
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        function (departmentStatus, that) {
            if (departmentStatus.status) {
                if (errorsSet.has('department'))
                    errorsSet.delete('department')
                $(that).next().css('display', 'none');
            } else {
                errorsSet.add('department');
                $(that).next().css('display', 'block').text('The price must be numeric and can be 1 more');
            }
        },
        this
    );
})

// Validate Section
$('#section').on('change', function () {
    sendAjax(
        '/admin/checkSectionFounded',
        'post',
        { section: $(this).val() },
        'JSON',
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        function (sectionStatus, that) {
            if (sectionStatus.status) {
                if (errorsSet.has('section'))
                    errorsSet.delete('section')
                $(that).next().css('display', 'none');
            } else {
                errorsSet.add('section');
                $(that).next().css('display', 'block').text('The price must be numeric and can be 1 more');
            }
        },
        this
    );
})

// Price Validation
function priceValidation(price) {
    if (price.match(/[5-9]|[1-9][0-9]+/)) {
        if (errorsSet.has('price'))
            errorsSet.delete('price');
        return true;
    } else {
        errorsSet.add('price');
        return false;
    }
}
// Quantity Validation
function quantityValidation(quantity) {
    if (quantity.match(/[1-9][0-9]*/)) {
        if (errorsSet.has('quantity'))
            errorsSet.delete('quantity');
        return true;
    } else {
        errorsSet.add('quantity');
        return false;
    }
}

// Handle price change event  validation totalPrice
$('.products-price').on('change', function () {
    // Check if the quantity have value

    const totalPrice = $(this).parent().next().children('input');
    if (!priceValidation($(this).val())) {
        totalPrice.val('Total Quantity Price');
        return $(this).next().css('display', 'block').text('The price must be numeric and more than 5');
    }
    else
        $(this).next().css('display', 'none');

    const quantity = $(this).parent().prev().children('input');
    if (quantityValidation(quantity.val()))
        totalPrice.val(parseFloat(quantity.val()) * parseFloat($(this).val()));
    else
        totalPrice.val('Total Quantity Price');
})

// Handle quantity change event and validation totalPrice
$('.products-quantity').on('change', function () {
    // Check if the price have value
    const totalPrice = $(this).parent().next().next().children('input');
    if (!quantityValidation($(this).val())) {
        totalPrice.val('Total Quantity Price');
        return $(this).next().css('display', 'block').text('The price must be numeric and can be 1 more');
    }
    else
        $(this).next().css('display', 'none');

    const price = $(this).parent().next().children('input');
    if (priceValidation(price.val()))
        totalPrice.val(parseFloat(price.val()) * parseFloat($(this).val()));
    else
        totalPrice.val('Total Quantity Price');
})

// Validate Products
function validateProducts() {
    $validated = true;

    // Validate Categories
    const productsCategories = $("[name^='category']");
    for (let i = 0; i < productsCategories.length; i++) {
        if ($(productsCategories[i]).val() == null) { // Not Valid (empty)
            $(productsCategories[i]).next().css('display', 'block').text('The Product must be selected');
            $validated = false;
        } else { // Valid
            $(productsCategories[i]).next().css('display', 'none');
        }
    }

    // Validate Product Items
    const productsProductItem = $("[name^='product']");
    for (let i = 0; i < productsProductItem.length; i++) {
        if ($(productsProductItem[i]).val() == null) { // Not Valid (empty)
            $(productsProductItem[i]).next().css('display', 'block').text('The Product Name must be selected');
            $validated = false;
        } else { // Valid
            $(productsProductItem[i]).next().css('display', 'none');
        }
    }

    // Validate Quantities
    const productsQuantity = $("[name^='product-quantity']");
    for (let i = 0; i < productsQuantity.length; i++) {
        if (!$(productsQuantity[i]).val()) { // Not Valid (empty)
            $(productsQuantity[i]).next().css('display', 'block').text('The Quantity must be selected');
            $validated = false;
        } else { // Valid
            $(productsQuantity[i]).next().css('display', 'none');
        }
    }

    // Validate Prices
    const productPrice = $("[name^='product-price']");
    for (let i = 0; i < productPrice.length; i++) {
        if (!$(productPrice[i]).val()) { // Not Valid (empty)
            $(productPrice[i]).next().css('display', 'block').text('The Price must be specified');
            $validated = false;
        } else { // Valid
            $(productPrice[i]).next().css('display', 'none');
        }
    }

    return $validated;
}

//Handle Submit Order
$('#oredr-submit').on('click', function (event) {

    $('#date').trigger('change');
    $('#user').trigger('change');
    $('#department').trigger('change');
    $('#section').trigger('change');

    if (errorsSet.size != 0 || !validateProducts()) {
        event.preventDefault();
        if (errorsSet.size != 0)
            $(this).next().css('display', 'block').text(`The is / are ${errorsSet.size} Error in your main order data`);
        else
            $(this).next().css('display', 'none');
    }

});

// This method for implementing ajax request
function sendAjax(URL, method, data, dataType, headers, successFunction, that, selector, selectType) {
    $.ajax({
        url: URL,
        method: method,
        data: data,
        dataType: dataType,
        headers: headers,
        success: function (response) {
            if (response) {
                successFunction(response, that, selector, selectType);
            }
        },
    })
}
