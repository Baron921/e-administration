"use strict";
$(function() {
  //Horizontal form basic
  $("#wizard_horizontal").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onInit: function(event, currentIndex) {
      setButtonWavesEffect(event);
    },
    onStepChanged: function(event, currentIndex, priorIndex) {
      setButtonWavesEffect(event);
    }
  });

  //Vertical form basic
  $("#wizard_vertical").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    onInit: function(event, currentIndex) {
      setButtonWavesEffect(event);
    },
    onStepChanged: function(event, currentIndex, priorIndex) {
      setButtonWavesEffect(event);
    }
  });

  //Advanced form with validation
  var form = $("#wizard_with_validation").show();
  form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    onInit: function(event, currentIndex) {
      //Set tab width
      var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
      var tabCount = $tab.length;
      $tab.css("width", 100 / tabCount + "%");

      //set button waves effect
      setButtonWavesEffect(event);
    },
    onStepChanging: function(event, currentIndex, newIndex) {
      if (currentIndex > newIndex) {
        return true;
      }

      if (currentIndex < newIndex) {
        form.find(".body:eq(" + newIndex + ") label.error").remove();
        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
      }

      form.validate().settings.ignore = ":disabled,:hidden";
      return form.valid();
    },
    onStepChanged: function(event, currentIndex, priorIndex) {
      setButtonWavesEffect(event);
    },
    onFinishing: function(event, currentIndex) {
      form.validate().settings.ignore = ":disabled";
      return form.valid();
    },
    onFinished: function(event, currentIndex) {
        let blocContainer = $('#blocProduit');
        let form=$('#wizard_with_validation')[0];
        let form_data=new FormData(form);
        form_data.append('id',$("#id_update").val());
        $.ajax({
            method:"POST",
            data:form_data,
            cache:false,
            contentType:false,
            processData:false,
            url: $("#wizard_with_validation").attr('action'),
            success: function (data) {
                $("#wizard_with_validation")[0].reset();
                $('#id').attr('value', 0);
                document.getElementById('image_view').innerHTML = "";
                swal("Opération effectuée avec succès !", "Succès!", "success");
                blocContainer.html(data);

                $(".js-basic-example").DataTable({
                    responsive: true
                });

                $(".save-stage").DataTable({
                    scrollX: true,
                    stateSave: true
                });

                let t = $("#example3").DataTable({
                    scrollX: true
                });
                let counter = 1;

                $("#addRow").on("click", function() {
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

                $('#exampleModal').modal('hide');

                    console.log(data)
                },
                error: function (data) {
                    console.log(data)
                }
            });
        }
    });


  form.validate({
    highlight: function(input) {
      $(input)
        .parents(".form-line")
        .addClass("error");
    },
    unhighlight: function(input) {
      $(input)
        .parents(".form-line")
        .removeClass("error");
    },
    errorPlacement: function(error, element) {
      $(element)
        .parents(".form-group")
        .append(error);
    },
    rules: {
      confirm: {
        equalTo: "#password"
      }
    }
  });

});

function setButtonWavesEffect(event) {
  $(event.currentTarget)
    .find('[role="menu"] li a')
    .removeClass("waves-effect");
  $(event.currentTarget)
    .find('[role="menu"] li:not(.disabled) a')
    .addClass("waves-effect");
}

