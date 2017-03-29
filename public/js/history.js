/**
 * Created by moga on 29.03.17.
 */


/**
 * Вызов попапа при создании или обновлении новости
 *
 * @param id
 */
function createPopup(id) {
    var url;
    var title;
    if (typeof id == 'number') {
        url = BASE_URL + '/history/' + id;
        title = 'Редактировать новость';
    } else {
        url = BASE_URL + '/history/show/';
        title = 'Добавить новость';
    }

    $.ajax({
        method: 'get',
        url: url,
        dataType: 'json',
        success: function (data) {
            popup('Добавить новость', data.popup);
            $(".form_datetime").datetimepicker({
                minView: 2,
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
        }
    });
}

/**
 * Сохранение новой новости
 */
function saveNews() {
    var data = $('#history-form').serializeObject();
    $.ajax({
        method: 'post',
        url: BASE_URL + '/history/',
        data: data,
        dataType: 'json',
        success: function (data) {
            location.href = BASE_URL + '/history/';
        }
    });
}
/**
 * Обновление новости
 */
function updateNews() {
    var data = $('#history-form').serializeObject();
    $.ajax({
        method: 'put',
        url: BASE_URL + '/history/' + data.id,
        data: data,
        dataType: 'json',
        success: function (data) {
            location.href = BASE_URL + '/history/';
        },
        error: function (data) {
            console.log('erororor', data);
        }
    });
}

/**
 * Обновление существующего новости
 */
function editNews() {
    var data = $('#news-form').serializeObject();

    $.ajax({
        method: 'put',
        url: BASE_URL + '/history/' + id,
        data: data,
        dataType: 'json',
        success: function (data) {
            location.href = BASE_URL + '/history/';
        }
    });
}

/**
 * Ждем, когда прогрузится страница
 */
$(function () {
    $(document).ready(function () {
        $(document).on("click", '#add-news', createPopup);
        $(document).on("click", '.save-news', saveNews);
        $(document).on("click", '.update-news', updateNews);
        $(document).on("click", '#edit-news', function() {
            createPopup($(this).data('id'));
        });
        // $(document).on("click", '.remove', removeTask);
    });
});












