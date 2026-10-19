<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Dashboard User Mahasiswa.
     */
    public function userDashboard(Request $request)
    {
        $application = $request->user()->application;

        return view('user.dashboard', compact('application'));
    }

    /**
     * Form Pendaftaran Divisi.
     */
    public function showApplyForm(Request $request)
    {
        if ($request->user()->application) {
            return redirect()->route('user.dashboard')
                ->with('warning', 'Kamu sudah mengirimkan pendaftaran.');
        }

        return view('user.apply');
    }

    /**
     * Simpan Pendaftaran.
     */
    public function storeApplication(Request $request)
    {
        if ($request->user()->application) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Kamu sudah mengirimkan pendaftaran.');
        }

        $data = $request->validate([
            'phone'      => ['required', 'string', 'max:30'],
            'division'   => ['required', 'string', 'max:120'],
            'motivation' => ['required', 'string', 'max:5000'],
        ]);

        Application::create([
            'user_id'    => $request->user()->id,
            'phone'      => $data['phone'],
            'division'   => $data['division'],
            'motivation' => $data['motivation'],
            'status'     => 'pending',
        ]);

        return redirect()->route('user.dashboard')
            ->with('success', 'Pendaftaran berhasil dikirim.');
    }

    /**
     * Admin: Daftar Pendaftar.
     */
    public function adminIndex()
    {
        $applications = Application::with('user')->latest()->get();

        return view('admin.applications', [
            'applications' => $applications,
            'items'        => $applications, // Dikirim dua-duanya agar Blade kompatibel
        ]);
    }

    /**
     * Admin: Update Status Pendaftaran.
     */
    public function adminUpdate(Request $request, Application $application)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,diproses,diterima,ditolak'],
            'note'   => ['nullable', 'string', 'max:2000'],
        ]);

        $application->update($data);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Admin: Laporan & Statistik.
     */
    public function adminReports()
    {
        $reportsData = [
            'total_pendaftar' => Application::count(),
            'pending'         => Application::where('status', 'pending')->count(),
            'diproses'        => Application::where('status', 'diproses')->count(),
            'diterima'        => Application::where('status', 'diterima')->count(),
            'ditolak'         => Application::where('status', 'ditolak')->count(),
        ];

        return view('admin.reports', [
            'reports' => $reportsData,
            'report'  => $reportsData, // Dikirim dua-duanya agar Blade kompatibel
        ]);
    }
}