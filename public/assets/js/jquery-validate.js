"use strict";

$().ready(function () {

    $.validator.addMethod( "alphanumeric", function( value, element ) {
        return this.optional( element ) || /^[a-zA-Z0-9 éèçïîêëôöùà^âû’()°.—'_\-,;:\s\d]*$/i.test( value );
    }, "Letters, numbers, and underscores only please" );


    $.validator.addMethod( "email", function( value, element ) {
        return this.optional( element ) || /^([a-z0-9_\.\-\+])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,3})/.test( value );
    }, "Letters, numbers, and underscores only please" );


    $.validator.addMethod( "address", function( value, element ) {
        return this.optional( element ) || /^[a-zA-Z éèçïîêëôöù.,;:/\-()_\s\d]*$/i.test( value );
    }, "Letters, numbers, and underscores only please" );


    $.validator.addMethod( "lettersonly", function( value, element ) {
        return this.optional( element ) || /^[a-zA-Z \-éèç()ï'îêëôöùà\s]*$/i.test( value );
    }, "Letters only please" );


    $.validator.addMethod( "nowhitespace", function( value, element ) {
        return this.optional( element ) || /^\S+$/i.test( value );
    }, "Veuillez ne pas inscrire d'espaces blancs" );


    $.validator.addMethod( "phoneUS", function( phone_number, element ) {
        phone_number = phone_number.replace( /\s+/g, "" );
        return this.optional( element ) || phone_number.length < 9 &&
            phone_number.match( /^([0-9]{4})\2([0-9]{4})$/ );
    }, "Please specify a valid phone number" );


    $.validator.addMethod("chiffre", function (value, element) {
        return this.optional(element) || /^\d+$/i.test(value);
    }, "seul des chiffres (0-9) sont autorisés !");


    $.validator.addMethod( "integer", function( value, element ) {
        return this.optional( element ) || /^-?\d+$/.test( value );
    }, "A positive or negative non-decimal number please" );

    // Same as url, but TLD is optional
    $.validator.addMethod( "url2", function( value, element ) {
        return this.optional( element ) || /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)*(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test( value );
    }, $.validator.messages.url );

    // Limit the size of each individual file in a FileList.
    $.validator.addMethod( "maxsize", function( value, element, param ) {
        if ( this.optional( element ) ) {
            return true;
        }

        if ( $( element ).attr( "type" ) === "file" ) {
            if ( element.files && element.files.length ) {
                for ( let i = 0; i < element.files.length; i++ ) {
                    if ( element.files[ i ].size > param ) {
                        return false;
                    }
                }
            }
        }

        return true;
    }, $.validator.format( "File size must not exceed {0} bytes each." ) );


    jQuery.validator.addMethod("filesize_max", function(value, element, param) {
        var isOptional = this.optional(element),
            file;

        if(isOptional) {
            return isOptional;
        }

        if ($(element).attr("type") === "file") {

            if (element.files && element.files.length) {

                file = element.files[0];
                console.log(file.size);
                return ( file.size && file.size < 2097152 );
            }
        }
        return true;
    },
        "File size is too large.");


    // Limit the number of files in a FileList.
    $.validator.addMethod( "maxfiles", function( value, element, param ) {
        if ( this.optional( element ) ) {
            return true;
        }

        if ( $( element ).attr( "type" ) === "file" ) {
            if ( element.files && element.files.length > param ) {
                return false;
            }
        }

        return true;
    }, $.validator.format( "Please select no more than {0} files." ) );


/* ---  CATEGORIE VALIDATE --- */

    $("#form_categorie").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },

            description: {
                required: true,
                alphanumeric: true
            },

            logo: {
                required: true,
                filesize_max: true
            },
        },
        messages: {
            nom:   {
                required:'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: mairie)"
            },

            description: {
                required:'Ce champ est obligatoire',
                alphanumeric:'Veuillez fournir seulement des lettres, nombres, espaces et soulignages',
            },

            logo: {
                required: 'Ce champ est obligatoire',
                filesize_max: "La taille du fichier ne doit pas dépasser 2Mo (2097152 Octets)"
            },
        }
    });

    $("#update_form_categorie").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },

            description: {
                required: true,
                alphanumeric: true
            },

            logoUpdate: {
                filesize_max: true
            },
        },
        messages: {
            nom:   {
                required:'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: mairie)"
            },

            description: {
                required:'Ce champ est obligatoire',
                alphanumeric:'Veuillez fournir seulement des lettres, nombres, espaces et soulignages',
            },

            logoUpdate: {
                filesize_max: "La taille du fichier ne doit pas dépasser 2Mo (2097152 Octets)"
            }
        }
    });



