@extends('layout.dashboard')

@section('title', 'Reporte')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!-- Título -->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="mb-13 text-justify">
                        <h1 class="mb-3">Reporte #<a href="{{ route('report.show', $reporte->id) }}"
                                class="text-primary">{{ $reporte->id }}</a></h1>
                        <div class="text-gray-500 fw-semibold fs-5">Control de Reportes en la Unidad de Redes y
                            Telecomunicaciones</div>
                    </div>
                </div>
            </div>
            <!-- Fin Título -->

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-xl-row p-7">
                                <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                                    <div class="mb-10">
                                        <div class="d-flex align-items-center mb-12">
                                            <i
                                                class="ki-duotone {{ $reporte->icono_status }} fs-4qx {{ $reporte->color_status }} ms-n2 me-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="d-flex flex-column">
                                                <h1 class="text-gray-800 fw-semibold">{{ $reporte->subject }}</h1>
                                                <div>
                                                    <span class="fw-semibold text-muted me-6">Área:
                                                        <a
                                                            class="fw-bold text-gray-600 me-1">{{ $reporte->dependencia }}</a></span>
                                                    <span class="fw-semibold text-muted">Número de empleado:
                                                        <span
                                                            class="fw-bold text-gray-600 me-1">{{ $reporte->num_empleado }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Datos del Reporte -->
                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Nombre del solicitante:</label>
                                                @if ($reporte->status == 1)
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $reporte->nombre }}" />
                                                @else
                                                    <a class="form-control form-control-solid">{{ $reporte->nombre }}</a>
                                                @endif
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Dependencia:</label>
                                                @if ($reporte->status == 1)
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $reporte->dependencia }}" />
                                                @else
                                                    <a
                                                        class="form-control form-control-solid">{{ $reporte->dependencia }}</a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Extensión:</label>
                                                @if ($reporte->status == 1)
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="{{ $reporte->ext }}" />
                                                @else
                                                    <a class="form-control form-control-solid">{{ $reporte->ext }}</a>
                                                @endif
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">Correo:</label>
                                                @if ($reporte->status == 1)
                                                    <input type="email" class="form-control form-control-solid"
                                                        value="{{ $reporte->mail }}" />
                                                @else
                                                    <a class="form-control form-control-solid">{{ $reporte->mail }}</a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">Estatus del reporte:</label>
                                                @if ($reporte->status == 1)
                                                    <select class="form-control form-control-solid">
                                                        <option value="1"
                                                            {{ $reporte->status == 1 ? 'selected' : '' }}>Abierto</option>
                                                        <option value="2"
                                                            {{ $reporte->status == 2 ? 'selected' : '' }}>En espera de
                                                            partes</option>
                                                        <option value="3"
                                                            {{ $reporte->status == 3 ? 'selected' : '' }}>Cerrado</option>
                                                    </select>
                                                @else
                                                    <a
                                                        class="form-control form-control-solid">{{ $reporte->nombre_status }}</a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-8">
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-6 fw-semibold mb-2">¿Se notificó por correo?</label>
                                                <div class="position-relative d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <label class="form-check form-check-custom form-check-solid me-10">
                                                            <input class="form-check-input h-20px w-20px" type="radio"
                                                                disabled
                                                                {{ $reporte->notificar_correo == 1 ? 'checked' : '' }} />
                                                            <span class="form-check-label fw-semibold text-muted">Sí</span>
                                                        </label>
                                                        <label class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input h-20px w-20px" type="radio"
                                                                disabled
                                                                {{ $reporte->notificar_correo == 0 ? 'checked' : '' }} />
                                                            <span class="form-check-label fw-semibold text-muted">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="fs-6 fw-semibold mb-2">Descripción:</label>
                                        @if ($reporte->status == 1)
                                            <textarea class="form-control form-control-solid">{{ $reporte->description }}</textarea>
                                        @else
                                            <a class="form-control form-control-solid">{{ $reporte->description }}</a>
                                        @endif

                                        <label class="fs-6 fw-semibold mb-2">Evidencias:</label>
                                        <div class="d-flex flex-wrap gap-4">
                                            @foreach ($reporte->evidencias as $evidencia)
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                    <div class="card h-100">
                                                        <div
                                                            class="card-body d-flex justify-content-center text-center flex-column p-8">
                                                            <a href="{{ asset('storage/' . $evidencia['ruta']) }}"
                                                                class="text-gray-800 text-hover-primary" target="_blank">
                                                                <img src="{{ asset('storage/' . $evidencia['ruta']) }}"
                                                                    alt="Evidencia"
                                                                    style="width: 100%; border-radius: 8px;" />
                                                            </a>
                                                            <div class="fs-5 fw-bold mt-3">{{ $evidencia['nombre'] }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
                const triggerElement = event.relatedTarget;
                const filePath = triggerElement.getAttribute('data-img-src');

                if (filePath.endsWith('.pdf')) {
                    modalPreviewImage.setAttribute('src', '{{ asset('media/svg/files/pdf.svg') }}');
                    modalPreviewMessage.textContent = `Este es un archivo PDF: ${filePath}`;
                } else {
                    modalPreviewImage.setAttribute('src', filePath);
                    modalPreviewMessage.textContent = '';
                }
            });
        });
    </script>
@endsection
