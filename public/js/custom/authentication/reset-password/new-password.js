"use strict";

var KTProfileUpdatePassword = (function () {
    var form, submitButton, validator;

    return {
        init: function () {
            form = document.querySelector("#kt_profile_password_form");
            submitButton = document.querySelector("#kt_password_submit");

            if (!form || !submitButton) return;

            validator = FormValidation.formValidation(form, {
                fields: {
                    current_password: {
                        validators: {
                            notEmpty: {
                                message: "La contraseña actual es requerida",
                            },
                        },
                    },
                    new_password: {
                        validators: {
                            notEmpty: {
                                message: "La nueva contraseña es requerida",
                            },
                            stringLength: {
                                min: 8,
                                message: "Debe tener al menos 8 caracteres",
                            },
                        },
                    },
                    new_password_confirmation: {
                        validators: {
                            notEmpty: {
                                message: "Debes confirmar la nueva contraseña",
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="new_password"]').value;
                                },
                                message: "Las contraseñas no coinciden",
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

            submitButton.addEventListener("click", function (e) {
                e.preventDefault();
                validator.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;

                        axios
                            .post(form.getAttribute("action"), new FormData(form))
                            .then((response) => {
                                Swal.fire({
                                    text: "La contraseña ha sido actualizada correctamente.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Entendido",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });

                                form.reset();
                            })
                            .catch((error) => {
                                let mensaje = "Ocurrió un error, intenta de nuevo.";
                                if (error.response && error.response.data.errors) {
                                    const errores = Object.values(error.response.data.errors).flat();
                                    mensaje = errores.join("<br>");
                                }

                                Swal.fire({
                                    html: mensaje,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
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
                            text: "Parece que hay algunos errores. Por favor verifica.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, entendido",
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
    KTProfileUpdatePassword.init();
});