/* ---  INSTITUTION VALIDATE --- */

    $("#form_institution").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },

            adresse: {
                required: true,
                address: true
            },

            contact: {
                required: true,
                phoneUS: true,
            },

            email: {
                required: true,
                email: true
            },

            siteweb: {
                required: true,
                url2: true
            },

            description: {
                required: true,
                alphanumeric: true
            },

            categorie_id: {
                required: true,
                chiffre: true
            },

        },

        messages: {
            nom: {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: CNSS)"
            },

            adresse: {
                required: 'Ce champ est obligatoire',
                adress: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },

            contact: {
                required: 'Ce champ est obligatoire',
                phoneUS: "Veuillez fournir un numéro de téléphone valide"
            },

            email: {
                required: 'Ce champ est obligatoire',
                email: "Veuillez fournir une adresse électronique valide"
            },

            siteweb: {
                required: 'Ce champ est obligatoire',
                url2: "Veuillez fournir une adresse URL valide (ex: https://www.gouv.bj)"
            },

            description: {
                required: 'Ce champ est obligatoire',
                alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },

            categorie_id: {
                required: 'Ce champ est obligatoire',
                chiffre: "Veuillez fournir un numéro valide"
            },
        }
    });

    $("#form_institution_update").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },

            adresse: {
                required: true,
                address: true
            },

            contact: {
                required: true,
                phoneUS: true,
            },

            email: {
                required: true,
                email: true
            },

            siteweb: {
                required: true,
                url2: true
            },

            description: {
                required: true,
                alphanumeric: true
            },

            categorie_id: {
                required: true,
                chiffre: true
            },

            logoUpdate: {
                filesize_max: true
            },
        },

        messages: {
            nom: {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: CNSS)"
            },

            adresse: {
                required: 'Ce champ est obligatoire',
                adress: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },

            contact: {
                required: 'Ce champ est obligatoire',
                phoneUS: "Veuillez fournir un numéro de téléphone valide"
            },

            email: {
                required: 'Ce champ est obligatoire',
                email: "Veuillez fournir une adresse électronique valide"
            },

            siteweb: {
                required: 'Ce champ est obligatoire',
                url2: "Veuillez fournir une adresse URL valide (ex: https://www.gouv.bj)"
            },

            description: {
                required: 'Ce champ est obligatoire',
                alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },

            categorie_id: {
                required: 'Ce champ est obligatoire',
                chiffre: "Veuillez fournir un numéro valide"
            },

            logoUpdate: {
                filesize_max: "La taille du fichier ne doit pas dépasser 2Mo (2097152 Octets)"
            }
        }
    });



/* ---  PIECE VALIDATE --- */

    $("#form_piece").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },
            description: {
                required: true,
                alphanumeric: true
            },
        },
        messages: {
            nom:   {
                required:'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: acte de naissance)"
            },
            description: {
                required:'Ce champ est obligatoire',
                alphanumeric:'Veuillez fournir seulement des lettres, nombres, espaces et soulignages',
            },
        }
    });

    $("#form_piece_update").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },
            description: {
                required: true,
                alphanumeric: true
            },
        },
        messages: {
            nom:   {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: acte de naissance)"
            },
            description: {
                required: 'Ce champ est obligatoire',
                alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },
        }
    });



    /* ---  TYPE VALIDATE --- */

    $("#form_type").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },
            description: {
                required: true,
                alphanumeric: true
            },
        },
        messages: {
            nom:   {
                required:'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: affaire domaniale)"
            },
            description: {
                required:'Ce champ est obligatoire',
                alphanumeric:'Veuillez fournir seulement des lettres, nombres, espaces et soulignages',
            },
        }
    });

    $("#form_type_update").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },
            description: {
                required: true,
                alphanumeric: true
            },
        },
        messages: {
            nom:   {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: affaire domaniale)"
            },
            description: {
                required: 'Ce champ est obligatoire',
                alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },
        }
    });



/* ---  OPERATION VALIDATE  --- */

    $("#form_operation").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },

            montant: {
                required: true,
                chiffre: true
            },

            type: {
                required: true,
                lettersonly: true
            },

            description: {
                required: true,
                alphanumeric: true
            },
        },

        messages: {
            nom: {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: CNSS)"
            },

            montant: {
                required: 'Ce champ est obligatoire'
            },

            type: {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres"
            },

            description: {
                required: 'Ce champ est obligatoire',
                alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },
        }
    });

    $("#form_operation_update").validate({
        rules: {
            nom: {
                required: true,
                lettersonly: true
            },

            montant: {
                required: true,
                chiffre: true
            },

            type: {
                required: true,
                lettersonly: true
            },

            description: {
                required: true,
                alphanumeric: true
            },
        },

        messages: {
            nom: {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres (ex: CNSS)"
            },

            montant: {
                required: 'Ce champ est obligatoire'
            },

            type: {
                required: 'Ce champ est obligatoire',
                lettersonly: "Veuillez fournir seulement des lettres"
            },

            description: {
                required: 'Ce champ est obligatoire',
                alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages"
            },
        }
    });

});



