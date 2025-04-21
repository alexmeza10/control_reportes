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
                            <span class="text-muted fw-semibold fs-6">
                                Control de Reportes en la Unidad de Redes y Telecomunicaciones
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Title -->

            <div id="kt_app_content_container" class="app-container container-xxl">

                <!-- Formulario -->
                <div class="card mb-5">
                    <div class="card-body">
                        {{-- Mensaje de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form id="newUserForm" method="POST" action="{{ route('users.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label">Nombre completo</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}"
                                    required />
                                @error('nombre')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Usuario</label>
                                <input type="text" name="usuario" class="form-control" value="{{ old('usuario') }}"
                                    required />
                                @error('usuario')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required />
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Extensión</label>
                                <input type="text" name="extension" class="form-control" maxlength="4"
                                    value="{{ old('extension') }}" required />
                                @error('extension')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Rol</label>
                                <select name="rol" class="form-select" required>
                                    <option value="">Selecciona un rol</option>
                                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador
                                    </option>
                                    <option value="user" {{ old('rol') == 'user' ? 'selected' : '' }}>Usuario</option>
                                </select>
                                @error('rol')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button id="submitUserBtn" type="submit" class="btn btn-warning">Crear Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Overlay de carga -->
                <div id="loadingOverlay" class="d-none"
                    style="position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); z-index: 9999; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                    <div class="text-white mt-3 fs-4 fw-semibold">Guardando...</div>
                </div>

            </div>
        </div>
    </div>
@endsection
