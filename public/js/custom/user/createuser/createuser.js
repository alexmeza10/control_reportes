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
                            message: "El nombre es requerido",
                        },
                        regexp: {
                            regexp: /^[A-Za-zÁÉÍÓÚáéíóú]+(?:\s[A-Za-zÁÉÍÓÚáéíóú]+)*$/,
                            message:
                                "El nombre solo puede contener letras y espacios (sin múltiples espacios consecutivos)",
                        },
                    },
                },
                usuario: {
                    validators: {
                        notEmpty: {
                            message: "El usuario es requerido",
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_.]+$/,
                            message:
                                "El usuario solo puede contener letras, números, guiones bajos o puntos",
                        },
                    },
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: "El correo electrónico es requerido",
                        },
                        emailAddress: {
                            message: "El formato del correo no es válido",
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9._%+-]+@zapopan\.gob\.mx$/,
                            message: "Solo se permiten correos @zapopan.gob.mx",
                        },
                    },
                },
                extension: {
                    validators: {
                        notEmpty: {
                            message: "La extensión telefónica es requerida",
                        },
                        regexp: {
                            regexp: /^\d{4}$/,
                            message:
                                "La extensión debe contener exactamente 4 números",
                        },
                    },
                },
                rol: {
                    validators: {
                        notEmpty: {
                            message: "Selecciona un rol",
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".mb-4",
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
            },
        });
    };

    var initSubmit = function () {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            validator.validate().then(function (status) {
                if (status === "Valid") {
                    Swal.fire({
                        title: "¿Crear usuario?",
                        text: "Se registrará un nuevo usuario en el sistema.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, crear",
                        cancelButtonText: "Cancelar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-secondary",
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const overlay =
                                document.getElementById("loadingOverlay");
                            if (overlay) overlay.style.display = "block";

                            submitButton.setAttribute(
                                "data-kt-indicator",
                                "on"
                            );
                            submitButton.disabled = true;

                            axios
                                .post(
                                    form.getAttribute("action"),
                                    new FormData(form)
                                )
                                .then(function () {
                                    Swal.fire({
                                        text: "El usuario ha sido creado correctamente.",
                                        icon: "success",
                                        confirmButtonText: "Entendido",
                                        customClass: {
                                            confirmButton: "btn btn-primary",
                                        },
                                    }).then(() => {
                                        window.location.href = "/adminusers";
                                    });
                                })
                                .catch(function (error) {
                                    let message =
                                        error.response?.data?.message ||
                                        "Ha ocurrido un error.";
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
                                    const overlay =
                                        document.getElementById(
                                            "loadingOverlay"
                                        );
                                    if (overlay) overlay.style.display = "none";

                                    submitButton.removeAttribute(
                                        "data-kt-indicator"
                                    );
                                    submitButton.disabled = false;
                                });
                        }
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
            form = document.getElementById("newUserForm");
            submitButton = document.getElementById("submitUserBtn");

            if (!form || !submitButton) {
                return;
            }

            initValidation();
            initSubmit();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCreateUser.init();
});
