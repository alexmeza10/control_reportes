@extends('layout.dashboard')

@section('title', 'Menu')

@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--Titulo-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="mb-13 text-justify">
                    <h1 class="mb-3">Menu Principal</h1>
                    <div class="text-gray-500 fw-semibold fs-5">Control de Reportes en la Unidad de
                        Redes y Telecomunicaciones</div>
                </div>
            </div>
        </div>
        <!-- End Title-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--cards-->
            <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--firts card left-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10"
                        style="background-color: #f19f41;background-image:url('assets/media/patterns/vector-1.png')">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">12</span>
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Reportes totales</span>
                            </div>
                        </div>
                    </div>
                    <!--End firts card left-->
                    <!--second card left-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">1</span>
                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Reportes presenciales</span>
                            </div>
                        </div>
                    </div>
                    <!--End second card left-->
                </div>
                <!--End cards left-->
                <!--cards right-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--firts card right-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10"
                        style="background-color: #f19f41">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">1</span>
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Reportes por correo</span>
                            </div>
                        </div>
                    </div>
                    <!--End firts card right-->
                    <!--second card right-->
                    <div class="card card-flush h-lg-50">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">1</span>
                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Reportes
                                    por llamada</span>
                            </div>
                        </div>
                    </div>
                    <!--end second card right-->
                </div>
            </div>
            <!--End cards-->
            <!-- Calendario -->
            <div class="row gx-5 gx-xl-10 mb-xl-10">
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
                </div>
                <div class="col-lg-12 col-xl-12 col-xxl-6 mb-10 mb-xl-0">
                    <div class="card h-md-100">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Calendario</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">Total 3
                                    Reportes atendidos al dia de hoy</span>
                            </h3>
                        </div>
                        <div class="card-body pt-7 px-0">
                            <ul
                                class="nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between mb-8 px-5">
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_1">
                                        <span class="fs-7 fw-semibold">Vie</span>
                                        <span class="fs-6 fw-bold">20</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_2">
                                        <span class="fs-7 fw-semibold">Sab</span>
                                        <span class="fs-6 fw-bold">21</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_3">
                                        <span class="fs-7 fw-semibold">Dom</span>
                                        <span class="fs-6 fw-bold">22</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning active"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_4">
                                        <span class="fs-7 fw-semibold">Lun</span>
                                        <span class="fs-6 fw-bold">23</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_5">
                                        <span class="fs-7 fw-semibold">Mar</span>
                                        <span class="fs-6 fw-bold">24</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_6">
                                        <span class="fs-7 fw-semibold">Mier</span>
                                        <span class="fs-6 fw-bold">25</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_7">
                                        <span class="fs-7 fw-semibold">Jue</span>
                                        <span class="fs-6 fw-bold">26</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_8">
                                        <span class="fs-7 fw-semibold">Vier</span>
                                        <span class="fs-6 fw-bold">27</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_9">
                                        <span class="fs-7 fw-semibold">Sab</span>
                                        <span class="fs-6 fw-bold">28</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_10">
                                        <span class="fs-7 fw-semibold">Dom</span>
                                        <span class="fs-6 fw-bold">29</span>
                                    </a>
                                </li>
                                <li class="nav-item p-0 ms-0">
                                    <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-warning"
                                        data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_11">
                                        <span class="fs-7 fw-semibold">Lun</span>
                                        <span class="fs-6 fw-bold">30</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content mb-2 px-9">
                                <div class="tab-pane fade show active" id="kt_timeline_widget_3_tab_content_4">
                                    <div class="d-flex align-items-center mb-6">
                                        <span data-kt-element="bullet"
                                            class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                        <div class="flex-grow-1 me-5">
                                            <div class="text-gray-800 fw-semibold fs-2">10:20
                                                <span class="text-gray-500 fw-semibold fs-7">AM</span>
                                            </div>
                                            <div class="text-gray-700 fw-semibold fs-6">Remplazo de
                                                cable de red</div>
                                            <div class="text-gray-500 fw-semibold fs-7">Atendido
                                                por
                                                <a>Jorel Alejandro</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex align-items-center mb-6">
                                        <span data-kt-element="bullet"
                                            class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>
                                        <div class="flex-grow-1 me-5">
                                            <div class="text-gray-800 fw-semibold fs-2">4:30
                                                <span class="text-gray-500 fw-semibold fs-7">PM</span>
                                            </div>
                                            <div class="text-gray-700 fw-semibold fs-6">Instalacion
                                                de extencion</div>
                                            <div class="text-gray-500 fw-semibold fs-7">Atendido
                                                por
                                                <a>Leopoldo Jasso</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex align-items-center mb-6">
                                        <span data-kt-element="bullet"
                                            class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>
                                        <div class="flex-grow-1 me-5">
                                            <div class="text-gray-800 fw-semibold fs-2">12:00
                                                <span class="text-gray-500 fw-semibold fs-7">PM</span>
                                            </div>
                                            <div class="text-gray-700 fw-semibold fs-6">Revision de
                                                servidor por falla</div>
                                            <div class="text-gray-500 fw-semibold fs-7">Atendido
                                                por
                                                <a>Brenda Carmona</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Calendario -->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!-- Card Grafic -->
                @if (Auth::user()->rol === 'admin')
                <div class="col-xl-4">
                    <div class="card card-flush h-md-100">
                        <div class="card-header pt-5 mb-6">
                            <h3 class="card-title align-items-start flex-column">
                                <div class="d-flex align-items-center mb-2">

                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">12
                                        Reportes</span>
                                </div>
                                <span class="fs-6 fw-semibold text-gray-500">Grafica de
                                    reportes</span>
                            </h3>

                        </div>
                        <div class="card-body py-0 px-0">
                            <ul class="nav d-flex justify-content-between mb-3 mx-9">
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-flex flex-center btn-active-warning btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px active"
                                        data-bs-toggle="tab" id="kt_charts_widget_35_tab_1"
                                        href="#kt_charts_widget_35_tab_content_1">1d</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-flex flex-center btn-active-warning btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
                                        data-bs-toggle="tab" id="kt_charts_widget_35_tab_2"
                                        href="#kt_charts_widget_35_tab_content_2">5d</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-flex flex-center btn-active-warning btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
                                        data-bs-toggle="tab" id="kt_charts_widget_35_tab_3"
                                        href="#kt_charts_widget_35_tab_content_3">1m</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-flex flex-center btn-active-warning btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
                                        data-bs-toggle="tab" id="kt_charts_widget_35_tab_4"
                                        href="#kt_charts_widget_35_tab_content_4">6m</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link btn btn-flex flex-center btn-active-warning btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px"
                                        data-bs-toggle="tab" id="kt_charts_widget_35_tab_5"
                                        href="#kt_charts_widget_35_tab_content_5">1a</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-n6">
                                <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
                                    <div id="kt_charts_widget_35_chart_1" data-kt-chart-color="primary"
                                        class="min-h-auto h-200px ps-3 pe-6"></div>
                                    <div class="table-responsive mx-9 mt-n6">
                                        <table class="table align-middle gs-0 gy-4">
                                            <thead>
                                                <tr>
                                                    <th class="min-w-100px"></th>
                                                    <th class="min-w-100px text-end pe-0"></th>
                                                    <th class="text-end min-w-50px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a class="text-gray-600 fw-bold fs-6">
                                                            Llamada </a>
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">2</span>
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="badge badge-light-success fs-base">
                                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>9.2%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a class="text-gray-600 fw-bold fs-6">Correo</a>
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">1</span>
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="badge badge-light-danger fs-base">
                                                            <i class="ki-duotone ki-arrow-down fs-5 text-danger"></i>
                                                            -0.4%
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a class="text-gray-600 fw-bold fs-6">Presenciales</a>
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">1</span>
                                                    </td>
                                                    <td class="text-center pe-0">
                                                        <span class="badge badge-light-success fs-base">
                                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>9.2%</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- End Card Grafic -->
                <!-- Card from users -->
                @if (Auth::user()->rol === 'admin')
                <div class="col-xl-8">
                    <div class="card card-flush h-md-100">
                        <div class="card-header pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Usuarios de la
                                    Unidad de Redes y Telecomunicaciones</span>
                            </h3>
                            <div class="card-toolbar">
                                <a class="btn btn-sm btn-light" title="Actualizar">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-6">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px text-start">Usuarios
                                            </th>
                                            <th class="p-0 pb-3 min-w-90px text-end pe-0">
                                                Atendidos
                                            </th>
                                            <th class="p-0 pb-3 min-w-175px text-end pe-5">
                                                Progreso
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Usuario 1 -->
                                        <tr>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Leopoldo
                                                    Jasso</a>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-gray-600 fw-bold fs-6">18</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success"></i>
                                                    9.2%
                                                </span>
                                            </td>
                                        </tr>
                                        <!-- Usuario 2 -->
                                        <tr>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Brenda
                                                    Carmona</a>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-gray-600 fw-bold fs-6">10</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-danger fs-base">
                                                    <i class="ki-duotone ki-arrow-down fs-5 text-danger"></i>
                                                    0.4%
                                                </span>
                                            </td>
                                        </tr>
                                        <!-- Usuario 3 -->
                                        <tr>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Saul
                                                    Navarro</a>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-gray-600 fw-bold fs-6">32</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success"></i>
                                                    9.2%
                                                </span>
                                            </td>
                                        </tr>
                                        <!-- Usuario 4 -->
                                        <tr>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Oscar
                                                    Solis</a>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-gray-600 fw-bold fs-6">37</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success"></i>
                                                    9.2%
                                                </span>
                                            </td>
                                        </tr>
                                        <!-- Usuario 5 -->
                                        <tr>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Andrea Loera</a>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-gray-600 fw-bold fs-6">5</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-danger fs-base">
                                                    <i class="ki-duotone ki-arrow-down fs-5 text-danger"></i>
                                                    0.4%
                                                </span>
                                            </td>
                                        </tr>
                                        <!-- Usuario 6 -->
                                        <tr>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Ezequiel
                                                    Davila</a>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-gray-600 fw-bold fs-6">28</span>
                                            </td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success"></i>
                                                    9.2%
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- End Card from users -->
            </div>
        </div>
    </div>
    <!-- Up Button Page-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-black-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!-- Up Button Page -->

@endsection
