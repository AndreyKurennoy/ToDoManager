function saveTask() {
    var data = $('#add-category-form').serializeObject();
    console.log(BASE_URL);
    $.ajax({
        method: 'post',
        url: BASE_URL + '/category',
        data: data,
        dataType: 'json',
        success: function (data) {
            console.log(data, 'success');
            location.href = BASE_URL + '/category/';
        },
        error: function () {
            console.log(data,'error');
        }
    });
}


$(function () {
    $(document).ready(function () {
        $(document).on("click", '.category-save', saveTask);
    });
});



$(function() {
    $('#cp2').colorpicker();
});
