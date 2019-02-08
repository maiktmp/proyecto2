$(document).ready(function () {


    var events = [];

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
                            "<input name=\"fecha\" id=\"fecha\" value=\"" + datePicker.format() + "\" hidden>\n";

                        //$('#form-content').html($form);
                        //$('#modal-agenda').modal("toggle");
                    }
                });
            },
            eventClick: function (event, jsEvent, view) {
                console.log(event);
                console.log(eventsD);
                console.log(jsEvent);
                console.log(view);
                var $html = $('<p>').html(
                    "Asesor: <b>" + event.asesor + "</b> <br>" +
                    "Proyecto: <b>" + event.titulo + "</b> <br>" +
                    "Alumno: <b>" + event.alumno + "</b> <br>" +
                    "No. Control: <b>" + event.no_control + "</b> <br>"
                );

                $("#div-agenda-detail").html($html);
                $("#modal-status").modal("toggle");
                var $url = $("#form-status").attr('action');
                $url = $url.replace('FAKE_ID', event.id);
                $("#form-status").attr('action', $url);

                if (event.status === 4) {
                    $('#state_cancel').attr('disabled', false).show().parent().show();
                    $('#state_all').attr('disabled', true).hide().parent().hide();
                } else {
                    $('#state_cancel').attr('disabled', true).hide().parent().hide();
                    $('#state_all').attr('disabled', false).show().parent().show();
                }
            }
        });
        var $html = "    <div>\n" +
            "                    <div class=\"row\">\n" +
            "                        <div class=\"col\">\n" +
            "                            <table>\n" +
            "                                <tr>\n" +
            "                                    <td><i style=\"color:#f59563\" class=\"fas fa-tint\"></i></td>\n" +
            "                                    <td>&nbsp; Pendiente</td>\n" +
            "                                </tr>\n" +
            "                                <tr>\n" +
            "                                    <td><i style=\"color:#6dbb47\" class=\"fas fa-tint\"></i></td>\n" +
            "                                    <td>&nbsp; Aceptado</td>\n" +
            "                                </tr>\n" +
            "                                <tr>\n" +
            "                                    <td><i style=\"color:#b1002c\" class=\"fas fa-tint\"></i></td>\n" +
            "                                    <td>&nbsp; Rechazado/Cancelado</td>\n" +
            "                                </tr>\n" +
            "                                <tr>\n" +
            "                                    <td><i style=\"color:#ffa500\" class=\"fas fa-tint\"></i></td>\n" +
            "                                    <td>&nbsp; Solicitud de cancelación</td>\n" +
            "                                </tr>\n" +
            "                            </table>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "                </div>";
        $('.fc-left').append(
            $('<button>', {
                class: 'btn btn-info',
                "data-html": "true",
                "data-toggle": "popover",
                "data-trigger": "focus",
                "title": "Simbología del color",
                "data-content": $html
            })
                .append(
                    $('<span>', {
                        class: 'fas fa-info-circle'
                    })
                )
        );
        $('[data-toggle="popover"]').popover();
        ajaxEvents();
    }

    ajax();


    function ajaxEvents() {
        $.ajax({
            async: false,
            url: $("#inp-url-pending").val(),
            dataType: 'json',
            success: function (response) {
                var $list = $("#list-events");
                var count = 0;
                response.forEach(function (event) {
                    count++;
                    var $span = $('<span>', {
                        'class': 'fas fa-circle',
                        'style': 'color:' + event.color
                    });
                    var $a = $('<a>', {
                        'class': 'dropdown-item event-pending',
                        'href': '#',
                        'date': event.fecha
                    }).append($span).append('&nbsp;').append('<b>' + event.usuario.nombre + '</b>' + " " + event.fecha);
                    $list.append($a);
                });
                $('#count-pending').append($('<span>', {'class': 'badge badge-danger'}).append(count));
            }
        });
    }

    $('.event-pending').click(function (event) {
        var date = $(this).attr('date');
        $divCalendar.fullCalendar('gotoDate', new Date(date));
    });
});
