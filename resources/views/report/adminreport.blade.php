@extends('layout.dashboard')

@section('title', 'Administrar Reportes')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!--Title-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <div class="mb-13 text-justify">
                            <h1 class="mb-3">Administrar reportes</h1>
                            <div class="text-gray-500 fw-semibold fs-5">Control de Reportes en la Unidad de
                                Redes y Telecomunicaciones</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Title-->

            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-xl-row p-7">
                                        <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                                            <div class="mb-0">
                                                <form method="get" action="{{ route('report.adminreport') }}"
                                                    class="form mb-15">
                                                    <div class="row g-3 align-items-end">
                                                        <div class="col-md-3 position-relative">
                                                            <i
                                                                class="ki-duotone ki-magnifier fs-1 text-primary position-absolute top-50 translate-middle-y ms-5">
                                                                <span class="path1"></span><span class="path2"></span>
                                                            </i>
                                                            <input type="text"
                                                                class="form-control form-control-sm form-control-solid ps-14"
                                                                name="search" value="{{ request('search') }}"
                                                                placeholder="Buscar por ID, asunto, estatus..." />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label fw-semibold">Desde</label>
                                                            <input type="date" name="from"
                                                                class="form-control form-control-sm form-control-solid"
                                                                value="{{ request('from') }}" />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label fw-semibold">Hasta</label>
                                                            <input type="date" name="to"
                                                                class="form-control form-control-sm form-control-solid"
                                                                value="{{ request('to') }}" />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label fw-semibold">Orden</label>
                                                            <select name="order"
                                                                class="form-select form-select-sm form-select-solid">
                                                                <option value="desc"
                                                                    {{ request('order') == 'desc' ? 'selected' : '' }}>Más
                                                                    recientes
                                                                </option>
                                                                <option value="asc"
                                                                    {{ request('order') == 'asc' ? 'selected' : '' }}>Más
                                                                    antiguos
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 d-flex gap-2">
                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                <i class="ki-duotone ki-filter fs-5 me-1"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i>
                                                                Filtrar
                                                            </button>
                                                            <a href="{{ route('report.adminreport') }}"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="ki-duotone ki-cross-circle fs-5 me-1"><span
                                                                        class="path1"></span><span
                                                                        class="path2"></span></i>
                                                                Limpiar
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="mb-10">
                                                    @foreach ($reportes as $reporte)
                                                        <div class="d-flex mb-10">
                                                            <i
                                                                class="ki-duotone {{ $reporte->icono_status }} fs-2x me-5 ms-n1 mt-2 {{ $reporte->color_status }}">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                @if ($reporte->status == 2)
                                                                    <span class="path3"></span>
                                                                @endif
                                                            </i>
                                                            <div class="d-flex flex-column">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <a href="{{ route('report.show', ['hashid' => $reporte->hashid]) }}"
                                                                        class="text-gray-900 text-hover-primary fs-4 me-3 fw-semibold">
                                                                        #{{ $reporte->id }}
                                                                    </a>
                                                                    <span
                                                                        class="badge badge-light my-1">{{ $reporte->nombre_status }}</span>
                                                                </div>
                                                                <span
                                                                    class="text-muted fw-semibold fs-6">{{ $reporte->subject }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if ($reportes->hasPages())
                                                    <div class="d-flex justify-content-center">
                                                        {{ $reportes->links('vendor.pagination.bootstrap-5') }}
                                                    </div>
                                                @endif
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
@endsection
