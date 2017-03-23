/**
 * Created by moga on 15.03.17.
 */



/**
 * Отрисовка календаря
 *
 * @param calendarData
 */
function getCalendar(calendarData) {
    $('#calendar').fullCalendar({
        header: {
            left: 'title',
            center: '',
            right: 'today prev,next'
        },
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв.', 'Фев.', 'Март', 'Апр.', 'Май', 'Июнь', 'Июль', 'Авг.', 'Сент.', 'Окт.', 'Ноя.', 'Дек.'],
        dayNames: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
        dayNamesShort: ["ВС", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"],
        buttonText: {
            today: "Сегодня",
            month: "Месяц",
            week: "Неделя",
            day: "День"
        },
        eventColor: '#337ab7',
        defaultView: 'month',
        editable: true,
        eventClick: function (calEvent, jsEvent, view) {
            createPopup(calEvent.id);
        },
        events: calendarData,
    });
}

/**
 * Подгружаю записи. Тут же сразу в случае успеха отрисовую календарь.
 */
function getEvents() {
    $.ajax({
        method: 'post',
        url: BASE_URL + '/calendar/get-all-events',
        dataType: 'json',
        success: function (data) {
            getCalendar(data.calendar);
            $('#calendar > div.fc-toolbar > div.fc-right > button').before('<div><a href="#" class="btn btn-add-event">Add Event</a></div>');
        }
    });
}

/**
 * Вызов попапа при создании или обновлении таска
 * 
 * @param id
 */
function createPopup(id) {
    var url;
    if(typeof id == 'number') {
        url = BASE_URL + '/calendar/' + id;
    } else {
        url = BASE_URL + '/calendar/create/';
    }

    $.ajax({
        method: 'get',
        url: url,
        dataType: 'json',
        success: function (data) {
            popup('Добавить задание', data.popup);
            $(".form_datetime").datetimepicker({
                minView: 2,
                format: 'yyyy-mm-dd',
                autoclose: true,
            });

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
function editTask() {
    var data = $('#add-task-form').serializeObject();
    $.ajax({
        method: 'put',
        url: BASE_URL + '/calendar/' + data.id,
        data: data,
        dataType: 'json',
        success: function (data) {
            location.href = BASE_URL + '/calendar/';
        }
    });
}

/**
 * Удаление таска
 */
function removeTask() {
    var data = $('#add-task-form').serializeObject();
    $.ajax({
        method: 'delete',
        url: BASE_URL + '/calendar/' + data.id,
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
        getEvents();
        $(document).on("click", '.btn-add-event', createPopup);
        $(document).on("click", '.save-task', saveTask);
        $(document).on("click", '.edit-task', editTask);
        $(document).on("click", '.remove', removeTask);
    });
});












