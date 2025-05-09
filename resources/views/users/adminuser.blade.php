@extends('layout.dashboard')

@section('title', 'Administrar Usuarios')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <!-- Title -->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="mb-13 text-justify">
                        <h1 class="mb-3">Administrar usuarios</h1>
                        <div class="text-gray-500 fw-semibold fs-5">Control de Reportes en la Unidad de
                            Redes y Telecomunicaciones</div>
                    </div>
                </div>
            </div>
            <!-- End Title -->

            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if (session('success'))
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    Swal.fire({
                                        text: "{{ session('success') }}",
                                        icon: "success",
                                        confirmButtonText: "Entendido",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                });
                            </script>
                        @endif

                        <!-- Botón flotante -->
                        <a href="{{ route('users.newuser') }}" class="btn btn-warning btn-icon position-fixed"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Nuevo Usuario"
                            style="bottom: 30px; right: 30px; z-index: 1050; padding: 15px; border-radius: 50px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                            <i class="ki-duotone ki-plus fs-2x"></i>
                        </a>

                        <!-- Tabla -->
                        <div class="table-responsive mt-5">
                            <table class="table table-bordered table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Correo</th>
                                        <th>Extensión</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->nombre }}</td>
                                            <td>{{ $user->usuario }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->extension }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $user->rol === 'admin' ? 'success' : 'secondary' }}">
                                                    {{ ucfirst($user->rol) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $user->activo ? 'success' : 'danger' }}">
                                                    {{ $user->activo ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('users.edit', $user->hashid) }}"
                                                    class="btn btn-sm btn-warning me-1">
                                                    <i class="ki-duotone ki-pencil fs-5"></i> Editar
                                                </a>
                                                @if ($user->activo)
                                                    <form action="{{ route('users.destroy', $user->hashid) }}"
                                                        method="POST" class="d-inline form-deactivate">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger btn-confirm-deactivate"
                                                            data-kt-indicator="">
                                                            <span class="indicator-label">
                                                                <i class="ki-duotone ki-user-minus fs-5"></i> Desactivar
                                                            </span>
                                                            <span class="indicator-progress">
                                                                Desactivando... <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                    </form>
                                                @else
                                                    <button class="btn btn-sm btn-secondary" disabled>
                                                        <i class="ki-duotone ki-user-x fs-5"></i> Inactivo
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No hay usuarios registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deactivateButtons = document.querySelectorAll('.btn-confirm-deactivate');

            deactivateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.form-deactivate');
                    const submitButton = this;

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Este usuario será desactivado.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, desactivar',
                        cancelButtonText: 'Cancelar',
                        customClass: {
                            confirmButton: "btn btn-danger",
                            cancelButton: "btn btn-secondary"
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            submitButton.disabled = true;

                            setTimeout(() => {
                                form.submit();
                            }, 300);
                        }
                    });
                });
            });
        });
    </script>
@endsection
