@extends('layout.dashboard')

@section('title', 'Perfil')

@section('content')

<!-- Titulo -->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <div class="mb-13 text-justify">
                <h1 class="mb-3">Mi perfil</h1>
                <div class="text-gray-500 fw-semibold fs-5">Control de Reportes en la Unidad de
                    Redes y Telecomunicaciones</div>
            </div>
        </div>
    </div>
</div>
<!-- End Title -->

<div id="kt_app_content_container" class="app-container container-xxl">

    <!-- Detalles del Perfil -->
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
                    <span class="fw-bold fs-6 text-gray-800">{{ Auth::user()->nombre }}</span>
                </div>
            </div>

            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">Área</label>
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
                    <span class="fw-bold fs-6 text-gray-800">{{ Auth::user()->correo }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario: Cambiar Contraseña -->
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Cambiar contraseña</h3>
            </div>
        </div>
        <div class="card-body border-top p-9">
            <form id="kt_profile_change_password_form" class="form" method="POST" action="{{ route('password.update') }}">
                @csrf
            
                <div class="row mb-6 fv-row">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Contraseña actual</label>
                    <div class="col-lg-8">
                        <input type="password" name="current_password" class="form-control form-control-lg form-control-solid" placeholder="Ingresa tu contraseña actual" />
                    </div>
                </div>
            
                <div class="row mb-6 fv-row">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nueva contraseña</label>
                    <div class="col-lg-8">
                        <input type="password" name="new_password" class="form-control form-control-lg form-control-solid" placeholder="Ingresa tu nueva contraseña" />
                    </div>
                </div>
            
                <div class="row mb-6 fv-row">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Confirmar contraseña</label>
                    <div class="col-lg-8">
                        <input type="password" name="new_password_confirmation" class="form-control form-control-lg form-control-solid" placeholder="Confirma la nueva contraseña" />
                    </div>
                </div>
            
                <div class="d-flex justify-content-end">
                    <button type="submit" id="kt_profile_change_password_submit" class="btn btn-warning">
                        <span class="indicator-label">Guardar cambios</span>
                        <span class="indicator-progress">Guardando...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
