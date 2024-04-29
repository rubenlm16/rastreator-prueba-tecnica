import '../scss/styles.scss'
import $ from 'jquery';
import 'jquery-validation';

$(function() {
    $('#contact-form').validate({
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 9,
            },
            email: {
                required: true,
                email: true 
            },
            dni: {
                dni_check: true,
            },
            acceptance: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Por favor, ingresa tu nombre.",
                pattern: "El nombre no puede contener números."
            },
            phone: {
                required: "Por favor, ingresa tu número de teléfono.",
                digits: "El número de teléfono solo puede contener dígitos.",
                minlength: "El número de teléfono debe tener exactamente 9 dígitos.",
                maxlength: "El número de teléfono debe tener exactamente 9 dígitos.",
            },
            email: {
                required: "Por favor, ingresa tu correo electrónico.",
                email: "Por favor, ingresa un correo electrónico válido."
            },
            dni: {
                required: "Por favor, ingresa tu DNI.",
            },
            acceptance: {
                required: "Debes aceptar las políticas",
            }
        },
        submitHandler: function(form) {
            $.ajax({
                url: 'http://localhost',
                type: 'POST',
                data: $(form).serialize(),
                success: function(data) {
                    if (typeof data === 'string') {
                        if (JSON.parse(data) === 'success') {
                            $('#showSuccess').show()
                            $('#showSuccess').addClass('d-flex row')
                            $('#showSuccess').height($('#showForm').height());
                            $('#showForm').hide();
                            console.log('Formulario enviado correctamente');
                        } 
                    } else if (typeof data === 'object') {
                        // TODO: mostrar error de validaciones en el servidor
                    }
                }
            });
        }
    });
});

function is_valid_dni(dni) {
    if (dni) {
        var letter = dni.slice(-1);
        var numbers = dni.slice(0, -1);

        if (numbers.length === 8 && letter.length === 1) {
            try {
                if ("TRWAGMYFPDXBNJZSQVHLCKE".charAt(numbers % 23) === letter) {
                    return true;
                }
            } catch (error) {
                return false;
            }
        }
    }
    return false;
}


$.validator.addMethod('dni_check', function (value, element) {

    return is_valid_dni(value);

}, 'Introduce un DNI válido');