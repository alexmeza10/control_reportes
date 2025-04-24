"use strict";

var KTFormTicket = (function () {
    var form, modal, submitButton, cancelButton, validation, dropzone;
    var notificationSection, emailField;

    return {
        init: function () {
            modal = document.querySelector("#kt_modal_new_ticket");
            form = document.querySelector("#kt_modal_new_ticket_form");
            submitButton = document.querySelector(
                "#kt_modal_new_ticket_submit"
            );
            cancelButton = document.querySelector(
                "#kt_modal_new_ticket_cancel"
            );
            emailField = document.getElementById("emailField");
            notificationSection = document.getElementById(
                "notification-section"
            );

            // Dropzone
            dropzone = new Dropzone("#evidencias-upload", {
                url: "/upload-evidencias",
                maxFiles: 10,
                maxFilesize: 10,
                acceptedFiles: ".pdf,.jpg,.jpeg,.png",
                addRemoveLinks: true,
                dictDefaultMessage:
                    "Arrastra los archivos aquí o haz clic para subir.",
                dictRemoveFile: "Eliminar archivo",
                init: function () {
                    this.on("success", function (file, response) {
                        console.log("Archivo subido exitosamente", response);
                    });
                    this.on("error", function (file, errorResponse) {
                        console.error("Error al subir archivo:", errorResponse);
                        Swal.fire({
                            text:
                                errorResponse.message ||
                                "Hubo un error al subir el archivo.",
                            icon: "error",
                            confirmButtonText: "Entendido",
                            customClass: { confirmButton: "btn btn-primary" },
                        });
                        this.removeFile(file);
                    });
                },
            });

            // FormValidation
            validation = FormValidation.formValidation(form, {
                fields: {
                    nombre: {
                        validators: {
                            notEmpty: {
                                message:
                                    "El nombre del solicitante es obligatorio",
                            },
                        },
                    },
                    dependencia: {
                        validators: {
                            notEmpty: {
                                message: "La dirección o unidad es obligatoria",
                            },
                        },
                    },
                    ext: {
                        validators: {
                            notEmpty: {
                                message:
                                    "El contacto del solicitante es obligatorio",
                            },
                            numeric: {
                                message:
                                    "El contacto debe ser un número válido",
                            },
                        },
                    },
                    mail: {
                        validators: {
                            regexp: {
                                regexp: /^[^@\s]+@zapopan.gob.mx$/,
                                message:
                                    "El correo debe ser del dominio zapopan.gob.mx",
                            },
                        },
                    },
                    num_empleado: {
                        validators: {
                            numeric: {
                                message:
                                    "El número de empleado debe ser un valor numérico",
                            },
                        },
                    },
                    subject: {
                        validators: {
                            notEmpty: { message: "El asunto es obligatorio" },
                        },
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: "La descripción es obligatoria",
                            },
                        },
                    },
                    notifications: {
                        validators: {
                            notEmpty: {
                                message:
                                    "Selecciona una opción de notificación",
                            },
                        },
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message:
                                    "Selecciona un estatus para el reporte",
                            },
                        },
                    },
                    ubicacion: {
                        validators: {
                            notEmpty: {
                                message:
                                    "Ingresa la ubicación donde se atiende el reporte",
                            },
                        },
                    },
                    evidencias: {
                        validators: {
                            callback: {
                                message: "Por favor, sube al menos un archivo.",
                                callback: function () {
                                    return dropzone.files.length > 0;
                                },
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

            // Mostrar sección notificación al detectar email válido
            if (emailField) {
                emailField.addEventListener("input", function () {
                    const emailValue = emailField.value.trim();
                    if (emailValue.endsWith("@zapopan.gob.mx")) {
                        notificationSection.style.display = "block";
                    } else {
                        notificationSection.style.display = "none";
                    }
                });
            }

            // Submit
            submitButton.addEventListener("click", function (e) {
                e.preventDefault();

                validation.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;

                        setTimeout(function () {
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;

                            Swal.fire({
                                text: "¡Formulario enviado con éxito!",
                                icon: "success",
                                confirmButtonText: "Entendido",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            }).then(function () {
                                if (modal) {
                                    bootstrap.Modal.getInstance(modal).hide();
                                }
                            });
                        }, 2000);
                    } else {
                        Swal.fire({
                            text: "Por favor, revisa los errores en el formulario e inténtalo nuevamente.",
                            icon: "error",
                            confirmButtonText: "Entendido",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    }
                });
            });

            // Cancel
            cancelButton.addEventListener("click", function (e) {
                e.preventDefault();
                Swal.fire({
                    text: "¿Estás seguro de que deseas cancelar?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, cancelar",
                    cancelButtonText: "No, regresar",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light",
                    },
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.reset();
                        if (notificationSection) {
                            notificationSection.style.display = "none";
                        }
                        if (modal) {
                            bootstrap.Modal.getInstance(modal).hide();
                        }
                    }
                });
            });
        },
    };
})();

// Ejecutar cuando el DOM esté listo
KTUtil.onDOMContentLoaded(function () {
    KTFormTicket.init();
});
