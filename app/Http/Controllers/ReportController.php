<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Hashids\Hashids;

class ReportController extends Controller
{
    public function create()
    {
        return view('report.viewreport');
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
            'evidencias' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Crear el nuevo reporte
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
        $report->notificar_correo = $request->has('notifications') ? 1 : 0;

        if ($request->hasFile('evidencias')) {
            $filePaths = [];
            foreach ($request->file('evidencias') as $file) {
                $path = $file->store('evidencias', 'public');
                $filePaths[] = $path;
            }
            $report->evidencias = json_encode($filePaths);
        }

        $report->save();


        $hashids = new Hashids('rwDsgFI47h0QU9TntnpVZ5R4IBMtftUI', 10);
        $hashedId = $hashids->encode($report->id);

        $report->hashid = $hashedId;
        $report->save();

        return redirect()->route('report.adminreport')->with('success', 'Reporte creado exitosamente');
    }

    public function index()
    {
        $reportes = Report::where('user_id', Auth::id())->orderByDesc('created_at')->get();
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
        return view('report.editreport', compact('report'));
    }

    public function show($hashid)
    {
        $hashids = new Hashids('rwDsgFI47h0QU9TntnpVZ5R4IBMtftUI', 10);
        $id = $hashids->decode($hashid);

        if (empty($id)) {
            abort(404);
        }

        $report = Report::find($id[0]);
        return view('report.viewreport', compact('report'));
    }
}
