$(document).ready(function () {
    var events = [
        {
            title: 'Event Title1',
            start: '2018-12-03T08:08:55.008',
            end: '2018-12-03T09:09:55.008'
        }, {
            title: 'Event Title1',
            start: '2018-12-03T13:09:55.008',
            end: '2018-12-03T18:10:55.008'
        }, {
            title: 'Event Title1',
            start: '2018-12-03T13:10:55.008',
            end: '2018-12-03T18:11:55.008'
        }
    ];

    var $divCalendar = $('#calendar');

    var eventsD = [];

    function ajax() {
        $.ajax({
            async: false,
            url: $("#inp-url-events").val(),
            dataType: 'json',
            success: function (response) {
                console.log(response);
                response.forEach(function (event) {
                    // eventsD.push({
                    //     title: event.title,
                    //     start: event.start,
                    //     end: event.end
                    //
                    // });
                    eventsD = response;
                });
                // eventsD = events;
                calendar();
            }
        });
    }


    function calendar() {
        $divCalendar.fullCalendar({
            events: eventsD,
            themeSystem: 'bootstrap4',
            navLinks: true,
            weekends: false,
            showNonCurrentDates: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            views: {
                basic: {
                    // options apply to basicWeek and basicDay views
                },
                agenda: {
                    timezone: 'America/Mexico_City',
                    header: {
                        center: 'title',
                    },
                    slotDuration: '01:00:00',
                    nowIndicator: true,
                    events: events,
                    minTime: "08:00:00",
                    maxTime: "16:00:00",
                    slotLabelFormat: [
                        'h:mm a'
                    ],
                    duration: {days: 1},
                    views: {
                        forDay: {
                            type: 'agenda',
                            duration: {days: 1}
                        },
                    }
                },
                week: {
                    // options apply to basicWeek and agendaWeek views
                },
                day: {
                    // options apply to basicDay and agendaDay views
                }
            },
            monthNames: [
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            ],
            dayClick: function (datePicker, jsEvent, view) {
                $(function () {
                    console.log(view.name);

                    if (view.name !== "month") {
                        var timePicker = datePicker.format().split('T');
                        var date = timePicker[0];
                        var time = timePicker[1].substring(0, 5);
                        var contentDate = "<h5>¿Desea reservar el  <b>" + date + "</b> a las  <b>" + time + "</b>?</h5> ";
                        $("#col-date").html(contentDate);
                        var $form =
                            "<br/>" +
                            "<div class=\"row \">\n" +
                            "<div class=\"col-12 \">\n" +
                            "<div class=\"form-group \">\n" +
                            "<label for=\"username\" class=\"control-label\">Nombre del Proyecto</label>\n" +
                            "<input class=\"form-control\" name=\"proyecto\" type=\"text\" id=\"proyecto\" required>\n" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "<div class=\"row \">\n" +
                            "<div class=\"col-12 \">\n" +
                            "<div class=\"form-group \">\n" +
                            "<label for=\"username\" class=\"control-label\">Nombre del Alumno</label>\n" +
                            "<input class=\"form-control\" name=\"alumno\" type=\"text\" id=\"alumno\" required>\n" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "<div class=\"row \">\n" +
                            "<div class=\"col-12 \">\n" +
                            "<div class=\"form-group \">\n" +
                            "<label for=\"username\" class=\"control-label\">No. control</label>\n" +
                            "<input class=\"form-control\" name=\"no_control\" type=\"number\" id=\"no_control\" required>\n" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "<input name=\"fecha\" id=\"fecha\" value=\"" + datePicker.format() + "\" hidden>\n";

                        $('#form-content').html($form);
                        $('#modal-agenda').modal("toggle");
                    }
                });
            }
        });
    }

    ajax();
    console.log(eventsD);
    console.log(events);
    // fullCalendar;

})
;