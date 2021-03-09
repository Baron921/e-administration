"use strict";

$(function () {
    $(document).on('submit', '#form_change', function (e) {
        e.preventDefault();

        let form = $('#form_change')[0];
        let form_data = new FormData(form);
        form_data.append('id', $("#id_partenaire").val());
        let url = $('#form_change').attr('action');
        let tableAsk = $('#table_demande');
        console.log(tableAsk);
        //tableAsk.html("");

        $.ajax({
            method: $(this).attr('method'),
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            url: url,

            success: function (data) {
                $("#form_change")[0].reset();
                $('#id').attr('value', 0);

                $("#modalQuickView").modal('hide');

                let notify = $.notify('<strong style="color: black"> <h6> Traitement de la demande en cour ... </h6> </strong>', {
                    type: 'primary',
                    allow_dismiss: false,
                    showProgressbar: true,
                    offset: {
                        x: 50,
                        y: 60
                    },
                }, 4000);

                setTimeout(function () {
                    notify.update({
                        'type': 'success',
                        'message': '<strong style="color: white"> <h6> Confirmation de la demande ... </h6> </strong> ',
                        'progress': 99
                    });
                }, 3000);

                setTimeout(function () {
                    $.notify("<strong style='color: white'> <h6> Le traitement de la requête effectuée avec succès ! </h6> </strong>", {
                        animate: {
                            enter: 'animated flipInY',
                            exit: 'animated flipOutX'
                        },
                        offset: {
                            x: 50,
                            y: 60
                        },
                        type: 'success',
                        delay: 2000,
                        timer: 1000
                    });
                }, 2660);

                setTimeout(function () {
                    tableAsk.html(data);
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
                }, 3500);
            },

            error: function (data) {
                console.log(data);

                $("#modalQuickView").modal('hide');

                let notify = $.notify('<strong style="color: black"> <h6> Traitement de la demande en cour ... </h6> </strong>', {
                    type: 'primary',
                    allow_dismiss: false,
                    showProgressbar: true,
                    offset: {
                        x: 50,
                        y: 60
                    },
                });

                setTimeout(function () {
                    notify.update({
                        'type': 'danger',
                        'message': '<strong style="color: white"> <h6> Confirmation de la demande ... </h6> </strong> ',
                        'progress': 99
                    });
                }, 5000);

                setTimeout(function () {
                    $.notify("<strong style='color: white'> <h6> Echec de la demande de partenariat ! </h6> </strong>", {
                        animate: {
                            enter: 'animated flipInY',
                            exit: 'animated flipOutX'
                        },
                        icon: 'fa fa-check',
                        offset: {
                            x: 50,
                            y: 60
                        },
                        type: 'danger',
                        delay: 1500,
                        timer: 1000
                    });
                }, 6600);
            },
        });
    })

});

$(function () {
   $(document).on('click', '.buttonclear', function () {
       let demandeClear = $(this).data('id');
       let url = $('#form_change').attr('action');
       let code = $(this).data('code');
       console.log(code);

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
                               "id": demandeClear,
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
   });
