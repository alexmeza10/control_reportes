<!DOCTYPE html>

<html lang="es">

<head>
    <title>login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-|width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.png') }}" />
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('{{ asset('media/auth/bg10.jpeg') }}');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('media/auth/bg10-dark.jpeg') }}')
            }
        </style>

        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 mb-10 mb-lg-20"
                        src="{{ asset('media/auth/redes.png') }}" alt=""
                        style="width: 500px; max-width: 100%; height: auto;" />
                    <img class="theme-dark-show mx-auto mw-100 mb-10 mb-lg-20" src="{{ asset('media/auth/redes.png') }}"
                        alt="" style="width: 500px; max-width: 100%; height: auto;" />
                </div>
            </div>

            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                                data-kt-redirect-url="{{ route('menu') }}" action="#">
                                <div class="text-center mb-11">
                                    <img class="mx-auto mb-5" src="{{ asset('media/logos/logo_administracion.png') }}"
                                        alt="Logo Administración" style="width: 180px; height: auto;" />
                                    <h1 class="text-gray-900 fw-bolder mb-3">Inicio de sesión</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">
                                        Sistema para el control de reportes en la unidad de redes y telecomunicaciones
                                    </div>
                                </div>
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Usuario" name="user" autocomplete="off"
                                        class="form-control bg-transparent" />
                                </div>
                                <div class="fv-row mb-3">
                                    <input type="password" placeholder="Contraseña" name="password" autocomplete="off"
                                        class="form-control bg-transparent" />
                                </div>
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">

                                </div>
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        <span class="indicator-label">Iniciar sesion</span>
                                        <span class="indicator-progress">Espera...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1"> Unidad de Redes y Telecomunicaciones</span>
                            <a href="https://www.zapopan.gob.mx/v3/inicio" target="_blank"
                                class="text-gray-800 text-hover-primary">2024 - 2027 Gobierno de Zapopan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script>
</body>

</html>