$(function () {
    $(document).on('submit', "#update_detailProduit", function (e) {
        e.preventDefault();
        let listContainer = $('#fluid');
        let form=$('#update_detailProduit')[0];
        let form_data=new FormData(form);
        form_data.append('id',$("#id_update").val());
        let url = $('#update_detailProduit').attr('action');
        //console.log(url);
        $.ajax({
            method:$(this).attr('method'),
            cache:false,
            data:form_data,
            contentType:false,
            processData:false,
            url:url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                $("#update_detailProduit")[0].reset();
                $("#id").attr('value', 0);

                listContainer.html(data);

                // select all thumbnails
                const galleryThumbnail = document.querySelectorAll(".thumbnails-list li");
                // select featured
                const galleryFeatured = document.querySelector(
                    ".product-gallery-featured img"
                );

                // loop all items
                galleryThumbnail.forEach(item => {
                    item.addEventListener("mouseover", function() {
                        let image = item.children[0].src;
                        galleryFeatured.src = image;
                    });
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

                // show popover
                $(".main-questions").popover("show");

                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    })

});

$(function () {
    $(document).on('submit', "#edit_detailProduit", function (e) {
        e.preventDefault();
        let listContainer = $('#fluid');
        let form=$('#edit_detailProduit')[0];
        let form_data=new FormData(form);
        form_data.append('id',$("#id_update").val());
        let url = $('#edit_detailProduit').attr('action');
        //console.log(url);
        $.ajax({
            method:$(this).attr('method'),
            cache:false,
            data:form_data,
            contentType:false,
            processData:false,
            url:url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                $("#edit_detailProduit")[0].reset();
                $("#id").attr('value', 0);

                listContainer.html(data);

                // select all thumbnails
                const galleryThumbnail = document.querySelectorAll(".thumbnails-list li");
                // select featured
                const galleryFeatured = document.querySelector(
                    ".product-gallery-featured img"
                );

                // loop all items
                galleryThumbnail.forEach(item => {
                    item.addEventListener("mouseover", function() {
                        let image = item.children[0].src;
                        galleryFeatured.src = image;
                    });
                });

                // Notification de succès d'opération

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

                // show popover
                $(".main-questions").popover("show");

                console.log(data);
            },
            error: function (data) {
                $.notify({
                    title: '<span class="fa fa-exclamation-triangle"></span>',
                    message: 'Impossible de mettre à jour !'
                },{
                    type: 'danger'
                });
                console.log(data);
            }
        })
    })

});


$(document).on('click', ".deleteButton", function(){
    let id = $(this).data('id');
    let code = $(this).data('code');
    //console.log(url);
    let url = $('#wizard_with_validation').attr('action');
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
        function(isConfirm) {
            if (isConfirm) {
                $.ajax(
                    {
                        url: url,
                        type: 'get',
                        data: {
                            "id": id,
                        },
                        success: function (response){
                            //$('#'+code).fadeOut();
                            $("#"+code).fadeOut('slow', function() {
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


// Suppression d'une image présente dans le modal update

    $(document).on('click', ".supprImg", function(){
        let deleteImg = $(this).data('id');
        let code = $(this).data('code');
        let msg = $(this).data('msg');
        let url = $('#wizard_with_validation').attr('action');
        console.log(url);
        console.log(deleteImg);
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
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax(
                        {
                            url: url,
                            type: 'get',
                            data: {
                                "id": deleteImg,
                            },
                            success: function (response){
                                $("#"+code).fadeOut('slow', function() {
                                    $(this).remove();
                                });
                                console.log("it Works");
                                swal("Supprimer!", "Suppression effectuée avec succès.", "success");
                            },
                            error: function (error) {
                                console.log(error)
                            }
                        });
                    /*let formulaire = document.getElementById("wizard_with_validation");
                    let form = document.getElementById("edit_detailProduit");
                    let updateUrl = "http://localhost:8000/admin/produits/update/"+msg;
                    formulaire.setAttribute("action", updateUrl);
                    form.setAttribute('action', )
                    document.getElementById("id_update").value = msg;*/
                } else {
                    swal("Annuler", "Suppression annuler", "error");
                }
            });

        });

    $(document).on('click', ".clear", function(){
        let deleteImg = $(this).data('id');
        let code = $(this).data('code');
        let msg = $(this).data('msg');
        let url = $('#edit_detailProduit').attr('action');
        console.log(url);
        console.log(deleteImg);
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
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax(
                        {
                            url: url,
                            type: 'get',
                            data: {
                                "id": deleteImg,
                            },
                            success: function (response){
                                $("#"+code).fadeOut('slow', function() {
                                    $(this).remove();
                                });
                                console.log("it Works");
                                swal("Supprimer!", "Suppression effectuée avec succès.", "success");
                            },
                            error: function (error) {
                                console.log(error)
                            }
                        });
                    let formulaire = document.getElementById("edit_detailProduit");
                    let updateUrl = "http://localhost:8000/admin/produits/update/"+msg;
                    formulaire.setAttribute("action", updateUrl);
                    document.getElementById("id_update").value = msg;
                } else {
                    swal("Annuler", "Suppression annuler", "error");
                }
            });

    });



