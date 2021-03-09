"use strict";

$(function () {
    $(document).on('click', '.butonOperation', function (e) {

        e.preventDefault();

        let operation = $(this).data('id');
        let url = $(this).data('url');

        /*let operation_choice = $('#choice'+operation.id).attr('id');
        let choice_bloc = $('#choice_bloc').attr('id');

        document.getElementById(operation_choice).style.color = 'blue';
        document.getElementById(operation_choice).style.paddingTop = '0px';

        document.getElementById(choice_bloc).style.backgroundColor = '#bbbbbb';*/

        //history.pushState({}, "", url);

        let listOperation = $('#listOperation');

        //document.getElementById("listOperation").innerHTML = "";

        $.ajax({
            type: 'get',
            data: operation,
            url: url,
            cache: false,
            processData: false,
            contentType: false,

            success: function (data) {
                setTimeout(function () {
                    listOperation.html("<div class=\"loadingio\">\n" +
                        "            <div class=\"loadingio-spinner-spinner-szsqyhqfypr\">\n" +
                        "                <div class=\"ldio-5kb5nibaoh9\">\n" +
                        "                    <div></div><div></div><div></div><div></div><div></div>\n" +
                        "                    <div></div><div></div><div></div><div></div><div></div>\n" +
                        "                    <div></div><div></div><div></div><div></div><div></div>\n" +
                        "                </div>\n" +
                        "            </div>\n" +
                        "        </div>");
                }, 500);

                setTimeout(function () {
                    $('#operation_title').text("" + operation.nom);
                    listOperation.html(data);
                },700);
            },
            error: function (data) {
                console.log(data);
            }
        });

    });
});


$(function () {
    $(document).on('click', '.administration', function (e) {

    })
});


$(function () {
    $(document).on('click', '.butontheme', function (e) {

    })
});


$(function () {
    $(document).on('click', '.buton_details', function (e) {

        e.preventDefault();

        let operation = $(this).data('id');
        let url = $(this).data('url');

        let presentOperation = $('#presentOperation');

        let details = $('#welcome');

        $.ajax({
            type: 'get',
            data: operation,
            url: url,
            cache: false,
            processData: false,
            contentType: false,

            success: function (data) {
                presentOperation.html(data);
                details.html(data);

                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });

        //console.log(url);

    });
});


$(document).on('click', '.butonDrop', function () {

    let name = $(this).data('id');

    let blocDrop = $('#blocDrop');

    document.getElementById("blocDrop").innerHTML = "";

    blocDrop.html("<i class=\"icofont-simple-up shadow butonUp\" data-target=\"#other-detail\" data-toggle=\"collapse\"\n" +
        "                           title=\"voir\"> </i>");
});

$(document).on('click', '.butonUp', function () {

    let blocDrop = $('#blocDrop');

    document.getElementById("blocDrop").innerHTML = "";

    blocDrop.html("<i class=\"icofont-simple-down shadow butonDrop\" data-target=\"#other-detail\" data-toggle=\"collapse\"\n" +
        "                           title=\"Réduire\"> </i>");
});


$(function () {
    $(document).on('click', '.all-Operation', function (e) {

        e.preventDefault();

        let operation = $(this).data('id');
        let url = $(this).data('url');

        //history.pushState({}, "", url);

        let listOperation = $('#listOperation');

        //document.getElementById("listOperation").innerHTML = "";

        $.ajax({
            type: 'get',
            data: operation,
            url: url,
            cache: false,
            processData: false,
            contentType: false,

            success: function (data) {
                setTimeout(function () {
                    listOperation.html("<div class=\"loadingio\">\n" +
                        "            <div class=\"loadingio-spinner-spinner-szsqyhqfypr\">\n" +
                        "                <div class=\"ldio-5kb5nibaoh9\">\n" +
                        "                    <div></div><div></div><div></div><div></div><div></div>\n" +
                        "                    <div></div><div></div><div></div><div></div><div></div>\n" +
                        "                    <div></div><div></div><div></div><div></div><div></div>\n" +
                        "                </div>\n" +
                        "            </div>\n" +
                        "        </div>");
                }, 500);

                setTimeout(function () {
                    $('#operation_title').text("Toutes les opérations");
                    listOperation.html(data);
                }, 700);

                console.log(data);

            },
            error: function (data) {
                console.log(data);
            }
        });

        //console.log(url);

    });
});


$(function () {
    $(document).on('click', '.sigle_operation', function (e) {

        e.preventDefault();

        //let operation = $(this).data('id');
        let url = $(this).data('url');

        //history.pushState({}, "/acte/operations", url);

        let listOperation = $('#main');

        let bloc_detail = $('#bloc_detail');
        //bloc_detail.html("");

        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            processData: false,
            contentType: false,

            success: function (data) {
                setTimeout(function () {
                    listOperation.html("<div class=\"loadingio\">\n" +
                        "                <div class=\"loadingio-spinner-spinner-n88o6y64ukb\">\n" +
                        "                    <div class=\"ldio-0ps4isr1g7rp\">\n" +
                        "                        <div></div><div></div><div></div><div></div>\n" +
                        "                        <div></div><div></div><div></div><div></div>\n" +
                        "                        <div></div><div></div><div></div><div></div><div></div>\n" +
                        "                    </div>\n" +
                        "                </div>\n" +
                        "                <h4> Chargement ... </h4>\n" +
                        "            </div>");
                }, 500);

                setTimeout(function () {
                    listOperation.html(data);
                }, 1200);

            },
            error: function (data) {
                console.log(data);
            }
        });

    });
});


// Wrap every letter in a span
let textWrapper = document.querySelector('.ml12');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
    .add({
        targets: '.ml12 .letter',
        translateX: [40,0],
        translateZ: 0,
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 1000,
        delay: (el, i) => 500 + 30 * i
    })
    .add({
    targets: '.ml12 .letter',
    translateX: [0,-30],
    opacity: [1,0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i
    });

/*let choice_bloc = document.getElementById('menu');
let choix_operation = choice_bloc.getElementsByClassName('choix_operation');
for (let i = 0; i < choix_operation.length; i++) {
        choix_operation[i].addEventListener("click", function () {
        let current = document.getElementsByClassName("activer");
        current[0].className = current[0].className.replace(" activer", "");
        this.className += " activer";
    });
}*/


$(function () {
    $(document).on('click', '.buton_details', function () {

    })
});

let x=0;
function compteur()
{
    x = x+1;
    document.getElementById('nb').innerHTML = x;
}

$(document).ready(function(){
    $('ul li a').click(function(){
        $('li a').removeClass("activers");
        $(this).addClass("activers");
    });
});