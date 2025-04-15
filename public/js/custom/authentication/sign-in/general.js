"use strict";

var KTSigninGeneral = (function () {
    var t, e, r;
    return {
        init: function () {
            t = document.querySelector("#kt_sign_in_form");
            e = document.querySelector("#kt_sign_in_submit");
            r = FormValidation.formValidation(t, {
                fields: {
                    usuario: {
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

            e.addEventListener("click", function (i) {
                i.preventDefault();

                r.validate().then(function (validationResult) {
                    if (validationResult === "Valid") {
                        e.setAttribute("data-kt-indicator", "on");
                        e.disabled = true;

                        // Enviar formulario real
                        t.submit();
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

KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
