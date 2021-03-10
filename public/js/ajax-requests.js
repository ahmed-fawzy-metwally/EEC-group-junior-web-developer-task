// Department Change Event Handle
$("#department").on('change', function () {
    sendAjax(
        '/admin/getSectionsPerDepartment',
        'post',
        { department: $(this).val() },
        'JSON',
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        fillSelectWithChildren,
        this,
        '#section',
        'Section',
    );
});

// Category Change Event Handle
$(".categories").on('change', function () {
    sendAjax(
        '/admin/getProductsPerCategory',
        'post',
        { category: $(this).val() },
        'JSON',
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        fillSelectWithChildren,
        this,
        '.products',
        'Product',
    );
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
    });
}

// This method is a generic method that take ajax response and which object fire the event and the children selector
// and fill children select with its data
function fillSelectWithChildren(response, that , selector, selectType) {
    const parent = $(that).parent().next().children(selector)
        .empty()
        .append(`<option value="null" selected disabled>Choose a ${selectType}</option>`);

    for (let key in response) {
        child = "<option value=" + response[key].id + " >" + response[key].name + "</option>";
        parent.append(child);
    }
}