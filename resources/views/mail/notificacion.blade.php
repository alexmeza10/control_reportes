<!DOCTYPE html>
<html lang="es">

<head>
    <title>Notificación</title>
    <meta charset="utf-8" />
</head>

<body
    style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height:1.5; font-size:15px; color:#2F3044; margin:0; padding:0;">
    <div style="background-color:#ffffff; padding:45px 0 34px 0; border-radius:24px; margin:40px auto; max-width:600px;">
        <table align="center" width="100%" style="border-collapse:collapse;">
            <tr>
                <td style="text-align:center; padding-bottom:10px;">
                    <div style="margin-bottom:55px;">
                        <div style="margin:-10px 60px 54px 60px;">
                            <img alt="Logo"
                                src="https://servicios.zapopan.gob.mx:8000/wwwportal/publicfiles/inline-images/escudo202124%5B1%5D.png"
                                style="height:100px;" />
                        </div>
                        <div style="font-size:14px; font-weight:500; margin:0 60px 36px 60px;">
                            <p style="color:#181C32; font-size:16px; font-weight:600; margin-bottom:9px;">
                                Reporte #{{ $numero }}
                            </p>
                            <p style="margin-bottom:2px; color:#3F4254;">{{ $mensaje }}</p>
                            <p style="margin-bottom:2px; color:#3F4254;">Asunto: {{ $subject }}</p>
                            <p style="margin-bottom:2px; color:#3F4254;">Descripción:</p>
                            <p style="margin-bottom:2px; color:#3F4254;">{{ $descripcion }}</p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td
                    style="font-size:13px; text-align:center; padding:0 10px 10px 10px; font-weight:500; color:#A1A5B7;">
                    <p style="color:#181C32; font-size:16px; font-weight:600; margin-bottom:9px;">Atendió</p>
                    <p style="margin-bottom:2px;">{{ $name }} en la EXT: {{ $extension }}</p>
                    <p style="margin-bottom:2px;">Al correo: {{ $correo }}</p>
                    <p style="margin-bottom:4px;">Área de atención: {{ $unidad }}</p>
                    <p>Fecha del reporte: {{ $fecha }}</p>
                </td>
            </tr>
            <tr>
                <td style="font-size:13px; padding:0 15px; text-align:center; font-weight:500; color:#A1A5B7;">
                    <p>Dirección de Innovación Gubernamental <br>
                        <a href="https://www.zapopan.gob.mx/v3/inicio" style="font-weight:600;">2024 - 2027 Gobierno de
                            Zapopan</a>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
