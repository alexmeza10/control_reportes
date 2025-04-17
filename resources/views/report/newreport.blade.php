@extends('layout.dashboard')

@section('title', 'Nuevo Reporte')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <!--Titulo-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                            <div class="mb-13 text-justify">
                                <h1 class="mb-3">Nuevo reporte</h1>
                                <div class="text-gray-500 fw-semibold fs-5">Control de Reportes en la Unidad de
                                    Redes y Telecomunicaciones</div>
                            </div>
                        </div>
                    </div>
                    <!-- End Title-->

                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <div class="card">
                                <div class="card-body">
                                    <!--Name-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Nombre del solicitante</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nombre"
                                            name="nombre" />
                                    </div>
                                    <!--End Name-->
                                    <div class="row g-9 mb-8">
                                        <!--Direccion-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Dirección, Unidad o Dependencia
                                                del
                                                solicitante</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Area que solicita atencion" name="dependencia" />

                                        </div>
                                        <!--End direccion-->
                                        <!--Contact-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Contacto del solicitante</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Extension de la persona que solicita" name="ext" />
                                        </div>
                                        <!--End contact-->
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <!--Mail-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-6 fw-semibold mb-2">Correo</label>
                                            <input type="text" id="emailField" class="form-control form-control-solid"
                                                placeholder="Correo institucional del solicitante" name="mail" />
                                        </div>
                                        <!--End mail-->
                                        <!--num-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-6 fw-semibold mb-2">Numero de Empleado</label>
                                            <div class="position-relative d-flex align-items-center">
                                                <input class="form-control form-control-solid"
                                                    placeholder="Ingresa numero de empleado del solicitante"
                                                    name="num_empleado" />
                                            </div>
                                        </div>
                                        <!--End num-->
                                    </div>
                                    <!--Status-->
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Estatus del reporte</label>
                                            <select class="form-select form-select-solid" name="estatus"
                                                data-control="select2" data-hide-search="true">
                                                <option value="" selected="selected">Selecciona un estatus</option>
                                                <option value="1">Abierto</option>
                                                <option value="2">En espera de partes</option>
                                                <option value="3">Pendiente</option>
                                                <option value="4">Cerrado</option>
                                            </select>
                                        </div>
                                        <!--Ubication-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">Ubicacion</label>
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Ingresa la ubicacion de donde se atiende el reporte"
                                                name="ubicacion" />
                                        </div>
                                        <!--End Ubication-->
                                    </div>
                                    <!--End Status-->
                                    <!-- titulo -->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Asunto</span>
                                            <span class="ms-2" data-bs-toggle="tooltip"
                                                title="Ingresa el motivo o una descripcion corta del reporte">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ingresa la solicitud" name="asunto" />
                                    </div>
                                    <!-- End titulo -->
                                    <!-- desc -->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!-- Etiqueta Descripción -->
                                        <div class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">Descripción</span>
                                            <span class="ms-2" data-bs-toggle="tooltip"
                                                title="Ingresa a detalle la descripción reporte">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <textarea class="form-control form-control-solid" rows="4" name="description"
                                            placeholder="Ingresa la descripción detallada del reporte"></textarea>
                                    </div>
                                    <!--Images-->
                                    <div class="fv-row mb-8">
                                        <label class="fs-6 fw-semibold mb-2">Evidencias</label>
                                        <form id="evidencias-upload" class="dropzone" action="/upload" method="post"
                                            enctype="multipart/form-data">
                                            <div class="dz-message needsclick">
                                                <i class="ki-duotone ki-file-up fs-3hx text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="ms-4">
                                                    <h3 class="fw-semibold fw-bold fs-5 text-gray-500 mb-1">Haz clic o
                                                        arrastra
                                                        hasta aqui para subir tus
                                                        archivos</h3>
                                                    <span class="fw-semibold fw-bold fs-5 text-gray-500 mb-1">
                                                        Solo puedes cargar un máximo de 10 archivos en formatos PDF, JPG o
                                                        PNG,
                                                        con
                                                        un tamaño máximo de 10 MB.
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--End Images-->
                                    <!-- notifications -->
                                    <div id="notification-section" class="mb-15 fv-row" style="display: none;">
                                        <div class="d-flex flex-stack">
                                            <div class="fw-semibold me-5">
                                                <label class="fs-6">Notificar</label>
                                                <div class="fs-7 text-gray-500">¿Deseas notificar por correo al usuario
                                                    sobre su reporte?</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <label class="form-check form-check-custom form-check-solid me-10">
                                                    <input class="form-check-input h-20px w-20px" type="radio"
                                                        name="notifications" value="email" checked />
                                                    <span class="form-check-label fw-semibold">Sí</span>
                                                </label>
                                                <label class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input h-20px w-20px" type="radio"
                                                        name="notifications" value="none" />
                                                    <span class="form-check-label fw-semibold">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Notifications -->
                                    <!-- button -->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_new_ticket_cancel"
                                            class="btn btn-light me-3">Cancelar</button>
                                        <button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-warning">
                                            <span class="indicator-label">Guardar</span>
                                            <span class="indicator-progress">Espera...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!-- End button -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.querySelector("#kt_app_content_container");
                const submitButton = document.querySelector("#kt_modal_new_ticket_submit");
                const cancelButton = document.querySelector("#kt_modal_new_ticket_cancel");
                const emailField = document.getElementById("emailField");
                const notificationSection = document.getElementById("notification-section");

                const validation = FormValidation.formValidation(form, {
                    fields: {
                        nombre: {
                            validators: {
                                notEmpty: {
                                    message: "El nombre del solicitante es obligatorio",
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
                                    message: "El contacto del solicitante es obligatorio",
                                },
                                numeric: {
                                    message: "El contacto debe ser un número válido",
                                },
                            },
                        },
                        mail: {
                            validators: {
                                regexp: {
                                    regexp: /^[^@\s]+@zapopan.gob.mx$/,
                                    message: "El correo debe ser del dominio zapopan.gob.mx",
                                },
                            },
                        },
                        num_empleado: {
                            validators: {
                                numeric: {
                                    message: "El número de empleado debe ser un valor numérico",
                                },
                            },
                        },
                        asunto: {
                            validators: {
                                notEmpty: {
                                    message: "El asunto es obligatorio",
                                },
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
                                    message: "Selecciona una opción de notificación",
                                },
                            },
                        },
                        estatus: {
                            validators: {
                                notEmpty: {
                                    message: "Selecciona un estatus para el reporte",
                                },
                            },
                        },
                        ubicacion: {
                            validators: {
                                notEmpty: {
                                    message: "Ingresa la ubicación donde se atiende el reporte",
                                },
                            },
                        },
                        evidencias: {
                            validators: {
                                callback: {
                                    message: "Por favor, sube al menos un archivo.",
                                    callback: function() {
                                        return evidenciasDropzone.files.length > 0;
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

                emailField.addEventListener("input", function() {
                    const emailValue = emailField.value.trim();

                    if (emailValue !== "" && emailValue.endsWith("@zapopan.gob.mx")) {
                        notificationSection.style.display = "block";
                    } else {
                        notificationSection.style.display = "none";
                    }
                });

                submitButton.addEventListener("click", function(e) {
                    e.preventDefault();
                    validation.validate().then(function(status) {
                        if (status === "Valid") {
                            submitButton.setAttribute("data-kt-indicator", "on");
                            submitButton.disabled = true;

                            setTimeout(function() {
                                submitButton.removeAttribute("data-kt-indicator");
                                submitButton.disabled = false;
                                Swal.fire({
                                    text: "¡Formulario enviado con éxito!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Entendido",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            }, 2000);
                        } else {
                            Swal.fire({
                                text: "Por favor, revisa los errores en el formulario e inténtalo nuevamente.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Entendido",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    });
                });

                cancelButton.addEventListener("click", function(e) {
                    e.preventDefault();
                    Swal.fire({
                        text: "¿Estás seguro de que deseas cancelar?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Sí, cancelar",
                        cancelButtonText: "No, regresar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            form.reset();
                            notificationSection.style.display = "none";
                        }
                    });
                });
            });

            const maxFiles = 10;
            const maxFileSize = 10;
            const allowedFileTypes = ["application/pdf", "image/jpeg", "image/png"];

            const evidenciasDropzone = new Dropzone("#evidencias-upload", {
                url: "/upload-evidencias",
                maxFiles: 10,
                maxFilesize: 10,
                acceptedFiles: ".pdf,.jpg,.jpeg,.png",
                addRemoveLinks: true,
                dictDefaultMessage: "Arrastra los archivos aquí o haz clic para subir.",
                dictRemoveFile: "Eliminar archivo",
                init: function() {
                    this.on("success", function(file, response) {
                        console.log("Archivo subido exitosamente", response);
                    });

                    this.on("error", function(file, errorResponse) {
                        console.error("Error durante la carga:", errorResponse);

                        Swal.fire({
                            text: errorResponse.message ||
                                "Hubo un error al subir el archivo.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Entendido",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                        this.removeFile(file);
                    });
                },
            });
        </script>
        </body>

    @endsection
