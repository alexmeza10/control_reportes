@extends('layout.dashboard')

@section('title', 'Administrar Reportes')

@section('content')


    <!--Titulo-->
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
                                        <form method="post" action="#" class="form mb-15">
                                            <div class="position-relative">
                                                <i
                                                    class="ki-duotone ki-magnifier fs-1 text-primary position-absolute top-50 translate-middle ms-9">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="text"
                                                    class="form-control form-control-lg form-control-solid ps-14"
                                                    name="search" value="" placeholder="Buscar" />
                                            </div>
                                        </form>
                                        <div class="mb-10">
                                            <div class="d-flex mb-10">
                                                <i class="ki-duotone ki-file-added fs-2x me-5 ms-n1 mt-2 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <a href="{{route ('report.viewreport')}}"
                                                            class="text-gray-900 text-hover-primary fs-4 me-3 fw-semibold">#114567</a>
                                                        <span class="badge badge-light my-1">Cerrado</span>
                                                    </div>
                                                    <span class="text-muted fw-semibold fs-6">Cambio de cable de red</span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-10">
                                                <i class="ki-duotone ki-add-files fs-2x me-5 ms-n1 mt-2 text-delete">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <a href="{{route ('report.viewreport')}}"
                                                            class="text-gray-900 text-hover-primary fs-4 me-3 fw-semibold">#114568</a>
                                                        <span class="badge badge-light my-1">En espera de partes</span>
                                                    </div>
                                                    <span class="text-muted fw-semibold fs-6">Instalacion de swicht</span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-10">
                                                <i class="ki-duotone ki-file-deleted fs-2x me-5 ms-n1 mt-2 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <a href="{{route ('report.viewreport')}}"
                                                            class="text-gray-900 text-hover-primary fs-4 me-3 fw-semibold">#114565</a>
                                                        <span class="badge badge-light my-1">Vencido</span>
                                                    </div>
                                                    <span class="text-muted fw-semibold fs-6">se requiere configurar PC</span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-10">
                                                <i class="ki-duotone ki-file-added fs-2x me-5 ms-n1 mt-2 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <a href="{{route ('report.viewreport')}}"
                                                            class="text-gray-900 text-hover-primary fs-4 me-3 fw-semibold">#114569</a>
                                                        <span class="badge badge-light my-1">Cerrado</span>
                                                    </div>
                                                    <span class="text-muted fw-semibold fs-6">habilitar nodo de red</span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-10">
                                                <i class="ki-duotone ki-add-files fs-2x me-5 ms-n1 mt-2 text-warning">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <a href="{{route ('report.viewreport')}}"
                                                            class="text-gray-900 text-hover-primary fs-4 me-3 fw-semibold">#114570</a>
                                                        <span class="badge badge-light my-1">Pendiente</span>
                                                    </div>
                                                    <span class="text-muted fw-semibold fs-6">Se habilita nodo</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pagination">
                                            <li class="page-item previous disabled">
                                                <a href="#" class="page-link">
                                                    <i class="previous"></i>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">6</a>
                                            </li>
                                            <li class="page-item next">
                                                <a href="#" class="page-link">
                                                    <i class="next"></i>
                                                </a>
                                            </li>
                                        </ul>
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
