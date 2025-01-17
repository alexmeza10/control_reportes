@extends('layout.dashboard')

@section('title', 'Perfil')

@section('content')

<!--Titulo-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1
                class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                Mi perfil</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">Control de Reportes en la Unidad de
                    Redes y Telecomunicaciones</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Title-->

<div id="kt_app_content_container" class="app-container container-xxl">
  
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <div class="card-header cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Detalles del perfil</h3>
            </div>
        </div>
        <div class="card-body p-9">
            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">Nombre completo</label>
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">Jorel Alejandro Meza Hernandez</span>
                </div>
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">Area</label>
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">Unidad de Redes y Telecomunicaciones</span>
                </div>
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">Contacto</label>
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bold fs-6 text-gray-800 me-2">EXT - 2327</span>
                    <span class="badge badge-success">Activo</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">Correo</label>
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">jorel.meza@zapopan.gob.mx</span>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
