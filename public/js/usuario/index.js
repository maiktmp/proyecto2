$(document).ready(function () {
    var url = $('#inp-url-data-grid-content').val();

    /*
     * BDataGrid creation
     */
    new BDataGrid({
        container: $('#container-data-grid'),
        url: url,
        afterPageRender: function () {
            $('[data-toggle="tooltip"]').tooltip();
        },
        pageSize: 10,
        columns: [
            {
                label: '#',
                callback: function (usuario) {
                    var $td = $('<td>', {
                        style: 'width: 70px',
                        html: usuario.id
                    });
                    return $td;
                }
            },
            {
                label: 'Nombre',
                property: 'nombre'
            },
            {
                label: 'Ap. Paterno',
                property: 'apellidoP'
            },
            {
                label: 'Ap. Materno',
                property: 'apellidoM'
            },
            {
                label: 'Correo',
                property: 'correo'
            },
            {
                label: 'Telefono',
                property: 'telefono'
            }
        ]
    });
});