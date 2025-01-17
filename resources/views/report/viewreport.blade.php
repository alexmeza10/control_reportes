@extends('layout.dashboard')

@section('title', 'Report')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <!--Titulo-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="mb-13 text-justify">
                        <h1 class="mb-3">Reporte #111456</h1>
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
                            <div class="d-flex flex-column flex-xl-row p-7">
                                <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                                    <div class="mb-10">
                                        <div class="d-flex align-items-center mb-12">
                                            <i class="ki-duotone ki-file-added fs-4qx text-success ms-n2 me-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="d-flex flex-column">
                                                <h1 class="text-gray-800 fw-semibold">Cambio de cable de
                                                    red</h1>
                                                <div>
                                                    <span class="fw-semibold text-muted me-6">Area:
                                                        <a class="fw-bold text-gray-600 me-1">Redes y
                                                            Telecomunicaciones</a></span>
                                                    <span class="fw-semibold text-muted">Fecha de generacion:
                                                        <span class="fw-bold text-gray-600 me-1">24/11/2024 a las 12:03
                                                            PM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Nombre del solicitante:</label>
                                                <a class="form-control form-control-solid">Luis Perez</a>
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Dirección, Unidad o Dependencia del
                                                    solicitante</label>
                                                <a class="form-control form-control-solid">Ordenamiento del
                                                    territorio</a>
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Contacto del solicitante</label>
                                                <a class="form-control form-control-solid">1234</a>
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Correo</label>
                                                <a class="form-control form-control-solid">luis.perez@zapopan.gob.mx</a>
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Numero de Empleado</label>
                                                <div class="position-relative d-flex align-items-center">
                                                    <a class="form-control form-control-solid">123456</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Estatus del reporte</label>
                                                <a class="form-control form-control-solid">Cerrado</a>
                                            </div>
                                        </div>
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">¿Se notificó por correo?</label>
                                                <div class="position-relative d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <label class="form-check form-check-custom form-check-solid me-10">
                                                            <input class="form-check-input h-20px w-20px" type="radio"
                                                                name="notifications" value="email" checked="checked"
                                                                disabled />
                                                            <span class="form-check-label fw-semibold text-muted">Sí</span>
                                                        </label>
                                                        <label class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input h-20px w-20px" type="radio"
                                                                name="notifications" value="none" disabled />
                                                            <span class="form-check-label fw-semibold text-muted">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="fs-6 fw-semibold mb-2">Descripción:</label>
                                        <a class="form-control form-control-solid">Se realiza reemplazo de
                                            cable de red ya que se presenta con deterioro.</a>
                                        <div class="mt-4">
                                            <label class="fs-6 fw-semibold mb-2">Evidencias:</label>
                                        </div>
                                        <div class="d-flex flex-wrap gap-4">
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="card h-100">
                                                    <div
                                                        class="card-body d-flex justify-content-center text-center flex-column p-8">
                                                        <a href="#" class="text-gray-800 text-hover-primary"
                                                            data-bs-toggle="modal" data-bs-target="#previewModal"
                                                            data-img-src="{{ asset('media/demo/imagen.jpg') }}">
                                                            <img src="{{ asset('media/demo/imagen.jpg') }}" alt="Imagen 1"
                                                                style="width: 100%; border-radius: 8px;" />
                                                        </a>
                                                        <div class="fs-5 fw-bold mt-3">imagen1.jpg</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="card h-100">
                                                    <div
                                                        class="card-body d-flex justify-content-center text-center flex-column p-8">
                                                        <a href="#" class="text-gray-800 text-hover-primary"
                                                            data-bs-toggle="modal" data-bs-target="#previewModal"
                                                            data-img-src="{{ asset('media/demo/imagen.jpg') }}">
                                                            <img src="{{ asset('media/demo/imagen.jpg') }}" alt="Imagen 2"
                                                                style="width: 100%; border-radius: 8px;" />
                                                        </a>
                                                        <div class="fs-5 fw-bold mt-3">imagen2.jpg</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="card h-100">
                                                    <div
                                                        class="card-body d-flex justify-content-center text-center flex-column p-8">
                                                        <a href="media/demo/example.pdf" target="_blank"
                                                            class="text-gray-800 text-hover-primary d-flex flex-column">
                                                            <div class="symbol symbol-60px mb-5">
                                                                <img src="{{ asset('media/svg/files/pdf.svg') }}"
                                                                    class="theme-light-show" alt="PDF Icon">
                                                                <img src="{{ asset('media/svg/files/pdf-dark.svg') }}"
                                                                    class="theme-dark-show" alt="PDF Icon (Dark)">
                                                            </div>
                                                            <div class="fs-5 fw-bold mb-2">example.pdf</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="previewModal" tabindex="-1"
                                            aria-labelledby="previewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="previewModalLabel">Vista previa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img id="modalPreviewImage" src="" alt="Vista previa"
                                                            style="max-width: 100%; height: auto; border-radius: 8px;" />
                                                        <p id="modalPreviewMessage" class="mt-3 text-muted"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="previewModal" tabindex="-1"
                                            aria-labelledby="previewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="previewModalLabel">Vista previa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img id="modalPreviewImage" src="" alt="Vista previa"
                                                            style="max-width: 100%; height: auto; border-radius: 8px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const previewModal = document.getElementById('previewModal');
            const modalPreviewImage = document.getElementById('modalPreviewImage');
            const modalPreviewMessage = document.getElementById('modalPreviewMessage');

            previewModal.addEventListener('show.bs.modal', function(event) {
                const triggerElement = event.relatedTarget; // El elemento que disparó el modal
                const filePath = triggerElement.getAttribute('data-img-src'); // Ruta del archivo

                if (filePath.endsWith('.pdf')) {
                    // Mostrar un mensaje para PDFs
                    modalPreviewImage.setAttribute('src', '{{ asset('media/svg/files/pdf.svg') }}');
                    modalPreviewMessage.textContent = `Este es un archivo PDF: ${filePath}`;
                } else {
                    // Mostrar imagen para otros archivos
                    modalPreviewImage.setAttribute('src', filePath);
                    modalPreviewMessage.textContent = ''; // Sin mensaje adicional
                }
            });
        });
    </script>
@endsection
