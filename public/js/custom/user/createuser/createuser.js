"use strict";

var KTCreateUser = (function () {
    var form;
    var submitButton;
    var validator;

    var initValidation = function () {
        validator = FormValidation.formValidation(form, {
            fields: {
                nombre: {
                    validators: {
                        notEmpty: {
                            message: 'El nombre es requerido'
                        },
                        regexp: {
                            regexp: /^[A-Za-zÁÉÍÓÚáéíóú\s]+$/,
                            message: 'El nombre solo puede contener letras y espacios'
                        }
                    }
                },
                usuario: {
                    validators: {
                        notEmpty: {
                            message: 'El usuario es requerido'
                        },
                        regexp: {
                            regexp: /^[A-Za-z]+$/,
                            message: 'El usuario solo puede contener letras sin espacios ni acentos'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'El correo electrónico es requerido'
                        },
                        emailAddress: {
                            message: 'El formato del correo no es válido'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9._%+-]+@zapopan\.gob\.mx$/,
                            message: 'Solo se permiten correos @zapopan.gob.mx'
                        }
                    }
                },
                extension: {
                    validators: {
                        notEmpty: {
                            message: 'La extensión telefónica es requerida'
                        },
                        regexp: {
                            regexp: /^\d{4}$/,
                            message: 'La extensión debe contener exactamente 4 números'
                        }
                    }
                },
                rol: {
                    validators: {
                        notEmpty: {
                            message: 'Selecciona un rol'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.mb-4'
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit()
            }
        });
    };

    var initSubmit = function () {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            validator.validate().then(function (status) {
                if (status === "Valid") {
                    submitButton.setAttribute("data-kt-indicator", "on");
                    submitButton.disabled = true;

                    axios.post(form.getAttribute("action"), new FormData(form))
                        .then(function (response) {
                            form.reset();
                            Swal.fire({
                                text: "El usuario ha sido creado correctamente.",
                                icon: "success",
                                confirmButtonText: "Entendido",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        })
                        .catch(function (error) {
                            let message = error.response?.data?.message || "Ha ocurrido un error.";
                            Swal.fire({
                                text: message,
                                icon: "error",
                                confirmButtonText: "Intentar de nuevo",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        })
                        .finally(() => {
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;
                        });
                } else {
                    Swal.fire({
                        text: "Parece que hay algunos errores. Por favor revisa e intenta de nuevo.",
                        icon: "error",
                        confirmButtonText: "Ok, entendido",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                }
            });
        });
    };

    return {
        init: function () {
            form = document.getElementById('newUserForm');
            submitButton = form.querySelector('button[type="submit"]');

            if (!form || !submitButton) return;

            initValidation();
            initSubmit();
        }
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCreateUser.init();
});
