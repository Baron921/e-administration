
"use strict";

$(function () {
    $(document).on('submit', '#form_type', function (e) {
        e.preventDefault();

        let tableContainer = $('#table-type');

        let form = $('#form_type')[0];
        let form_data = new FormData(form);
        let url = $('#form_type').attr('action');

        $.ajax({
            type: "post",
            data: form_data,
            url: url,
            cache: false,
            processData: false,
            contentType: false,

            success: function (data) {
                $('#form_type')[0].reset();
                $('#id').attr('value', 0);

                tableContainer.html(data);
                $('#createType').modal('hide');

                $(".js-basic-example").DataTable({
                    responsive: true
                });

                $(".save-stage").DataTable({
                    scrollX: true,
                    stateSave: true
                });

                var t = $("#example3").DataTable({
                    scrollX: true
                });
                var counter = 1;

                $("#addRow").on("click", function () {
                    t.row
                        .add([
                            counter + ".1",
                            counter + ".2",
                            counter + ".3",
                            counter + ".4",
                            counter + ".5"
                        ])
                        .draw(false);

                    counter++;
                });

                $.notify({
                    // options
                    icon: 'fa fa-check',
                    title: '',
                    message: 'Nouveau type ajouté avec succès !',
                    url: '#',
                    target: '_blank'
                }, {
                    // settings
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: {
                        x: 50,
                        y: 60
                    },
                    spacing: 10,
                    z_index: 1031,
                    delay: 1000,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated flipInY',
                        exit: 'animated flipOutX'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    //'<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    //'<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });

                console.log(data);
            },

            error: function (data) {

                $.notify({
                    title: '<span class="fa fa-exclamation-triangle"></span>',
                    message: 'Impossible de créer une nouveau type !'
                }, {
                    type: 'danger'
                });

                console.log(data);
            }
        });
    });
});


$(function () {
    $(document).on('submit', '#form_type_update', function (e) {
        e.preventDefault();

        let tableContainer = $('#table-type');
        let form = $('#form_type_update')[0];
        let form_data = new FormData(form);
        form_data.append('id', $('#idUpdate').val());
        let url = $('#form_type_update').attr('action');

        $.ajax({
            method: $(this).attr('method'),
            data: form_data,
            url: url,
            cache: false,
            contentType: false,
            processData: false,

            success: function (data) {
                $("#form_type_update")[0].reset();
                $('#id').attr('value', 0);

                tableContainer.html(data);
                $('#updateType').modal('hide');

                $(".js-basic-example").DataTable({
                    responsive: true
                });

                $(".save-stage").DataTable({
                    scrollX: true,
                    stateSave: true
                });

                var t = $("#example3").DataTable({
                    scrollX: true
                });
                var counter = 1;

                $("#addRow").on("click", function () {
                    t.row
                        .add([
                            counter + ".1",
                            counter + ".2",
                            counter + ".3",
                            counter + ".4",
                            counter + ".5"
                        ])
                        .draw(false);

                    counter++;
                });

                $.notify({
                    // options
                    icon: 'fa fa-check',
                    title: '',
                    message: 'Mise à jour effectuée avec succès !',
                    url: '#',
                    target: '_blank'
                },{
                    // settings
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: {
                        x: 50,
                        y: 60
                    },
                    spacing: 10,
                    z_index: 1031,
                    delay: 1000,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated flipInY',
                        exit: 'animated flipOutX'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    //'<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    //'<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });

                console.log(data)
            },

            error: function (data) {
                console.log(data)
            }
        });
    })
});


$(function () {
    $(document).on('click', '.typeDelete', function () {

        let type = $(this).data('id');
        let code = $(this).data('code');
        let url = $('#form_type_update').attr('action');

        swal({
                title: "Êtes-vous sûr de vouloir supprimer ?",
                text: "La suppression est irréversible !",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "supprimer",
                cancelButtonText: "Annuler",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax(
                        {
                            url: url,
                            type: 'get',
                            data: {
                                "id": type,
                            },
                            success: function (response) {
                                $("#" + code).fadeOut('slow', function () {
                                    $(this).remove();
                                });
                                console.log("it Works");
                            },
                            error: function (error) {
                                console.log(error)
                            }
                        });
                    swal("Supprimer!", "Suppression effectuée avec succès.", "success");
                } else {
                    swal("Annuler", "Suppression annuler", "error");
                }
            }
        );
    })
});