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
        header            : {
            left  : 'title',
            center: '',
            right : 'today prev,next'
        },
        monthNames        : ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort   : ['Янв.', 'Фев.', 'Март', 'Апр.', 'Май', 'Июнь', 'Июль', 'Авг.', 'Сент.', 'Окт.', 'Ноя.', 'Дек.'],
        dayNames          : ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
        dayNamesShort     : ["ВС", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"],
        buttonText        : {
            today: "Сегодня",
            month: "Месяц",
            week : "Неделя",
            day  : "День"
        },
        eventColor        : '#337ab7',
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

/**
 * Ждем, когда прогрузится страница
 */
$(document).ready(function () {
    getEvents();
});