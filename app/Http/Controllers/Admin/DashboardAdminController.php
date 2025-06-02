<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index(Request $request)
    {
        // Ambil param type, default bulanan
        $type = $request->get('type', 'monthly'); // monthly atau daily

        // Default return counts
        $jumlahDokter = Dokter::count();
        $jumlahPasien = Pasien::count();
        $jumlahPoli = Poli::count();
        $jumlahObat = Obat::count();

        if ($type === 'daily') {
            // Query statistik harian: group by tanggal, ambil 30 hari terakhir
            $labels = [];
            $statDokter = [];
            $statPasien = [];
            $statPoli = [];
            $statObat = [];

            // Generate tanggal 30 hari terakhir
            for ($i = 29; $i >= 0; $i--) {
                $labels[] = now()->subDays($i)->format('Y-m-d');
            }

            // Contoh query harian: hitung jumlah created_at per tanggal
            $statDokter = $this->getCountPerDate('dokter', $labels);
            $statPasien = $this->getCountPerDate('pasien', $labels);
            $statPoli = $this->getCountPerDate('poli', $labels);
            $statObat = $this->getCountPerDate('obat', $labels);

        } else {
            // Bulanan: group by year-month, 6 bulan terakhir
            $labels = [];
            $statDokter = [];
            $statPasien = [];
            $statPoli = [];
            $statObat = [];

            for ($i = 5; $i >= 0; $i--) {
                $labels[] = now()->subMonths($i)->format('Y-m');
            }

            $statDokter = $this->getCountPerMonth('dokter', $labels);
            $statPasien = $this->getCountPerMonth('pasien', $labels);
            $statPoli = $this->getCountPerMonth('poli', $labels);
            $statObat = $this->getCountPerMonth('obat', $labels);
        }

        return view('dashboard.dashboardAdmin', compact(
            'jumlahDokter', 'jumlahPasien', 'jumlahPoli', 'jumlahObat',
            'statDokter', 'statPasien', 'statPoli', 'statObat',
            'labels', 'type'
        ));
    }

    // Fungsi untuk query count per tanggal (format label = Y-m-d)
    private function getCountPerDate(string $table, array $dates)
    {
        // Ambil data count group by date
        $results = DB::table($table)
            ->select(DB::raw("DATE(created_at) as date"), DB::raw("COUNT(*) as total"))
            ->whereBetween('created_at', [min($dates), max($dates) . ' 23:59:59'])
            ->groupBy('date')
            ->pluck('total', 'date')
            ->toArray();

        // Mapping ke array data sesuai labels
        $data = [];
        foreach ($dates as $date) {
            $data[] = $results[$date] ?? 0;
        }
        return $data;
    }

    // Fungsi untuk query count per bulan (format label = Y-m)
    private function getCountPerMonth(string $table, array $months)
    {
        // Ambil data count group by year-month
        $results = DB::table($table)
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw("COUNT(*) as total"))
            ->whereBetween('created_at', [min($months) . '-01', max($months) . '-31'])
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Mapping ke array data sesuai labels
        $data = [];
        foreach ($months as $month) {
            $data[] = $results[$month] ?? 0;
        }
        return $data;
    }
}
