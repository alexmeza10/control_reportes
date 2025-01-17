"use strict";
var KTSigninGeneral = (function () {
    var t, e, r;
    return {
        init: function () {
            // Selección de elementos del formulario
            t = document.querySelector("#kt_sign_in_form");
            e = document.querySelector("#kt_sign_in_submit");

            // Configuración de validación
            r = FormValidation.formValidation(t, {
                fields: {
                    user: {
                        validators: {
                            notEmpty: {
                                message: "El usuario es obligatorio.",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "La contraseña es obligatoria.",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            });

            // Manejo de eventos del botón
            e.addEventListener("click", function (i) {
                i.preventDefault();

                r.validate().then(function (validationResult) {
                    if (validationResult === "Valid") {
                        // Mostrar indicador de carga
                        e.setAttribute("data-kt-indicator", "on");
                        e.disabled = true;

                        // Simular una solicitud (reemplazar con integración real si necesario)
                        setTimeout(function () {
                            e.removeAttribute("data-kt-indicator");
                            e.disabled = false;

                            Swal.fire({
                                text: "¡Has iniciado sesión correctamente!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Aceptar",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            }).then(function (response) {
                                if (response.isConfirmed) {
                                    // Redirigir a la URL especificada
                                    const redirectUrl = t.getAttribute("data-kt-redirect-url");
                                    if (redirectUrl) {
                                        location.href = redirectUrl;
                                    }
                                }
                            });
                        }, 2000); // Simula un retraso de 2 segundos
                    } else {
                        Swal.fire({
                            text: "Lo siento, parece que has ingresado algún dato incorrecto. Por favor, inténtalo de nuevo.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    }
                });
            });
        },
    };
})();

// Inicialización al cargar el DOM
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
