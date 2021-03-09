"use strict";

$(function () {
    $(document).on('submit', '#form_partenaire', function (e) {
        e.preventDefault();

        let form=$('#form_partenaire')[0];
        let form_data=new FormData(form);
        form_data.append('id',$("#id_partenaire").val());
        let url = $('#form_partenaire').attr('action');

        $.ajax({
           method:"POST",
           data: form_data,
           cache: false,
           contentType:false,
           processData:false,
           url: url,
           success: function (data) {
               $("#form_partenaire")[0].reset();
               $('#id').attr('value', 0);
               console.log(data)
           },
           error: function (data) {
               console.log(data)
           }

        });

        swal.fire({
            position: 'top-right',
            icon: 'success',
            title: 'Votre requête a été envoyée avec succès',
            showConfirmButton: false,
            timer: 1500
        })
    })
});