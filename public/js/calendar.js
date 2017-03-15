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
            editTask(calEvent);
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
        url: BASE_URL + '/todomanager/get-all-events',
        dataType: 'json',
        success: function (data) {
            getCalendar(data.calendar);
            $('#calendar > div.fc-toolbar > div.fc-right > button').before('<div><a href="#" class="btn btn-add-event">Add Event</a></div>');
        }
    });
}

/**
 * Попап с редактированием/просмотром записи
 * @param id
 * @param title
 * @param data
 */
function editTask(id) {
    console.log(id);
}

function createPopup() {
    // 
    $.ajax({
        method: 'get',
        url: BASE_URL + '/todomanager/create',
        dataType: 'json',
        success: function (data) {
            popup('Добавить задание', data.popup);
        }
    });
}

function saveTask() {
    var data = $('#add-task-form').serializeObject();
    $.ajax({
        method: 'post',
        url: BASE_URL + '/todomanager/',
        data: data,
        dataType: 'json',
        success: function (data) {
            location.href = BASE_URL + '/todomanager/';
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
    });
});












