"use strict";

/* AJAX DE CREATION D'UNE CATEGORIE */

$(function () {
    $(document).on('submit', '#form_categorie', function (e) {
        e.preventDefault();

        let tableContainer = $('#table-categorie');
        let form = $('#form_categorie')[0];
        let form_data = new FormData(form);
        let url = $('#form_categorie').attr('action');
        console.log(url);

        $.ajax({
            type: "post",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            url: url,

            success: function (data) {
                $("#form_categorie")[0].reset();
                $('#id').attr('value', 0);
                document.getElementById('imgLogo').innerHTML = " ";
                let uploadImg = document.getElementById('uploadImg');
                let title = document.getElementById('title');
                uploadImg.style.zIndex = 1;
                title.style.zIndex = 1;
                //$('#demo').modal('hide');
                tableContainer.html(data);

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
                    message: 'Nouvelle catégorie créée avec succès !',
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

                console.log(data)
            },
            error: function (data) {
                $.notify({
                    title: '<span class="fa fa-exclamation-triangle"></span>',
                    message: 'Impossible de créer une nouvelle catégorie !'
                }, {
                    type: 'danger'
                });
                console.log(data)
            }
        });

    })
});

$(document).on('click', '.page-title', function () {
    $.notify({
        // options
        icon: 'fa fa-check',
        title: '',
        message: 'Nouvelle catégorie créée avec succès !',
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
});


/* AJAX UPDATE D'UNE CATEGORIE */

$(function () {
    $(document).on('submit', '#update_form_categorie', function (e) {
        e.preventDefault();
        let tableContainer = $('#table-categorie');
        let form = $('#update_form_categorie')[0];
        let form_data = new FormData(form);
        form_data.append('id', $("#id_update").val());
        let url = $('#update_form_categorie').attr('action');

        $.ajax({
            method: $(this).attr('method'),
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            url: url,
            success: function (data) {
                $("#update_form_categorie")[0].reset();
                $('#id').attr('value', 0);
                swal("Elément modifié avec succès !", "Envoyer !", "success");
                tableContainer.html(data);

                $('#exampleModal').modal('hide');

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

                console.log(data)
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
});


/* AJAX DELETE D'UNE CATEGORIE */

$(document).on('click', ".categorieDelete", function () {
    let id = $(this).data('id');
    let code = $(this).data('code');
    console.log(id);
    let url = $('#update_form_categorie').attr('action');
    console.log(url);
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
                            "id": id,
                        },
                        success: function (response) {
                            //$('#'+code).fadeOut();
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
        });

});





