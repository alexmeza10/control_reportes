@extends('layout.dashboard')

@section('title', 'Nuevo Usuario')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <!-- Title -->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <div class="mb-13 text-justify">
                            <h1 class="text-dark fw-bold my-1 fs-3">Crear Usuario</h1>
                            <span class="text-muted fw-semibold fs-6">Control de Reportes en la Unidad de Redes y
                                Telecomunicaciones</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Title -->

            <div id="kt_app_content_container" class="app-container container-xxl">

                <!-- Formulario -->
                <div class="app-container container-xxl">
                    <div class="card mb-5">
                        <div class="card-body">
                            <form id="newUserForm" method="POST" action="{{ route('users.store') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">Nombre completo</label>
                                    <input type="text" name="nombre" class="form-control" />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Usuario</label>
                                    <input type="text" name="usuario" class="form-control" />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Extensión</label>
                                    <input type="text" name="extension" class="form-control" />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Rol</label>
                                    <select name="rol" class="form-select">
                                        <option value="">Selecciona un rol</option>
                                        <option value="admin">Administrador</option>
                                        <option value="user">Usuario</option>
                                    </select>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-warning">Crear Usuario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
