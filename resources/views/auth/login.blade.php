<!DOCTYPE html>
<html lang="es">

<head>
    <title>login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.png') }}" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/keenicons/duotone/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/keenicons/outline/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/keenicons/solid/style.css') }}" rel="stylesheet" type="text/css" />



</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">

    {{-- Script para controlar el tema inicial --}}
    <script>
        const defaultThemeMode = "system";
        let savedTheme = localStorage.getItem("data-bs-theme") || defaultThemeMode;

        function applyTheme(mode) {
            if (mode === "system") {
                const systemPrefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
                document.documentElement.setAttribute("data-bs-theme", systemPrefersDark ? "dark" : "light");
            } else {
                document.documentElement.setAttribute("data-bs-theme", mode);
            }
        }

        applyTheme(savedTheme);

        // Escuchar cambios del sistema si está en modo 'system'
        window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
            if (localStorage.getItem("data-bs-theme") === "system") {
                applyTheme("system");
            }
        });
    </script>

    {{-- Botón selector de tema --}}
    <div class="position-fixed top-0 end-0 m-5 z-index-3">
        <div class="dropdown">
            <button class="btn btn-icon btn-light btn-sm shadow" type="button" data-bs-toggle="dropdown"
                aria-expanded="false" title="Cambiar tema">
                <i class="ki-duotone ki-moon fs-2"></i>

            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-kt-element="mode"
                        data-kt-value="light">
                        <i class="ki-duotone ki-sun fs-4 me-2"></i> Claro
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-kt-element="mode"
                        data-kt-value="dark">
                        <i class="ki-duotone ki-moon fs-4 me-2"></i> Oscuro
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-kt-element="mode"
                        data-kt-value="system">
                        <i class="ki-duotone ki-screen fs-4 me-2"></i> Sistema
                    </a>
                </li>
            </ul>
        </div>
    </div>


    {{-- Contenedor principal --}}
    <div class="d-flex flex-column flex-root" id="kt_app_root">

        {{-- Estilos de fondo dinámico según el tema --}}
        <style>
            body {
                background-image: url('{{ asset('media/auth/bg10.jpeg') }}');
                background-size: cover;
                background-attachment: fixed;
                background-position: center;
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('media/auth/bg10-dark.jpeg') }}');
            }

            [data-bs-theme="dark"] .text-gray-900 {
                color: #fff !important;
            }

            [data-bs-theme="dark"] .text-gray-500 {
                color: #ccc !important;
            }

            [data-bs-theme="dark"] .bg-body {
                background-color: #1e1e2d !important;
            }

            [data-bs-theme="dark"] .btn-primary {
                background-color: #2a2f45 !important;
                border-color: #2a2f45 !important;
            }
        </style>

        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid" style="flex: 1.5;">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 mb-10 mb-lg-20"
                        src="{{ asset('media/auth/redes.png') }}" alt="Redes y Telecomunicaciones"
                        style="width: 800px; max-width: 100%; height: auto;" />
                    <img class="theme-dark-show mx-auto mw-100 mb-10 mb-lg-20" src="{{ asset('media/auth/redes.png') }}"
                        alt="Redes y Telecomunicaciones" style="width: 700px; max-width: 100%; height: auto;" />
                </div>
            </div>

            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10 shadow-lg">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <form class="form w-100" id="kt_sign_in_form" action="{{ url('/login') }}" method="POST">
                                @csrf

                                <div class="text-center mb-11">
                                    <img class="mx-auto mb-5" src="{{ asset('media/logos/logo_administracion.png') }}"
                                        alt="Logo Administración" style="width: 180px; height: auto;" />
                                    <h1 class="text-gray-900 fw-bolder mb-3">Inicio de sesión</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">
                                        Sistema para el control de reportes en la unidad de redes y telecomunicaciones
                                    </div>
                                </div>

                                {{-- Mostrar errores --}}
                                @if ($errors->any())
                                    <div class="mb-5 alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Usuario" name="usuario" autocomplete="off"
                                        class="form-control bg-transparent text-gray-900" required />
                                </div>

                                <div class="fv-row mb-3">
                                    <input type="password" placeholder="Contraseña" name="password" autocomplete="off"
                                        class="form-control bg-transparent text-gray-900" required />
                                </div>

                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        <span class="indicator-label">Iniciar sesión</span>
                                        <span class="indicator-progress">Espera...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>

                                <div class="mb-11">
                                    {{-- reCAPTCHA v2 --}}
                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div
                        class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">Unidad de Redes y Telecomunicaciones</span>
                            <a href="https://www.zapopan.gob.mx/v3/inicio" target="_blank"
                                class="text-gray-800 text-hover-primary">2024 - 2027 Gobierno de Zapopan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('[data-kt-element="mode"]').forEach((el) => {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                const mode = this.getAttribute('data-kt-value');
                let theme = mode;
                if (mode === 'system') {
                    theme = window.matchMedia("(prefers-color-scheme: dark)").matches ? 'dark' : 'light';
                }
                document.documentElement.setAttribute('data-bs-theme', theme);
                localStorage.setItem('data-bs-theme', mode);
            });
        });
    </script>

    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
