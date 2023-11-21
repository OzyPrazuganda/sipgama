<?php

namespace App\Charts;

use App\Models\Pemasukan;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class RekapChart
{
    protected $pieChart;

    public function __construct(LarapexChart $pieChart)
    {
        $this->pieChart = $pieChart;
    }

    public function buildPieChart(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // join table
        $pemasukan = Pemasukan::all(['*']);
        $pembayaran = Pembayaran::where('status', 'valid')
            ->select('created_at', 'total_bayar as jumlah')
            ->get();
        $rekap = $pembayaran->concat($pemasukan);

        // for view
        $totalPemasukan = $rekap->sum('jumlah');
        $totalPengeluaran = Pengeluaran::sum('jumlah');
        $totalPengeluaran = (int)$totalPengeluaran;

        return $this->pieChart->pieChart()
            // ->setTitle('Top 3 scorers of the team.')
            // ->setSubtitle('Season 2021.')
            ->addData([$totalPemasukan, $totalPengeluaran])
            ->setLabels(['Pemasukan', 'Pengeluaran'])
            ->setColors(['#006d77', '#780116']);
    }
}
