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

                    <div id="kt_app_content_container" class="app-container container-xxl">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Cerrar"></button>
                            </div>
                        @endif

                        <form id="formularioReporte" method="POST" action="{{ route('report.store') }}"
                            enctype="multipart/form-data">
                            @csrf
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
                                        <label class="required fs-6 fw-semibold mb-2">Dirección, Unidad, Dependencia o
                                            empresa solicitante</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Área que solicita atención" name="dependencia" />
                                    </div>
                                    <!--Contact-->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Contacto del solicitante</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Extensión o número de contacto" name="ext" />
                                    </div>
                                </div>

                                <div class="row g-9 mb-8">
                                    <!--Mail-->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Correo</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Correo institucional" name="mail" />
                                    </div>
                                    <!--num-->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Número de Empleado</label>
                                        <input class="form-control form-control-solid" placeholder="Número de empleado"
                                            name="num_empleado" />
                                    </div>
                                </div>

                                <!--Status-->
                                <div class="row g-9 mb-8">
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Estatus del reporte</label>
                                        <select class="form-select form-select-solid" name="status" data-control="select2"
                                            data-hide-search="true">
                                            <option value="" selected="selected">Selecciona un estatus</option>
                                            <option value="1">Abierto</option>
                                            <option value="2">En espera de partes</option>
                                            <option value="3">Cerrado</option>
                                        </select>
                                    </div>
                                    <!--Ubication-->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Ubicación</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ubicación de atención" name="ubicacion" />
                                    </div>
                                </div>

                                <!-- titulo -->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Asunto</span>
                                        <span class="ms-2" data-bs-toggle="tooltip"
                                            title="Ingresa el motivo o una descripción corta del reporte">
                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span></i>
                                        </span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Ingresa la solicitud" name="subject" />
                                </div>

                                <!-- desc -->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <div class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Descripción</span>
                                        <span class="ms-2" data-bs-toggle="tooltip"
                                            title="Descripción detallada del reporte">
                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span></i>
                                        </span>
                                    </div>
                                    <textarea class="form-control form-control-solid" rows="4" name="description"
                                        placeholder="Ingresa la descripción detallada del reporte"></textarea>
                                </div>

                                <!--Images-->
                                <div class="fv-row mb-8">
                                    <label class="fs-6 fw-semibold mb-2">Evidencias</label>
                                    <div id="evidencias-upload" class="dropzone">
                                        <div class="dz-message needsclick">
                                            <i class="ki-duotone ki-file-up fs-3hx text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="ms-4">
                                                <h3 class="fw-semibold fw-bold fs-5 text-gray-500 mb-1">Haz clic o arrastra
                                                    tus archivos aquí</h3>
                                                <span class="fw-semibold fs-5 text-gray-500">Máximo 10 archivos (PDF, JPG,
                                                    PNG), 10 MB cada uno.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input oculto para archivos (por si se usa directamente en el submit) -->
                                    <input type="file" name="evidencias[]" id="evidencias" multiple hidden>
                                </div>
                                <!--End Images-->

                                <!-- notifications -->
                                <div id="notification-section" class="mb-15 fv-row" style="display: none;">
                                    <div class="d-flex flex-stack">
                                        <div class="fw-semibold me-5">
                                            <label class="fs-6">Notificar</label>
                                            <div class="fs-7 text-gray-500">¿Deseas notificar por correo al usuario sobre
                                                su reporte?</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-20px w-20px" type="radio"
                                                    name="notifications" value="1" checked />
                                                <span class="form-check-label fw-semibold">Sí</span>
                                            </label>
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input h-20px w-20px" type="radio"
                                                    name="notifications" value="0" />
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
                                        <span class="indicator-progress">Espera...<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!-- End button -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("#kt_app_content_container form");
            const submitButton = document.querySelector("#kt_modal_new_ticket_submit");
            const cancelButton = document.querySelector("#kt_modal_new_ticket_cancel");
            const notificationSection = document.getElementById("notification-section");
            const mailField = document.querySelector("input[name='mail']");

            // Mostrar notificación si se escribe un correo
            mailField.addEventListener("input", function() {
                notificationSection.style.display = this.value.trim() ? "block" : "none";
            });

            // Dropzone
            const evidenciasDropzone = new Dropzone("#evidencias-upload", {
                url: "/upload-evidencias", // Ruta que tú manejes para la subida temporal
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                maxFiles: 10,
                maxFilesize: 10,
                acceptedFiles: ".pdf,.jpg,.jpeg,.png",
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "Arrastra los archivos aquí o haz clic para subir.",
                dictRemoveFile: "Eliminar archivo",
                init: function() {
                    this.on("successmultiple", function(files, response) {
                        mostrarMensajeExito();
                    });

                    this.on("error", function(file, errorResponse) {
                        console.error("Error durante la carga:", errorResponse);
                        Swal.fire({
                            text: errorResponse.message ||
                                "Hubo un error al subir el archivo.",
                            icon: "error",
                            confirmButtonText: "Entendido",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        });
                        this.removeFile(file);
                    });

                    this.on("queuecomplete", function() {
                        form.submit();
                    });
                },
            });

            // Validación
            const validation = FormValidation.formValidation(form, {
                fields: {
                    nombre: {
                        validators: {
                            notEmpty: {
                                message: "El nombre del solicitante es obligatorio"
                            }
                        }
                    },
                    dependencia: {
                        validators: {
                            notEmpty: {
                                message: "La dirección o unidad es obligatoria"
                            }
                        }
                    },
                    ext: {
                        validators: {
                            numeric: {
                                message: "Debe ser un número válido"
                            }
                        }
                    },
                    mail: {
                        validators: {
                            emailAddress: {
                                message: "Debe ser un correo válido"
                            }
                        }
                    },
                    num_empleado: {
                        validators: {
                            numeric: {
                                message: "Debe ser un número válido"
                            }
                        }
                    },
                    subject: {
                        validators: {
                            notEmpty: {
                                message: "El asunto es obligatorio"
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: "La descripción es obligatoria"
                            }
                        }
                    },
                    notifications: {
                        validators: {
                            notEmpty: {
                                message: "Selecciona una opción de notificación"
                            }
                        }
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message: "Selecciona un estatus"
                            }
                        }
                    },
                    ubicacion: {
                        validators: {
                            notEmpty: {
                                message: "Ingresa la ubicación"
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                    }),
                },
            });

            // Envío del formulario
            submitButton.addEventListener("click", function(e) {
                e.preventDefault();
                submitButton.disabled = true;

                validation.validate().then(function(status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");

                        if (evidenciasDropzone.getQueuedFiles().length > 0) {
                            evidenciasDropzone.processQueue();
                        } else {
                            form.submit();
                        }
                    } else {
                        submitButton.disabled = false;
                        Swal.fire({
                            text: "Revisa los errores en el formulario.",
                            icon: "error",
                            confirmButtonText: "Entendido",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        });
                    }
                });
            });

            function mostrarMensajeExito() {
                submitButton.removeAttribute("data-kt-indicator");
                submitButton.disabled = false;

                Swal.fire({
                    text: "¡Formulario enviado con éxito!",
                    icon: "success",
                    confirmButtonText: "Entendido",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    },
                });
            }

            // Cancelación
            cancelButton.addEventListener("click", function(e) {
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
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.reset();
                        notificationSection.style.display = "none";
                        evidenciasDropzone.removeAllFiles(true);
                    }
                });
            });
        });
    </script>
@endsection
