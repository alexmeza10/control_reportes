"use strict";

var KTProfileChangePassword = (function () {
    var form, submitButton, validator;

    return {
        init: function () {
            form = document.querySelector("#kt_profile_change_password_form");
            submitButton = document.querySelector("#kt_profile_change_password_submit");

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
                                min: 6,
                                message: "La contraseña debe tener al menos 8 caracteres",
                            },
                        },
                    },
                    confirm_password: {
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
                    }),
                },
            });

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
                                    text: "La contraseña ha sido actualizada correctamente.",
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
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTProfileChangePassword.init();
});
