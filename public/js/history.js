/**
 * Created by moga on 29.03.17.
 */



/**
 * Вызов попапа при создании или обновлении таска
 *
 * @param id
 */
function createPopup(id) {
    console.log(123123123)
    var url;
    if (typeof id == 'number') {
        // url = BASE_URL + '/history/' + id;
    } else {
        url = BASE_URL + '/history/create/';
    }

    $.ajax({
        method: 'get',
        url: url,
        dataType: 'json',
        success: function (data) {
            popup('Добавить новость');
        }
    });
}

/**
 * Сохранение нового таска
 */
function saveTask() {
    var data = $('#add-task-form').serializeObject();
    $.ajax({
        method: 'post',
        url: BASE_URL + '/calendar/',
        data: data,
        dataType: 'json',
        success: function (data) {
            location.href = BASE_URL + '/calendar/';
        }
    });
}

/**
 * Обновление существующего таска
 */
function editTask(id, data) {
    if (id === undefined) {
        var data = $('#add-task-form').serializeObject();
        var id = data.id;
    }
    $.ajax({
        method: 'put',
        url: BASE_URL + '/calendar/' + id,
        data: data,
        dataType: 'json',
        success: function (data) {
            location.href = BASE_URL + '/calendar/';
        }
    });
}

/**
 * Ждем, когда прогрузится страница
 */
$(function () {
    $(document).ready(function () {
        $(document).on("click", '#add-news', function () {
            console.log(123321);
            createPopup();
        });
        $(document).on("click", '.save-task', saveTask);
        $(document).on("click", '.edit-task', function () {
            editTask()
        });
        $(document).on("click", '.remove', removeTask);
    });
});












