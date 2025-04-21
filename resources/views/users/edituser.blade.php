@extends('layout.dashboard')

@section('title', 'Editar Usuario')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Title -->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <div class="mb-13 text-justify">
                        <h1 class="mb-3">Editar Usuario</h1>
                        <div class="text-gray-500 fw-semibold fs-5">
                            Control de Reportes en la Unidad de Redes y Telecomunicaciones
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End title -->

        <div id="kt_app_content_container" class="app-container container-xxl">
            <!-- Formulario -->
            <div class="card mb-5">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->hashid) }}" id="editUserForm">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $user->nombre) }}" required />
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control" value="{{ old('usuario', $user->usuario) }}" required />
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required />
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Extensión</label>
                            <input type="text" name="extension" class="form-control" maxlength="4" value="{{ old('extension', $user->extension) }}" required />
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Rol</label>
                            <select name="rol" class="form-select" required>
                                <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Administrador</option>
                                <option value="user" {{ $user->rol === 'user' ? 'selected' : '' }}>Usuario</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Activo</label>
                            <select name="activo" class="form-select" required>
                                <option value="1" {{ $user->activo ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ !$user->activo ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('users.adminusers') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning">Actualizar Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
