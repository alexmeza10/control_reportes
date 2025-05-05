<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionMailable;

use Hashids\Hashids;

class ReportController extends Controller
{
    public function newreport()
    {
        return view('report.newreport');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'dependencia' => 'required|string|max:255',
            'ext' => 'nullable|string|max:10',
            'mail' => 'nullable|email|max:255',
            'num_empleado' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'ubicacion' => 'required|string|max:150',
            'status' => 'required|integer',
            'notifications' => 'nullable|boolean',
            'evidencias.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $report = new Report();
        $report->user_id = Auth::id();
        $report->nombre = $request->input('nombre');
        $report->dependencia = $request->input('dependencia');
        $report->ext = $request->input('ext');
        $report->mail = $request->input('mail');
        $report->num_empleado = $request->input('num_empleado');
        $report->subject = $request->input('subject');
        $report->description = $request->input('description');
        $report->ubicacion = $request->input('ubicacion');
        $report->status = $request->input('status');
        $report->notificar_correo = $request->input('notifications') == 1 ? 1 : 0;

        if ($request->hasFile('evidencias')) {
            $filePaths = [];
            foreach ($request->file('evidencias') as $file) {
                $path = $file->store('evidencias', 'public');
                $filePaths[] = $path;
            }
            $report->evidencias = json_encode($filePaths);
        }

        $report->save();

        if ($report->notificar_correo) {
            $usuario = Auth::user();

            $mensaje = match ((int) $report->status) {
                1 => 'El reporte está siendo atendido.',
                2 => 'El reporte queda en espera de partes.',
                3 => 'El reporte ha sido atendido correctamente.',
                default => 'Estado del reporte actualizado.',
            };

            Mail::to($usuario->email)->send(new NotificacionMailable([
                'numero' => $report->id,
                'subject' => $report->subject,
                'descripcion' => $report->description,
                'ubicacion' => $report->ubicacion,
                'fecha' => $report->created_at->format('d/m/Y \a \l\a\s h:i A'),
                'mensaje' => $mensaje,
                'name' => $usuario->name,
                'correo' => $usuario->email,
                'extension' => $usuario->extension,
                'unidad' => $usuario->unidad
            ]));
        }

        return redirect()->route('report.adminreport')->with('success', 'Reporte creado exitosamente');
    }

    public function index(Request $request)
    {
        $query = Report::where('user_id', Auth::id());

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('subject', 'like', "%$search%")
                    ->orWhere('id', 'like', "%$search%")
                    ->orWhere('nombre', 'like', "%$search%")
                    ->orWhere(function ($subquery) use ($search) {
                        $subquery->where(function ($statusQuery) use ($search) {
                            $statusQuery->where('status', 1)->whereRaw("? like '%Abierto%'", [$search]);
                        })->orWhere(function ($statusQuery) use ($search) {
                            $statusQuery->where('status', 2)->whereRaw("? like '%En espera de partes%'", [$search]);
                        })->orWhere(function ($statusQuery) use ($search) {
                            $statusQuery->where('status', 3)->whereRaw("? like '%Cerrado%'", [$search]);
                        });
                    });
            });
        }

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->input('from'));
        }
        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->input('to'));
        }

        $order = $request->input('order', 'desc');
        $reportes = $query->orderBy('created_at', $order)->paginate(10);

        $hashids = new Hashids('rwDsgFI47h0QU9TntnpVZ5R4IBMtftUI', 10);
        return view('report.adminreport', compact('reportes'));
    }

    public function edit($hashid)
    {
        $hashids = new Hashids('rwDsgFI47h0QU9TntnpVZ5R4IBMtftUI', 10);
        $id = $hashids->decode($hashid);

        if (empty($id)) {
            abort(404);
        }

        $report = Report::find($id[0]);
        return view('report.viewreport', compact('reporte'));
    }

    public function show($hashid)
    {
        $hashids = new Hashids('rwDsgFI47h0QU9TntnpVZ5R4IBMtftUI', 10);
        $decoded = $hashids->decode($hashid);

        if (empty($decoded)) {
            abort(404);
        }

        $id = $decoded[0];
        $reporte = Report::findOrFail($id);

        return view('report.viewreport', compact('reporte'));
    }
}
